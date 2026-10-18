@extends('layouts.student')

@section('title', 'Exams / Tests')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Exams / Tests
        </h3>

        <p class="text-muted mb-0">
            View and attempt tests assigned to your courses.
        </p>

    </div>


    <div class="row g-4">

        @forelse($tests as $test)

            @php

                $now = now();

                $notStarted = $test->start_at &&
                    $now->lt($test->start_at);

                $expired = $test->end_at &&
                    $now->gt($test->end_at);

            @endphp

            <div class="col-xl-4 col-lg-6">

                <div class="card test-card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between mb-3">

                            <div class="test-icon">

                                <i class="bi bi-pencil-square"></i>

                            </div>


                            @if($expired)

                                <span class="badge bg-danger">
                                    Expired
                                </span>

                            @elseif($notStarted)

                                <span class="badge bg-warning text-dark">
                                    Upcoming
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Available
                                </span>

                            @endif

                        </div>


                        <h5 class="fw-bold mb-2">
                            {{ $test->title }}
                        </h5>


                        <div class="small text-muted mb-2">

                            <i class="bi bi-book me-1"></i>

                            {{ $test->course->name ?? 'Course' }}

                        </div>


                        <div class="small text-muted mb-3">

                            <i class="bi bi-layers me-1"></i>

                            {{ $test->module->title ?? 'Module' }}

                        </div>


                        <div class="row g-2 mb-3">

                            <div class="col-4">

                                <div class="test-info">

                                    <small class="text-muted">
                                        Duration
                                    </small>

                                    <strong>
                                        {{ $test->duration_minutes }} min
                                    </strong>

                                </div>

                            </div>


                            <div class="col-4">

                                <div class="test-info">

                                    <small class="text-muted">
                                        Marks
                                    </small>

                                    <strong>
                                        {{ $test->total_marks }}
                                    </strong>

                                </div>

                            </div>


                            <div class="col-4">

                                <div class="test-info">

                                    <small class="text-muted">
                                        Passing
                                    </small>

                                    <strong>
                                        {{ $test->passing_marks }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="small text-muted mb-3">

                            Attempts Allowed:
                            <strong>
                                {{ $test->attempts_allowed }}
                            </strong>

                        </div>


                        <a
                            href="{{ route('student.tests.show', $test->id) }}"
                            class="btn btn-primary w-100"
                        >

                            <i class="bi bi-eye me-1"></i>

                            View Test

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-pencil-square fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            No Tests Available
                        </h5>

                        <p class="text-muted mb-0">
                            Tests will appear here when they are assigned to your course.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>


    @if($tests->hasPages())

        <div class="mt-4">
            {{ $tests->links() }}
        </div>

    @endif

</div>


<style>

.test-card {
    transition: .2s ease;
}

.test-card:hover {
    transform: translateY(-4px);
}

.test-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    background: #eef4ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

.test-info {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
}

.test-info small,
.test-info strong {
    display: block;
}

</style>

@endsection
