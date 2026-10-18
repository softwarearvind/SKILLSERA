@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Test Details
            </h4>

            <p class="text-muted mb-0">
                View test information and manage questions.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('super-admin.tests.index') }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left"></i>
                Back

            </a>

            <a href="{{ route('super-admin.tests.edit', $test->id) }}"
               class="btn btn-warning">

                <i class="bi bi-pencil"></i>
                Edit

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


    <div class="row g-4">

        {{-- Main Details --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="mb-0 fw-semibold">
                            {{ $test->title }}
                        </h5>

                        @if($test->is_active)

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


                <div class="card-body">

                    {{-- Course --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Course
                        </div>

                        <div class="col-md-8 fw-semibold">
                            {{ $test->course->name ?? '-' }}

                            @if($test->course)

                                <span class="text-muted fw-normal">
                                    ({{ $test->course->code }})
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Module --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Module
                        </div>

                        <div class="col-md-8 fw-semibold">
                            {{ $test->module->title ?? '-' }}
                        </div>

                    </div>


                    {{-- Description --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Description
                        </div>

                        <div class="col-md-8">

                            @if($test->description)

                                {!! nl2br(e($test->description)) !!}

                            @else

                                <span class="text-muted">
                                    No description provided.
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Duration --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Duration
                        </div>

                        <div class="col-md-8 fw-semibold">

                            <i class="bi bi-clock me-1"></i>

                            {{ $test->duration_minutes }} minutes

                        </div>

                    </div>


                    {{-- Total Marks --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Total Marks
                        </div>

                        <div class="col-md-8">

                            <span class="badge bg-primary fs-6">
                                {{ $test->total_marks }}
                            </span>

                        </div>

                    </div>


                    {{-- Passing Marks --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Passing Marks
                        </div>

                        <div class="col-md-8">

                            <span class="badge bg-warning text-dark fs-6">
                                {{ $test->passing_marks }}
                            </span>

                        </div>

                    </div>


                    {{-- Attempts --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Attempts Allowed
                        </div>

                        <div class="col-md-8 fw-semibold">

                            {{ $test->attempts_allowed }}

                            {{ $test->attempts_allowed == 1 ? 'Attempt' : 'Attempts' }}

                        </div>

                    </div>


                    {{-- Start --}}
                    <div class="row mb-3">

                        <div class="col-md-4 text-muted">
                            Start Date & Time
                        </div>

                        <div class="col-md-8">

                            @if($test->start_at)

                                {{ $test->start_at->format('d M Y, h:i A') }}

                            @else

                                <span class="text-muted">
                                    Not scheduled
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- End --}}
                    <div class="row">

                        <div class="col-md-4 text-muted">
                            End Date & Time
                        </div>

                        <div class="col-md-8">

                            @if($test->end_at)

                                {{ $test->end_at->format('d M Y, h:i A') }}

                            @else

                                <span class="text-muted">
                                    Not scheduled
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- Questions Section --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="mb-0 fw-semibold">

                            <i class="bi bi-question-circle me-1"></i>

                            Questions

                        </h5>

                        <span class="badge bg-primary">

                            {{ $test->questions->count() }}

                            Questions

                        </span>

                    </div>

                </div>


                <div class="card-body">

                    @if($test->questions->count() > 0)

                        @foreach($test->questions as $index => $question)

                            <div class="border rounded p-3 mb-3">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <span class="fw-bold">
                                            Q{{ $index + 1 }}.
                                        </span>

                                        {{ $question->question }}

                                    </div>

                                    <span class="badge bg-secondary">

                                        {{ $question->marks }}
                                        Marks

                                    </span>

                                </div>

                            </div>

                        @endforeach

                    @else

                        <div class="text-center py-5">

                            <i class="bi bi-question-circle fs-1 text-muted"></i>

                            <h5 class="mt-3">
                                No Questions Added
                            </h5>

                            <p class="text-muted">
                                Add questions to this test before students can attempt it.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- Right Sidebar --}}
        <div class="col-lg-4">

            {{-- Test Summary --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h5 class="mb-0 fw-semibold">
                        Test Summary
                    </h5>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Questions
                        </span>

                        <strong>
                            {{ $test->questions->count() }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Total Marks
                        </span>

                        <strong>
                            {{ $test->total_marks }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Passing Marks
                        </span>

                        <strong>
                            {{ $test->passing_marks }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Duration
                        </span>

                        <strong>
                            {{ $test->duration_minutes }} min
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span class="text-muted">
                            Attempts
                        </span>

                        <strong>
                            {{ $test->attempts_allowed }}
                        </strong>

                    </div>

                </div>

            </div>


            {{-- Manage Questions --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-4">

                    <div class="mb-3">

                        <i class="bi bi-list-check text-primary"
                           style="font-size: 45px;">
                        </i>

                    </div>

                    <h5 class="fw-bold">
                        Manage Questions
                    </h5>

                    <p class="text-muted">
                        Add MCQ questions, options, correct answers and marks.
                    </p>

                    {{-- Route hum next step me banayenge --}}
                    <a href="{{ route(
    'super-admin.tests.questions.index',
    $test->id
) }}"
                       class="btn btn-primary w-100">

                        <i class="bi bi-plus-lg"></i>
                        Manage Questions1

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
