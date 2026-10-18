<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\StudyMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyMaterialManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Study Materials
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = StudyMaterial::with([
            'course',
            'module',
        ]);

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")

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

            } elseif ($request->status === 'inactive') {

                $query->where('is_active', false);

            }
        }

        $materials = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();


        $totalMaterials = StudyMaterial::count();

        $activeMaterials = StudyMaterial::where(
            'is_active',
            true
        )->count();

        $inactiveMaterials = StudyMaterial::where(
            'is_active',
            false
        )->count();


        return view(
            'super-admin.study-materials.index',
            compact(
                'materials',
                'totalMaterials',
                'activeMaterials',
                'inactiveMaterials'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
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
            'super-admin.study-materials.create',
            compact('courses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'module_id' => [
                'required',
                'exists:course_modules,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip',
                'max:20480',
            ],

            'external_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Check Module Belongs To Course
        |--------------------------------------------------------------------------
        */

        $module = CourseModule::where(
            'id',
            $request->module_id
        )
        ->where(
            'course_id',
            $request->course_id
        )
        ->firstOrFail();


        $filePath = null;

        $fileType = null;


        /*
        |--------------------------------------------------------------------------
        | Upload File
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $filePath = $file->store(
                'study-materials',
                'public'
            );

            $fileType = $file->getClientOriginalExtension();
        }


        StudyMaterial::create([

            'course_id' => $request->course_id,

            'module_id' => $module->id,

            'title' => $request->title,

            'description' => $request->description,

            'file' => $filePath,

            'file_type' => $fileType,

            'external_url' => $request->external_url,

            'is_active' => true,

        ]);


        return redirect()
            ->route('super-admin.study-materials.index')
            ->with(
                'success',
                'Study material created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $material = StudyMaterial::with([
            'course',
            'module',
        ])->findOrFail($id);

        return view(
            'super-admin.study-materials.show',
            compact('material')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $material = StudyMaterial::findOrFail($id);

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
            'super-admin.study-materials.edit',
            compact(
                'material',
                'courses'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    ) {

        $material = StudyMaterial::findOrFail($id);


        $request->validate([

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'module_id' => [
                'required',
                'exists:course_modules,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip',
                'max:20480',
            ],

            'external_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Check Module
        |--------------------------------------------------------------------------
        */

        $module = CourseModule::where(
            'id',
            $request->module_id
        )
        ->where(
            'course_id',
            $request->course_id
        )
        ->firstOrFail();


        $data = [

            'course_id' => $request->course_id,

            'module_id' => $module->id,

            'title' => $request->title,

            'description' => $request->description,

            'external_url' => $request->external_url,

        ];


        /*
        |--------------------------------------------------------------------------
        | New File
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('file')) {

            if (
                $material->file &&
                Storage::disk('public')->exists(
                    $material->file
                )
            ) {

                Storage::disk('public')->delete(
                    $material->file
                );
            }


            $file = $request->file('file');

            $data['file'] = $file->store(
                'study-materials',
                'public'
            );

            $data['file_type'] =
                $file->getClientOriginalExtension();
        }


        $material->update($data);


        return redirect()
            ->route(
                'super-admin.study-materials.index'
            )
            ->with(
                'success',
                'Study material updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Status
    |--------------------------------------------------------------------------
    */

    public function toggleStatus($id)
    {
        $material = StudyMaterial::findOrFail($id);

        $material->is_active =
            !$material->is_active;

        $material->save();


        return back()->with(
            'success',
            'Study material status updated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $material = StudyMaterial::findOrFail($id);


        if (
            $material->file &&
            Storage::disk('public')->exists(
                $material->file
            )
        ) {

            Storage::disk('public')->delete(
                $material->file
            );
        }


        $material->delete();


        return back()->with(
            'success',
            'Study material deleted successfully.'
        );
    }
}
