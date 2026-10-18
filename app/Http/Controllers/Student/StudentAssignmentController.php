<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $courseIds = $student->batches()
            ->wherePivot('is_active', true)
            ->pluck('course_id')
            ->unique();

        $assignments = Assignment::with([
                'course',
                'module',
            ])
            ->whereIn('course_id', $courseIds)
            ->where('is_active', true)
            ->latest()
            ->paginate(15);

        return view(
            'student.assignments.index',
            compact(
                'student',
                'assignments'
            )
        );
    }

    public function show($id)
    {
        $student = Auth::user();

        $courseIds = $student->batches()
            ->wherePivot('is_active', true)
            ->pluck('course_id');

        $assignment = Assignment::with([
                'course',
                'module',
            ])
            ->whereIn('course_id', $courseIds)
            ->where('is_active', true)
            ->findOrFail($id);

        return view(
            'student.assignments.show',
            compact(
                'student',
                'assignment'
            )
        );
    }
}
