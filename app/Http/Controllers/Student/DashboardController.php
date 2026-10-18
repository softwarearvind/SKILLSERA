<?php

namespace App\Http\Controllers\Student;
use App\Models\Certificate;
use App\Models\StudentProgress;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $batches = $student->batches()
            ->with('course')
            ->wherePivot('is_active', true)
            ->latest('batches.start_date')
            ->get();

        $courseIds = $batches
            ->pluck('course_id')
            ->unique();

        $progress = StudentProgress::with([
            'course',
            'module'
        ])
            ->where('student_id', $student->id)
            ->whereIn('course_id', $courseIds)
            ->latest()
            ->get();

        $certificates = Certificate::with('course')
            ->where('student_id', $student->id)
            ->where('is_active', true)
            ->latest()
            ->get();

        $totalCourses = $courseIds->count();

        $completedCourses = $progress
            ->where('status', 'completed')
            ->pluck('course_id')
            ->unique()
            ->count();

        $inProgressCourses = $progress
            ->where('status', 'in_progress')
            ->pluck('course_id')
            ->unique()
            ->count();

        $totalCertificates = $certificates->count();

        return view(
            'student.dashboard',
            compact(
                'student',
                'batches',
                'progress',
                'certificates',
                'totalCourses',
                'completedCourses',
                'inProgressCourses',
                'totalCertificates'
            )
        );
    }
}
