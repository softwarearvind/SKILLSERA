<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseManagementController extends Controller
{
    /**
     * Display courses.
     */
    public function index(Request $request)
    {
        $query = Course::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");

            });
        }

        // Status filter
        if ($request->filled('status')) {

            if ($request->status === 'active') {
                $query->where('is_active', true);
            }

            if ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $courses = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $totalCourses = Course::count();

        $activeCourses = Course::where('is_active', true)->count();

        $inactiveCourses = Course::where('is_active', false)->count();

        return view(
            'super-admin.courses.index',
            compact(
                'courses',
                'totalCourses',
                'activeCourses',
                'inactiveCourses'
            )
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view('super-admin.courses.create');
    }


    /**
     * Store course.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'code' => 'required|string|max:100|unique:courses,code',

            'description' => 'nullable|string',

            'duration' => 'nullable|string|max:100',

            'fees' => 'required|numeric|min:0',

            'mode' => 'required|in:online,offline,hybrid',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $course = new Course();

        $course->name = $request->name;

        $course->code = strtoupper($request->code);

        $course->description = $request->description;

        $course->duration = $request->duration;

        $course->fees = $request->fees;

        $course->mode = $request->mode;

        $course->is_active = true;


        if ($request->hasFile('thumbnail')) {

            $course->thumbnail = $request
                ->file('thumbnail')
                ->store('courses', 'public');
        }


        $course->save();


        return redirect()
            ->route('super-admin.courses.index')
            ->with(
                'success',
                'Course created successfully.'
            );
    }


    /**
     * Show course.
     */
    public function show($id)
    {
        $course = Course::with('modules')
            ->findOrFail($id);

        return view(
            'super-admin.courses.show',
            compact('course')
        );
    }


    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view(
            'super-admin.courses.edit',
            compact('course')
        );
    }


    /**
     * Update course.
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([

            'name' => 'required|string|max:255',

            'code' => 'required|string|max:100|unique:courses,code,' . $course->id,

            'description' => 'nullable|string',

            'duration' => 'nullable|string|max:100',

            'fees' => 'required|numeric|min:0',

            'mode' => 'required|in:online,offline,hybrid',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $course->name = $request->name;

        $course->code = strtoupper($request->code);

        $course->description = $request->description;

        $course->duration = $request->duration;

        $course->fees = $request->fees;

        $course->mode = $request->mode;


        if ($request->hasFile('thumbnail')) {

            $course->thumbnail = $request
                ->file('thumbnail')
                ->store('courses', 'public');
        }


        $course->save();


        return redirect()
            ->route(
                'super-admin.courses.index'
            )
            ->with(
                'success',
                'Course updated successfully.'
            );
    }


    /**
     * Activate / deactivate course.
     */
    public function toggleStatus($id)
    {
        $course = Course::findOrFail($id);

        $course->is_active = !$course->is_active;

        $course->save();


        return back()->with(
            'success',
            'Course status updated successfully.'
        );
    }


    /**
     * Delete course.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return back()->with(
            'success',
            'Course deleted successfully.'
        );
    }
}
