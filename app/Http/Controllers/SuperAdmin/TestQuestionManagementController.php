<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\OnlineTest;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestQuestionManagementController extends Controller
{
    public function index($testId)
    {
        $test = OnlineTest::with([
            'course',
            'module',
            'questions.options'
        ])->findOrFail($testId);

        return view(
            'super-admin.tests.questions.index',
            compact('test')
        );
    }

    public function create($testId)
    {
        $test = OnlineTest::with([
            'course',
            'module'
        ])->findOrFail($testId);

        return view(
            'super-admin.tests.questions.create',
            compact('test')
        );
    }

    public function store(Request $request, $testId)
    {
        $test = OnlineTest::findOrFail($testId);

        $request->validate([

            'question' => [
                'required',
                'string'
            ],

            'question_type' => [
                'required',
                'in:mcq,true_false'
            ],

            'marks' => [
                'required',
                'integer',
                'min:1',
                'max:1000'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],

            'options' => [
                'required',
                'array',
                'min:2'
            ],

            'options.*' => [
                'required',
                'string',
                'max:500'
            ],

            'correct_option' => [
                'required',
                'integer'
            ],

        ]);

        if (
            !array_key_exists(
                $request->correct_option,
                $request->options
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'correct_option' =>
                        'Please select a valid correct answer.'
                ]);
        }

        if (
            $request->question_type === 'true_false'
            && count($request->options) != 2
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'options' =>
                        'True/False questions must have exactly 2 options.'
                ]);
        }

        DB::transaction(function () use (
            $request,
            $test
        ) {

            $nextOrder = (
                $test->questions()->max('sort_order')
                ?? 0
            ) + 1;

            $question = TestQuestion::create([
                'test_id' => $test->id,
                'question' => $request->question,
                'question_type' => $request->question_type,
                'marks' => $request->marks,
                'sort_order' => $nextOrder,
                'is_active' => $request->is_active,
            ]);

            foreach ($request->options as $index => $optionText) {

                $question->options()->create([
                    'option_text' => $optionText,
                    'is_correct' =>
                        ((int) $index ===
                        (int) $request->correct_option),
                    'sort_order' => $index + 1,
                ]);
            }

        });

        return redirect()
            ->route(
                'super-admin.tests.questions.index',
                $test->id
            )
            ->with(
                'success',
                'Question added successfully.'
            );
    }

    public function show($testId, $questionId)
    {
        $test = OnlineTest::findOrFail($testId);

        $question = TestQuestion::with('options')
            ->where('test_id', $test->id)
            ->findOrFail($questionId);

        return view(
            'super-admin.tests.questions.show',
            compact(
                'test',
                'question'
            )
        );
    }

    public function edit($testId, $questionId)
    {
        $test = OnlineTest::findOrFail($testId);

        $question = TestQuestion::with('options')
            ->where('test_id', $test->id)
            ->findOrFail($questionId);

        return view(
            'super-admin.tests.questions.edit',
            compact(
                'test',
                'question'
            )
        );
    }

    public function update(
        Request $request,
        $testId,
        $questionId
    ) {
        $test = OnlineTest::findOrFail($testId);

        $question = TestQuestion::where(
            'test_id',
            $test->id
        )->findOrFail($questionId);

        $request->validate([

            'question' => [
                'required',
                'string'
            ],

            'question_type' => [
                'required',
                'in:mcq,true_false'
            ],

            'marks' => [
                'required',
                'integer',
                'min:1',
                'max:1000'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],

            'options' => [
                'required',
                'array',
                'min:2'
            ],

            'options.*' => [
                'required',
                'string',
                'max:500'
            ],

            'correct_option' => [
                'required',
                'integer'
            ],

        ]);

        if (
            !array_key_exists(
                $request->correct_option,
                $request->options
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'correct_option' =>
                        'Please select a valid correct answer.'
                ]);
        }

        if (
            $request->question_type === 'true_false'
            && count($request->options) != 2
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'options' =>
                        'True/False questions must have exactly 2 options.'
                ]);
        }

        DB::transaction(function () use (
            $request,
            $question
        ) {

            $question->update([
                'question' => $request->question,
                'question_type' => $request->question_type,
                'marks' => $request->marks,
                'is_active' => $request->is_active,
            ]);

            $question->options()->delete();

            foreach ($request->options as $index => $optionText) {

                $question->options()->create([
                    'option_text' => $optionText,
                    'is_correct' =>
                        ((int) $index ===
                        (int) $request->correct_option),
                    'sort_order' => $index + 1,
                ]);
            }

        });

        return redirect()
            ->route(
                'super-admin.tests.questions.index',
                $test->id
            )
            ->with(
                'success',
                'Question updated successfully.'
            );
    }

    public function toggleStatus(
        $testId,
        $questionId
    ) {
        $test = OnlineTest::findOrFail($testId);

        $question = TestQuestion::where(
            'test_id',
            $test->id
        )->findOrFail($questionId);

        $question->is_active =
            !$question->is_active;

        $question->save();

        return back()->with(
            'success',
            'Question status updated successfully.'
        );
    }

    public function destroy(
        $testId,
        $questionId
    ) {
        $test = OnlineTest::findOrFail($testId);

        $question = TestQuestion::where(
            'test_id',
            $test->id
        )->findOrFail($questionId);

        $question->delete();

        return back()->with(
            'success',
            'Question deleted successfully.'
        );
    }
}
