@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Question Details
            </h4>

            <p class="text-muted mb-0">
                View complete question and answer details.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route(
                'super-admin.tests.questions.index',
                $test->id
            ) }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left"></i>
                Back to Questions

            </a>

            <a href="{{ route(
                'super-admin.tests.questions.edit',
                [
                    'test' => $test->id,
                    'question' => $question->id
                ]
            ) }}"
               class="btn btn-primary">

                <i class="bi bi-pencil"></i>
                Edit Question

            </a>

        </div>

    </div>


    {{-- Success Message --}}
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


    <div class="row">

        {{-- Main Question --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm mb-4">

                {{-- Card Header --}}
                <div class="card-header bg-white py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <span class="badge bg-primary me-2">

                                Question #{{ $question->sort_order }}

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


                        <div>

                            @if($question->is_active)

                                <span class="badge bg-success">

                                    <i class="bi bi-check-circle me-1"></i>
                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    <i class="bi bi-x-circle me-1"></i>
                                    Inactive

                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- Question --}}
                <div class="card-body">

                    <div class="mb-4">

                        <div class="text-muted small mb-2">
                            QUESTION
                        </div>

                        <h5 class="fw-bold mb-0">

                            {{ $question->question }}

                        </h5>

                    </div>


                    <hr>


                    {{-- Options --}}
                    <div class="mt-4">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h6 class="fw-bold mb-0">

                                Answer Options

                            </h6>

                            <span class="badge bg-secondary">

                                {{ $question->options->count() }} Options

                            </span>

                        </div>


                        @foreach($question->options as $option)

                            <div class="border rounded p-3 mb-3
                                {{ $option->is_correct
                                    ? 'border-success bg-success bg-opacity-10'
                                    : 'bg-white'
                                }}">

                                <div class="d-flex align-items-center">

                                    {{-- Option Letter --}}
                                    <div class="me-3">

                                        @if($option->is_correct)

                                            <div class="rounded-circle bg-success text-white
                                                        d-flex align-items-center justify-content-center"
                                                 style="width:42px;height:42px;">

                                                <i class="bi bi-check-lg fs-5"></i>

                                            </div>

                                        @else

                                            <div class="rounded-circle bg-light border
                                                        d-flex align-items-center justify-content-center"
                                                 style="width:42px;height:42px;">

                                                <strong>

                                                    {{ chr(65 + $loop->index) }}

                                                </strong>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- Option Text --}}
                                    <div class="flex-grow-1">

                                        <div class="fw-semibold">

                                            {{ $option->option_text }}

                                        </div>


                                        @if($option->is_correct)

                                            <div class="small text-success mt-1">

                                                <i class="bi bi-check-circle-fill me-1"></i>

                                                Correct Answer

                                            </div>

                                        @else

                                            <div class="small text-muted mt-1">

                                                Incorrect Answer

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                {{-- Footer --}}
                <div class="card-footer bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <small class="text-muted">

                            Created:
                            {{ $question->created_at?->format('d M Y, h:i A') }}

                        </small>


                        <span class="badge bg-primary">

                            {{ $question->marks }}

                            {{ $question->marks == 1
                                ? 'Mark'
                                : 'Marks'
                            }}

                        </span>

                    </div>

                </div>

            </div>


            {{-- Delete Section --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="fw-bold text-danger mb-1">

                                Delete Question

                            </h6>

                            <small class="text-muted">

                                Deleting this question will also delete
                                its answer options.

                            </small>

                        </div>


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
                                    class="btn btn-outline-danger">

                                <i class="bi bi-trash me-1"></i>

                                Delete Question

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- Right Sidebar --}}
        <div class="col-lg-4">

            {{-- Test Information --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">

                        <i class="bi bi-journal-check text-primary me-2"></i>

                        Test Information

                    </h6>

                </div>


                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Test
                        </small>

                        <strong>
                            {{ $test->title }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Course
                        </small>

                        <strong>
                            {{ $test->course->name ?? '-' }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Module
                        </small>

                        <strong>
                            {{ $test->module->title ?? '-' }}
                        </strong>

                    </div>


                    <hr>


                    <div class="row text-center">

                        <div class="col-4">

                            <div class="fw-bold fs-5">

                                {{ $question->marks }}

                            </div>

                            <small class="text-muted">
                                Marks
                            </small>

                        </div>


                        <div class="col-4">

                            <div class="fw-bold fs-5">

                                {{ $question->options->count() }}

                            </div>

                            <small class="text-muted">
                                Options
                            </small>

                        </div>


                        <div class="col-4">

                            <div class="fw-bold fs-5">

                                {{ $question->sort_order }}

                            </div>

                            <small class="text-muted">
                                Order
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Question Status --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">

                        <i class="bi bi-shield-check text-success me-2"></i>

                        Question Status

                    </h6>

                </div>


                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Status
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


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Type
                        </span>

                        <strong>

                            {{ strtoupper(
                                str_replace(
                                    '_',
                                    ' ',
                                    $question->question_type
                                )
                            ) }}

                        </strong>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span class="text-muted">
                            Last Updated
                        </span>

                        <strong>

                            {{ $question->updated_at?->format('d M Y') }}

                        </strong>

                    </div>

                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">

                        Quick Actions

                    </h6>

                </div>


                <div class="card-body">

                    <a href="{{ route(
                        'super-admin.tests.questions.edit',
                        [
                            'test' => $test->id,
                            'question' => $question->id
                        ]
                    ) }}"
                       class="btn btn-warning w-100 mb-2">

                        <i class="bi bi-pencil me-1"></i>

                        Edit Question

                    </a>


                    <a href="{{ route(
                        'super-admin.tests.questions.create',
                        $test->id
                    ) }}"
                       class="btn btn-primary w-100 mb-2">

                        <i class="bi bi-plus-lg me-1"></i>

                        Add Another Question

                    </a>


                    <a href="{{ route(
                        'super-admin.tests.questions.index',
                        $test->id
                    ) }}"
                       class="btn btn-outline-secondary w-100">

                        <i class="bi bi-list me-1"></i>

                        All Questions

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
