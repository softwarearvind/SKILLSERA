@extends('layouts.student')

@section('title', $test->title)

@section('content')

<div class="container-fluid py-4">

    <div class="mb-3">

        <a
            href="{{ route('student.tests.index') }}"
            class="text-decoration-none"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Exams / Tests
        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- Header --}}
            <div class="d-flex align-items-start gap-3 mb-4">

                <div class="test-icon">

                    <i class="bi bi-pencil-square"></i>

                </div>

                <div>

                    <h3 class="fw-bold mb-1">
                        {{ $test->title }}
                    </h3>

                    <div class="text-muted">

                        {{ $test->course->name ?? '' }}

                        @if($test->module)

                            /
                            {{ $test->module->title }}

                        @endif

                    </div>

                </div>

            </div>


            {{-- Test Information --}}
            <div class="row g-3 mb-4">

                <div class="col-md-3">

                    <div class="info-box">

                        <small class="text-muted">
                            Duration
                        </small>

                        <h5 class="fw-bold mb-0">
                            {{ $test->duration_minutes }} Minutes
                        </h5>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="info-box">

                        <small class="text-muted">
                            Total Marks
                        </small>

                        <h5 class="fw-bold mb-0">
                            {{ $test->total_marks }}
                        </h5>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="info-box">

                        <small class="text-muted">
                            Passing Marks
                        </small>

                        <h5 class="fw-bold mb-0">
                            {{ $test->passing_marks }}
                        </h5>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="info-box">

                        <small class="text-muted">
                            Attempts
                        </small>

                        <h5 class="fw-bold mb-0">
                            {{ $test->attempts_allowed }}
                        </h5>

                    </div>

                </div>

            </div>


            {{-- Description --}}
            @if($test->description)

                <div class="mb-4">

                    <h5 class="fw-bold">
                        Test Instructions
                    </h5>

                    <div class="text-muted">

                        {!! nl2br(e($test->description)) !!}

                    </div>

                </div>

            @endif


            {{-- Questions Count --}}
            <div class="border rounded p-4 mb-4">

                <div class="d-flex justify-content-between">

                    <span>
                        Total Questions
                    </span>

                    <strong>
                        {{ $test->questions->count() }}
                    </strong>

                </div>

            </div>


            {{-- Start Test --}}
            <div class="text-center py-3">

                <a
                    href="{{ route('student.start', ['id' => $test->id]) }}"
                    class="btn btn-primary btn-lg px-5"
                >

                    <i class="bi bi-play-fill me-1"></i>

                    Start Test

                </a>

                <p class="text-muted small mt-2 mb-0">

                    Test attempt system will be connected next.

                </p>

            </div>

        </div>

    </div>

</div>


<style>

.test-icon {
    width: 55px;
    height: 55px;
    border-radius: 12px;
    background: #eef4ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    flex-shrink: 0;
}

.info-box {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
}

</style>

@endsection
