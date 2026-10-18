<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $batches = $student->batches()
            ->with([
                'course',
                'course.modules'
            ])
            ->wherePivot('is_active', true)
            ->latest('batches.start_date')
            ->paginate(12);

        return view(
            'student.courses.index',
            compact('student', 'batches')
        );
    }

    public function show($id)
    {
        $student = Auth::user();

        $batch = $student->batches()
            ->with([
                'course.modules.studyMaterials',
                'course.modules.onlineTests',
                'course.modules.studentProgress',
            ])
            ->wherePivot('is_active', true)
            ->where('batches.id', $id)
            ->firstOrFail();

        return view(
            'student.courses.show',
            compact('student', 'batch')
        );
    }
}