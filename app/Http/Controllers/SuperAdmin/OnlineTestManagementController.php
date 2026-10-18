<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\OnlineTest;
use Illuminate\Http\Request;

class OnlineTestManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = OnlineTest::with([
            'course',
            'module'
        ]);

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'title',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas('course', function ($course) use ($search) {

                    $course->where(
                        'name',
                        'like',
                        "%{$search}%"
                    );

                })

                ->orWhereHas('module', function ($module) use ($search) {

                    $module->where(
                        'title',
                        'like',
                        "%{$search}%"
                    );

                });

            });
        }

        if ($request->filled('status')) {

            if ($request->status === 'active') {
                $query->where('is_active', true);
            }

            if ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $tests = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $totalTests = OnlineTest::count();

        $activeTests = OnlineTest::where(
            'is_active',
            true
        )->count();

        $inactiveTests = OnlineTest::where(
            'is_active',
            false
        )->count();

        return view(
            'super-admin.tests.index',
            compact(
                'tests',
                'totalTests',
                'activeTests',
                'inactiveTests'
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
            'super-admin.tests.create',
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

            'duration_minutes' => [
                'required',
                'integer',
                'min:1',
                'max:1440'
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
                'max:10000'
            ],

            'passing_marks' => [
                'required',
                'integer',
                'min:1',
                'lte:total_marks'
            ],

            'attempts_allowed' => [
                'required',
                'integer',
                'min:1',
                'max:10'
            ],

            'start_at' => [
                'nullable',
                'date'
            ],

            'end_at' => [
                'nullable',
                'date',
                'after_or_equal:start_at'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],
        ]);

        $moduleExists = Course::where(
            'id',
            $request->course_id
        )
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

        OnlineTest::create([
            'course_id' => $request->course_id,
            'module_id' => $request->module_id,
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'total_marks' => $request->total_marks,
            'passing_marks' => $request->passing_marks,
            'attempts_allowed' => $request->attempts_allowed,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('super-admin.tests.index')
            ->with(
                'success',
                'Test created successfully.'
            );
    }

    public function show($id)
    {
        $test = OnlineTest::with([
            'course',
            'module',
            'questions'
        ])->findOrFail($id);

        return view(
            'super-admin.tests.show',
            compact('test')
        );
    }

    public function edit($id)
    {
        $test = OnlineTest::findOrFail($id);

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
            'super-admin.tests.edit',
            compact(
                'test',
                'courses'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $test = OnlineTest::findOrFail($id);

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

            'duration_minutes' => [
                'required',
                'integer',
                'min:1',
                'max:1440'
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
                'max:10000'
            ],

            'passing_marks' => [
                'required',
                'integer',
                'min:1',
                'lte:total_marks'
            ],

            'attempts_allowed' => [
                'required',
                'integer',
                'min:1',
                'max:10'
            ],

            'start_at' => [
                'nullable',
                'date'
            ],

            'end_at' => [
                'nullable',
                'date',
                'after_or_equal:start_at'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],
        ]);

        $moduleExists = Course::where(
            'id',
            $request->course_id
        )
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

        $test->update([
            'course_id' => $request->course_id,
            'module_id' => $request->module_id,
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'total_marks' => $request->total_marks,
            'passing_marks' => $request->passing_marks,
            'attempts_allowed' => $request->attempts_allowed,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('super-admin.tests.index')
            ->with(
                'success',
                'Test updated successfully.'
            );
    }

    public function toggleStatus($id)
    {
        $test = OnlineTest::findOrFail($id);

        $test->is_active = !$test->is_active;

        $test->save();

        return back()->with(
            'success',
            'Test status updated successfully.'
        );
    }

    public function destroy($id)
    {
        $test = OnlineTest::findOrFail($id);

        $test->delete();

        return back()->with(
            'success',
            'Test deleted successfully.'
        );
    }
}
