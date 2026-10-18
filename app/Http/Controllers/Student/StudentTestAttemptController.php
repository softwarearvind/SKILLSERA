<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\OnlineTest;
use App\Models\TestAttempt;
use App\Models\TestAttemptAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentTestAttemptController extends Controller
{
   public function start($id)
{

    $student = Auth::user();

    $courseIds = $student->batches()
        ->wherePivot('is_active', true)
        ->pluck('course_id');

    $test = OnlineTest::with('questions.options')
        ->whereIn('course_id', $courseIds)
        ->where('is_active', true)
        ->findOrFail($id);

    if ($test->start_at && now()->lt($test->start_at)) {
        return back()->with(
            'error',
            'This test has not started yet.'
        );
    }

    if ($test->end_at && now()->gt($test->end_at)) {
        return back()->with(
            'error',
            'This test has expired.'
        );
    }

    $existingAttempt = TestAttempt::where([
        'test_id' => $test->id,
        'student_id' => $student->id,
        'status' => 'in_progress',
    ])->first();

    if ($existingAttempt) {
        return redirect()->route(
            'student.tests.attempt',
            $existingAttempt->id
        );
    }

    $attemptCount = TestAttempt::where('test_id', $test->id)
        ->where('student_id', $student->id)
        ->count();

    if ($attemptCount >= $test->attempts_allowed) {
        return back()->with(
            'error',
            'You have used all allowed attempts.'
        );
    }

    $totalMarks = $test->questions->sum('marks');

    $attempt = TestAttempt::create([
        'test_id' => $test->id,
        'student_id' => $student->id,
        'started_at' => now(),
        'total_marks' => $totalMarks,
        'score' => 0,
        'status' => 'in_progress',
        'is_passed' => false,
    ]);

    return redirect()->route(
        'student.tests.attempt',
        $attempt->id
    );
}


    public function attempt($id)
    {
        $student = Auth::user();

        $attempt = TestAttempt::with([
            'test.questions.options'
        ])
            ->where('student_id', $student->id)
            ->where('status', 'in_progress')
            ->findOrFail($id);

        $test = $attempt->test;

        $elapsedSeconds = now()->diffInSeconds(
            $attempt->started_at
        );

        $totalSeconds = $test->duration_minutes * 60;

        if ($elapsedSeconds >= $totalSeconds) {

            $this->submitAttempt($attempt, []);

            return redirect()->route(
                'student.tests.result',
                $attempt->id
            )->with(
                'info',
                'Time expired. Your test was submitted automatically.'
            );
        }

        $remainingSeconds = $totalSeconds - $elapsedSeconds;

        return view(
            'student.tests.attempt',
            compact(
                'attempt',
                'test',
                'remainingSeconds'
            )
        );
    }


    public function submit(Request $request, $id)
    {
        $student = Auth::user();

        $attempt = TestAttempt::with([
            'test.questions.options'
        ])
            ->where('student_id', $student->id)
            ->where('status', 'in_progress')
            ->findOrFail($id);

        $answers = $request->input('answers', []);

        $this->submitAttempt(
            $attempt,
            $answers
        );

        return redirect()->route(
            'student.tests.result',
            $attempt->id
        );
    }


    private function submitAttempt(
        TestAttempt $attempt,
        array $answers
    ) {
        DB::transaction(function () use (
            $attempt,
            $answers
        ) {

            $score = 0;

            foreach ($attempt->test->questions as $question) {

                $selectedOptionId =
                    $answers[$question->id] ?? null;

                $selectedOption = $question->options
                    ->firstWhere(
                        'id',
                        (int) $selectedOptionId
                    );

                $correctOption = $question->options
                    ->firstWhere(
                        'is_correct',
                        true
                    );

                $isCorrect = $selectedOption
                    && $selectedOption->is_correct;

                $marks = $isCorrect
                    ? $question->marks
                    : 0;

                $score += $marks;

                TestAttemptAnswer::updateOrCreate(
                    [
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                    ],
                    [
                        'option_id' => $selectedOption?->id,
                        'marks_obtained' => $marks,
                        'is_correct' => $isCorrect,
                    ]
                );
            }

            $attempt->update([
                'submitted_at' => now(),
                'score' => $score,
                'status' => 'submitted',
                'is_passed' =>
                    $score >= $attempt->test->passing_marks,
            ]);
        });
    }


    public function result($id)
    {
        $student = Auth::user();

        $attempt = TestAttempt::with([
            'test.course',
            'test.module',
            'answers.question',
            'answers.option',
        ])
            ->where('student_id', $student->id)
            ->whereIn('status', [
                'submitted',
                'expired',
            ])
            ->findOrFail($id);

        return view(
            'student.tests.result',
            compact('attempt')
        );
    }
}
