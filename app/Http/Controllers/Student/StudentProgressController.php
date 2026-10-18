<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentProgress;
use Illuminate\Support\Facades\Auth;

class StudentProgressController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $progress = StudentProgress::with([
            'course',
            'module'
        ])
            ->where('student_id', $student->id)
            ->latest()
            ->get();

        $totalModules = $progress->count();

        $completedModules = $progress
            ->where('status', 'completed')
            ->count();

        $inProgressModules = $progress
            ->where('status', 'in_progress')
            ->count();

        $overallProgress = $totalModules > 0
            ? round($progress->avg('progress_percentage'))
            : 0;

        return view(
            'student.progress.index',
            compact(
                'student',
                'progress',
                'totalModules',
                'completedModules',
                'inProgressModules',
                'overallProgress'
            )
        );
    }
}
