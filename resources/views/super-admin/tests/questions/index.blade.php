@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Questions Management
            </h4>

            <p class="text-muted mb-0">
                Manage questions and answers for this test.
            </p>

        </div>

        <div class="d-flex gap-2">

            <a href="{{ route(
                'super-admin.tests.show',
                $test->id
            ) }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left"></i>
                Back to Test

            </a>

            <a href="{{ route(
                'super-admin.tests.questions.create',
                $test->id
            ) }}"
               class="btn btn-primary">

                <i class="bi bi-plus-lg"></i>
                Add Question

            </a>

        </div>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Test Information --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <div class="d-flex align-items-center">

                        <div class="bg-primary bg-opacity-10
                                    rounded p-3 me-3">

                            <i class="bi bi-journal-check
                                      text-primary fs-3">
                            </i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                {{ $test->title }}
                            </h5>

                            <div class="text-muted">

                                {{ $test->course->name ?? '-' }}

                                <span class="mx-1">
                                    /
                                </span>

                                {{ $test->module->title ?? '-' }}

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-5 mt-3 mt-lg-0">

                    <div class="row text-center">

                        <div class="col-4">

                            <div class="fw-bold fs-5">
                                {{ $test->questions->count() }}
                            </div>

                            <small class="text-muted">
                                Questions
                            </small>

                        </div>


                        <div class="col-4">

                            <div class="fw-bold fs-5">
                                {{ $test->total_marks }}
                            </div>

                            <small class="text-muted">
                                Total Marks
                            </small>

                        </div>


                        <div class="col-4">

                            <div class="fw-bold fs-5">
                                {{ $test->duration_minutes }}
                            </div>

                            <small class="text-muted">
                                Minutes
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Questions --}}
    @forelse($test->questions as $index => $question)

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <span class="badge bg-primary me-2">
                            Q{{ $index + 1 }}
                        </span>

                        <span class="badge bg-light text-dark border">
                            {{ strtoupper(
                                str_replace(
                                    '_',
                                    ' ',
                                    $question->question_type
                                )
                            ) }}
                        </span>

                    </div>


                    <div class="d-flex align-items-center gap-2">

                        <span class="badge bg-secondary">

                            {{ $question->marks }}

                            {{ $question->marks == 1 ? 'Mark' : 'Marks' }}

                        </span>


                        @if($question->is_active)

                            <span class="badge bg-success">
                                Active
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Inactive
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            <div class="card-body">

                {{-- Question --}}
                <div class="mb-4">

                    <h5 class="fw-semibold mb-0">

                        {{ $question->question }}

                    </h5>

                </div>


                {{-- Options --}}
                <div class="row g-3">

                    @foreach($question->options as $option)

                        <div class="col-md-6">

                            <div class="
                                border
                                rounded
                                p-3
                                h-100
                                {{ $option->is_correct
                                    ? 'border-success bg-success bg-opacity-10'
                                    : ''
                                }}
                            ">

                                <div class="d-flex align-items-center">

                                    <div class="me-3">

                                        @if($option->is_correct)

                                            <span class="badge bg-success rounded-circle"
                                                  style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;">

                                                <i class="bi bi-check-lg"></i>

                                            </span>

                                        @else

                                            <span class="badge bg-light text-dark border rounded-circle"
                                                  style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;">

                                                {{ chr(65 + $loop->index) }}

                                            </span>

                                        @endif

                                    </div>


                                    <div class="flex-grow-1">

                                        <div class="fw-semibold">

                                            {{ $option->option_text }}

                                        </div>


                                        @if($option->is_correct)

                                            <small class="text-success">

                                                <i class="bi bi-check-circle"></i>

                                                Correct Answer

                                            </small>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- Actions --}}
            <div class="card-footer bg-white">

                <div class="d-flex justify-content-end gap-2">

                    {{-- View --}}
                    <a href="{{ route(
                        'super-admin.tests.questions.show',
                        [
                            'test' => $test->id,
                            'question' => $question->id
                        ]
                    ) }}"
                       class="btn btn-sm btn-outline-primary">

                        <i class="bi bi-eye"></i>
                        View

                    </a>


                    {{-- Edit --}}
                    <a href="{{ route(
                        'super-admin.tests.questions.edit',
                        [
                            'test' => $test->id,
                            'question' => $question->id
                        ]
                    ) }}"
                       class="btn btn-sm btn-outline-warning">

                        <i class="bi bi-pencil"></i>
                        Edit

                    </a>


                    {{-- Status --}}
                    <form method="POST"
                          action="{{ route(
                              'super-admin.tests.questions.toggle-status',
                              [
                                  'test' => $test->id,
                                  'question' => $question->id
                              ]
                          ) }}">

                        @csrf

                        <button type="submit"
                                class="btn btn-sm btn-outline-success">

                            <i class="bi bi-power"></i>

                            {{ $question->is_active
                                ? 'Disable'
                                : 'Enable'
                            }}

                        </button>

                    </form>


                    {{-- Delete --}}
                    <form method="POST"
                          action="{{ route(
                              'super-admin.tests.questions.destroy',
                              [
                                  'test' => $test->id,
                                  'question' => $question->id
                              ]
                          ) }}"
                          onsubmit="return confirm(
                              'Are you sure you want to delete this question?'
                          )">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-sm btn-outline-danger">

                            <i class="bi bi-trash"></i>
                            Delete

                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        {{-- Empty State --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-question-circle
                          text-muted"
                   style="font-size:60px;">
                </i>

                <h4 class="fw-bold mt-3">
                    No Questions Yet
                </h4>

                <p class="text-muted mb-4">
                    This test does not have any questions.
                    Add your first question to start building the exam.
                </p>

                <a href="{{ route(
                    'super-admin.tests.questions.create',
                    $test->id
                ) }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-lg"></i>
                    Add First Question

                </a>

            </div>

        </div>

    @endforelse

</div>

@endsection

