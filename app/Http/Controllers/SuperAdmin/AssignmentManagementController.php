<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = Assignment::with([
            'course',
            'module'
        ]);

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('course', function ($course) use ($search) {
                        $course->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('module', function ($module) use ($search) {
                        $module->where('title', 'like', "%{$search}%");
                    });

            });
        }

        // Status Filter
        if ($request->filled('status')) {

            if ($request->status === 'active') {
                $query->where('is_active', true);
            }

            if ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $assignments = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        // Statistics
        $totalAssignments = Assignment::count();

        $activeAssignments = Assignment::where(
            'is_active',
            true
        )->count();

        $inactiveAssignments = Assignment::where(
            'is_active',
            false
        )->count();

        return view(
            'super-admin.assignments.index',
            compact(
                'assignments',
                'totalAssignments',
                'activeAssignments',
                'inactiveAssignments'
            )
        );
    }


    public function create()
    {
        $courses = Course::with([
            'modules' => function ($query) {
                $query
                    ->where('is_active', true)
                    ->orderBy('sort_order');
            }
        ])
        ->where('is_active', true)
        ->orderBy('name')
        ->get();

        return view(
            'super-admin.assignments.create',
            compact('courses')
        );
    }


    public function store(Request $request)
    {
        $request->validate([

            'course_id' => [
                'required',
                'exists:courses,id'
            ],

            'module_id' => [
                'required',
                'exists:course_modules,id'
            ],

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip',
                'max:20480'
            ],

            'due_date' => [
                'nullable',
                'date'
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
                'max:10000'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],

        ]);


        // Check Module belongs to selected Course
        $moduleExists = $request->module_id;

        $course = Course::where('id', $request->course_id)
            ->whereHas('modules', function ($query) use ($moduleExists) {

                $query->where(
                    'course_modules.id',
                    $moduleExists
                );

            })
            ->exists();

        if (!$course) {

            return back()
                ->withInput()
                ->withErrors([
                    'module_id' =>
                        'Selected module does not belong to the selected course.'
                ]);
        }


        // Upload File
        $filePath = null;

        if ($request->hasFile('file')) {

            $filePath = $request->file('file')
                ->store('assignments', 'public');
        }


        // Create Assignment
        Assignment::create([

            'course_id' => $request->course_id,

            'module_id' => $request->module_id,

            'title' => $request->title,

            'description' => $request->description,

            'file' => $filePath,

            'due_date' => $request->due_date,

            'total_marks' => $request->total_marks,

            'is_active' => $request->is_active,

        ]);


        return redirect()
            ->route('super-admin.assignments.index')
            ->with(
                'success',
                'Assignment created successfully.'
            );
    }


    public function show($id)
    {
        $assignment = Assignment::with([
            'course',
            'module'
        ])->findOrFail($id);

        return view(
            'super-admin.assignments.show',
            compact('assignment')
        );
    }


    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);

        $courses = Course::with([
            'modules' => function ($query) {
                $query
                    ->where('is_active', true)
                    ->orderBy('sort_order');
            }
        ])
        ->where('is_active', true)
        ->orderBy('name')
        ->get();

        return view(
            'super-admin.assignments.edit',
            compact(
                'assignment',
                'courses'
            )
        );
    }


    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([

            'course_id' => [
                'required',
                'exists:courses,id'
            ],

            'module_id' => [
                'required',
                'exists:course_modules,id'
            ],

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip',
                'max:20480'
            ],

            'due_date' => [
                'nullable',
                'date'
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
                'max:10000'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],

        ]);


        // Check module belongs to course
        $moduleExists = Course::where('id', $request->course_id)
            ->whereHas('modules', function ($query) use ($request) {

                $query->where(
                    'course_modules.id',
                    $request->module_id
                );

            })
            ->exists();

        if (!$moduleExists) {

            return back()
                ->withInput()
                ->withErrors([
                    'module_id' =>
                        'Selected module does not belong to the selected course.'
                ]);
        }


        // Replace file
        $filePath = $assignment->file;

        if ($request->hasFile('file')) {

            if (
                $assignment->file &&
                Storage::disk('public')->exists($assignment->file)
            ) {
                Storage::disk('public')
                    ->delete($assignment->file);
            }

            $filePath = $request->file('file')
                ->store('assignments', 'public');
        }


        $assignment->update([

            'course_id' => $request->course_id,

            'module_id' => $request->module_id,

            'title' => $request->title,

            'description' => $request->description,

            'file' => $filePath,

            'due_date' => $request->due_date,

            'total_marks' => $request->total_marks,

            'is_active' => $request->is_active,

        ]);


        return redirect()
            ->route('super-admin.assignments.index')
            ->with(
                'success',
                'Assignment updated successfully.'
            );
    }


    public function toggleStatus($id)
    {
        $assignment = Assignment::findOrFail($id);

        $assignment->is_active =
            !$assignment->is_active;

        $assignment->save();

        return back()->with(
            'success',
            'Assignment status updated successfully.'
        );
    }


    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);

        if (
            $assignment->file &&
            Storage::disk('public')->exists($assignment->file)
        ) {
            Storage::disk('public')
                ->delete($assignment->file);
        }

        $assignment->delete();

        return back()->with(
            'success',
            'Assignment deleted successfully.'
        );
    }
}
