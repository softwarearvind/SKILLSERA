<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModuleManagementController extends Controller
{
    /**
     * Show modules of a course.
     */
  public function index($courseId)
{
    $course = Course::findOrFail($courseId);

    $modules = $course->modules()
        ->orderBy('sort_order')
        ->get();

    return view('super-admin.modules.index', compact('course', 'modules'));
}

public function allModules()
{
    $modules = CourseModule::with('course')
        ->orderBy('course_id')
        ->orderBy('sort_order')
        ->paginate(15);

    return view('super-admin.modules.all', compact('modules'));
}


    /**
     * Create module form.
     */
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);

        return view(
            'super-admin.modules.create',
            compact('course')
        );
    }


    /**
     * Store module.
     */
    public function store(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer|min:1',
        ]);

        CourseModule::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'sort_order' => $request->sort_order,
            'is_active' => true,
        ]);

        return redirect()
            ->route(
                'super-admin.courses.modules.index',
                $course->id
            )
            ->with(
                'success',
                'Module created successfully.'
            );
    }


    /**
     * Show module.
     */
    public function show($courseId, $id)
    {
        $course = Course::findOrFail($courseId);

        $module = CourseModule::where('course_id', $course->id)
            ->findOrFail($id);

        return view(
            'super-admin.modules.show',
            compact('course', 'module')
        );
    }


    /**
     * Edit module.
     */
    public function edit($courseId, $id)
    {
        $course = Course::findOrFail($courseId);

        $module = CourseModule::where('course_id', $course->id)
            ->findOrFail($id);

        return view(
            'super-admin.modules.edit',
            compact('course', 'module')
        );
    }


    /**
     * Update module.
     */
    public function update(Request $request, $courseId, $id)
    {
        $course = Course::findOrFail($courseId);

        $module = CourseModule::where('course_id', $course->id)
            ->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'required|integer|min:1',
        ]);

        $module->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'sort_order' => $request->sort_order,
        ]);

        return redirect()
            ->route(
                'super-admin.courses.modules.index',
                $course->id
            )
            ->with(
                'success',
                'Module updated successfully.'
            );
    }


    /**
     * Activate / deactivate.
     */
    public function toggleStatus($courseId, $id)
    {
        $course = Course::findOrFail($courseId);

        $module = CourseModule::where('course_id', $course->id)
            ->findOrFail($id);

        $module->is_active = !$module->is_active;

        $module->save();

        return back()->with(
            'success',
            'Module status updated successfully.'
        );
    }


    /**
     * Delete module.
     */
    public function destroy($courseId, $id)
    {
        $course = Course::findOrFail($courseId);

        $module = CourseModule::where('course_id', $course->id)
            ->findOrFail($id);

        $module->delete();

        return back()->with(
            'success',
            'Module deleted successfully.'
        );
    }
}
