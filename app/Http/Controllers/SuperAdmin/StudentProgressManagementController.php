<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\StudentProgress;
use App\Models\User;
use Illuminate\Http\Request;

class StudentProgressManagementController extends Controller
{
    /**
     * Progress list
     */
    public function index(Request $request)
    {
        $query = StudentProgress::with([
            'student',
            'course',
            'module',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('student', function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Course Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('course_id')) {

            $query->where(
                'course_id',
                $request->course_id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }

        $progress = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $courses = Course::where(
            'is_active',
            true
        )
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalProgress = StudentProgress::count();

        $completedProgress = StudentProgress::where(
            'status',
            'completed'
        )->count();

        $inProgress = StudentProgress::where(
            'status',
            'in_progress'
        )->count();

        $notStarted = StudentProgress::where(
            'status',
            'not_started'
        )->count();

        return view(
            'super-admin.progress.index',
            compact(
                'progress',
                'courses',
                'totalProgress',
                'completedProgress',
                'inProgress',
                'notStarted'
            )
        );
    }

    /**
     * Create progress
     */
    public function create()
    {
        $students = User::where('role', 'student')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $courses = Course::where('is_active', true)
            ->with([
                'modules' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order');
                }
            ])
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.progress.create',
            compact(
                'students',
                'courses'
            )
        );
    }

    /**
     * Store progress
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => [
                'required',
                'exists:users,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'module_id' => [
                'required',
                'exists:course_modules,id',
            ],

            'progress_percentage' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verify Module Belongs To Course
        |--------------------------------------------------------------------------
        */

        $module = CourseModule::where('id', $request->module_id)
            ->where('course_id', $request->course_id)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Determine Status
        |--------------------------------------------------------------------------
        */

        $percentage = (int) $request->progress_percentage;

        if ($percentage === 0) {

            $status = 'not_started';

        } elseif ($percentage >= 100) {

            $status = 'completed';

        } else {

            $status = 'in_progress';
        }

        /*
        |--------------------------------------------------------------------------
        | Save Progress
        |--------------------------------------------------------------------------
        */

        StudentProgress::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'course_id' => $request->course_id,
                'module_id' => $module->id,
            ],
            [
                'progress_percentage' => $percentage,
                'status' => $status,

                'started_at' => $percentage > 0
                    ? now()
                    : null,

                'completed_at' => $percentage >= 100
                    ? now()
                    : null,
            ]
        );

        return redirect()
            ->route('super-admin.progress.index')
            ->with(
                'success',
                'Student module progress created successfully.'
            );
    }

    /**
     * Show progress
     */
    public function show($id)
    {
        $progress = StudentProgress::with([
            'student',
            'course',
            'module',
        ])->findOrFail($id);

        return view(
            'super-admin.progress.show',
            compact('progress')
        );
    }

    /**
     * Edit progress
     */
    public function edit($id)
    {
        $progress = StudentProgress::with([
            'student',
            'course',
            'module',
        ])->findOrFail($id);

        $students = User::where('role', 'student')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $courses = Course::where('is_active', true)
            ->with([
                'modules' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order');
                }
            ])
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.progress.edit',
            compact(
                'progress',
                'students',
                'courses'
            )
        );
    }

    /**
     * Update progress
     */
    public function update(
        Request $request,
        $id
    ) {
        $progress = StudentProgress::findOrFail($id);

        $request->validate([
            'student_id' => [
                'required',
                'exists:users,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'module_id' => [
                'required',
                'exists:course_modules,id',
            ],

            'progress_percentage' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verify Module
        |--------------------------------------------------------------------------
        */

        $module = CourseModule::where('id', $request->module_id)
            ->where('course_id', $request->course_id)
            ->firstOrFail();

        $percentage = (int) $request->progress_percentage;

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        if ($percentage === 0) {

            $status = 'not_started';

        } elseif ($percentage >= 100) {

            $status = 'completed';

        } else {

            $status = 'in_progress';
        }

        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $progress->update([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'module_id' => $module->id,

            'progress_percentage' => $percentage,

            'status' => $status,

            'started_at' => $percentage > 0
                ? ($progress->started_at ?? now())
                : null,

            'completed_at' => $percentage >= 100
                ? ($progress->completed_at ?? now())
                : null,
        ]);

        return redirect()
            ->route('super-admin.progress.index')
            ->with(
                'success',
                'Student module progress updated successfully.'
            );
    }

    /**
     * Delete progress
     */
    public function destroy($id)
    {
        $progress = StudentProgress::findOrFail($id);

        $progress->delete();

        return back()->with(
            'success',
            'Progress deleted successfully.'
        );
    }
}
