<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\OnlineTest;
use Illuminate\Support\Facades\Auth;

class StudentTestController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $courseIds = $student->batches()
            ->wherePivot('is_active', true)
            ->pluck('course_id')
            ->unique();

        $tests = OnlineTest::with([
                'course',
                'module',
            ])
            ->whereIn('course_id', $courseIds)
            ->where('is_active', true)
            ->latest()
            ->paginate(15);

        return view(
            'student.tests.index',
            compact(
                'student',
                'tests'
            )
        );
    }

    public function show($id)
    {
        $student = Auth::user();

        $courseIds = $student->batches()
            ->wherePivot('is_active', true)
            ->pluck('course_id');

        $test = OnlineTest::with([
                'course',
                'module',
                'questions.options',
            ])
            ->whereIn('course_id', $courseIds)
            ->where('is_active', true)
            ->findOrFail($id);

        return view(
            'student.tests.show',
            compact(
                'student',
                'test'
            )
        );
    }
}
