<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudyMaterial;
use Illuminate\Support\Facades\Auth;

class StudentStudyMaterialController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        // Student ke active batches
        $batches = $student->batches()
            ->with('course')
            ->wherePivot('is_active', true)
            ->get();

        $courseIds = $batches
            ->pluck('course_id')
            ->unique();

        // Sirf assigned courses ke active materials
        $materials = StudyMaterial::with([
                'course',
                'module'
            ])
            ->whereIn('course_id', $courseIds)
            ->where('is_active', true)
            ->latest()
            ->paginate(15);

        return view(
            'student.study-materials.index',
            compact(
                'student',
                'batches',
                'materials'
            )
        );
    }

    public function show($id)
    {
        $student = Auth::user();

        $courseIds = $student->batches()
            ->wherePivot('is_active', true)
            ->pluck('course_id');

        $material = StudyMaterial::with([
                'course',
                'module'
            ])
            ->whereIn('course_id', $courseIds)
            ->where('is_active', true)
            ->findOrFail($id);

        return view(
            'student.study-materials.show',
            compact(
                'student',
                'material'
            )
        );
    }
}