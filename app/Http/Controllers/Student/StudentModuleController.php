<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentProgress;
use Illuminate\Support\Facades\Auth;

class StudentModuleController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $batches = $student->batches()
            ->with([
                'course.modules.studyMaterials',
                'course.modules.onlineTests',
            ])
            ->wherePivot('is_active', true)
            ->latest('batches.start_date')
            ->get();

        $courseIds = $batches
            ->pluck('course_id')
            ->unique();

        $progress = StudentProgress::where('student_id', $student->id)
            ->whereIn('course_id', $courseIds)
            ->get()
            ->keyBy('module_id');

        return view(
            'student.modules.index',
            compact(
                'student',
                'batches',
                'progress'
            )
        );
    }
}