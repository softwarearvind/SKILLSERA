@extends('layouts.student')

@section('title', 'Student Dashboard')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between
                align-items-center gap-3 mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                Welcome,
                {{ $student->name }}

                👋

            </h3>

            <p class="text-muted mb-0">

                Manage your training, courses and progress.

            </p>

        </div>

        <div>

            <span class="badge bg-success px-3 py-2">

                <i class="bi bi-check-circle me-1"></i>

                Account Active

            </span>

        </div>

    </div>


    {{-- Statistics --}}
    <div class="row g-4 mb-4">

        {{-- Courses --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-primary-subtle text-primary">

                    <i class="bi bi-book-fill"></i>

                </div>

                <div>

                    <div class="stat-label">
                        My Courses
                    </div>

                    <div class="stat-value">
                        {{ $totalCourses }}
                    </div>

                </div>

            </div>

        </div>


        {{-- Completed --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-success-subtle text-success">

                    <i class="bi bi-check-circle-fill"></i>

                </div>

                <div>

                    <div class="stat-label">
                        Completed
                    </div>

                    <div class="stat-value">
                        {{ $completedCourses }}
                    </div>

                </div>

            </div>

        </div>


        {{-- Progress --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-warning-subtle text-warning">

                    <i class="bi bi-hourglass-split"></i>

                </div>

                <div>

                    <div class="stat-label">
                        In Progress
                    </div>

                    <div class="stat-value">
                        {{ $inProgressCourses }}
                    </div>

                </div>

            </div>

        </div>


        {{-- Certificates --}}
        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-info-subtle text-info">

                    <i class="bi bi-award-fill"></i>

                </div>

                <div>

                    <div class="stat-label">
                        Certificates
                    </div>

                    <div class="stat-value">
                        {{ $totalCertificates }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="row g-4">

        {{-- My Courses --}}
        <div class="col-xl-8">

            <div class="card dashboard-card">

                <div class="card-header bg-white border-0
                            d-flex justify-content-between
                            align-items-center">

                    <div>

                        <h5 class="fw-bold mb-1">

                            My Courses

                        </h5>

                        <small class="text-muted">

                            Courses assigned by institute

                        </small>

                    </div>

                </div>


                <div class="card-body">

                    @forelse($batches as $batch)

                        @php

                            $courseProgress = $progress
                                ->where(
                                    'course_id',
                                    $batch->course_id
                                )
                                ->first();

                            $percentage =
                                $courseProgress
                                ->progress_percentage
                                ?? 0;

                        @endphp


                        <div class="course-item">

                            <div class="course-icon">

                                <i class="bi bi-mortarboard-fill"></i>

                            </div>


                            <div class="flex-grow-1">

                                <div class="d-flex
                                            justify-content-between
                                            align-items-start">

                                    <div>

                                        <h6 class="fw-bold mb-1">

                                            {{ $batch->course->name
                                                ?? 'Course' }}

                                        </h6>

                                        <small class="text-muted">

                                            Batch:
                                            {{ $batch->name }}

                                        </small>

                                    </div>


                                    <span class="badge
                                        bg-primary-subtle
                                        text-primary">

                                        {{ $percentage }}%

                                    </span>

                                </div>


                                <div class="progress mt-3"
                                     style="height: 7px;">

                                    <div
                                        class="progress-bar"
                                        role="progressbar"
                                        style="width:
                                            {{ $percentage }}%"
                                    ></div>

                                </div>


                                <div class="d-flex
                                            justify-content-between
                                            mt-2">

                                    <small class="text-muted">

                                        {{ $batch->mode
                                            ?? 'Training' }}

                                    </small>

                                    <small class="text-muted">

                                        @if($batch->start_date)

                                            Starts:
                                            {{ $batch->start_date
                                                ->format('d M Y') }}

                                        @endif

                                    </small>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-5">

                            <i class="bi bi-book fs-1
                                      text-muted"></i>

                            <h6 class="mt-3">

                                No course assigned yet

                            </h6>

                            <p class="text-muted mb-0">

                                Your assigned courses will
                                appear here.

                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- Certificates --}}
        <div class="col-xl-4">

            <div class="card dashboard-card">

                <div class="card-header bg-white border-0">

                    <h5 class="fw-bold mb-1">

                        My Certificates

                    </h5>

                    <small class="text-muted">

                        Your completed course certificates

                    </small>

                </div>


                <div class="card-body">

                    @forelse($certificates as $certificate)

                        <div class="certificate-item">

                            <div class="certificate-icon">

                                <i class="bi bi-award-fill"></i>

                            </div>

                            <div class="flex-grow-1">

                                <h6 class="fw-bold mb-1">

                                    {{ $certificate->course->name
                                        ?? 'Certificate' }}

                                </h6>

                                <small class="text-muted">

                                    {{ $certificate->certificate_number }}

                                </small>

                                <div class="mt-2">

                                    <a
                                        href="{{ route(
                                            'certificate.verify',
                                            $certificate
                                                ->certificate_number
                                        ) }}"
                                        target="_blank"
                                        class="btn btn-sm
                                               btn-outline-primary"
                                    >

                                        <i class="bi bi-eye"></i>

                                        View

                                    </a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-4">

                            <i class="bi bi-award fs-1
                                      text-muted"></i>

                            <p class="text-muted mt-2 mb-0">

                                No certificate available yet.

                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>


    {{-- Progress --}}
    <div class="card dashboard-card mt-4">

        <div class="card-header bg-white border-0">

            <h5 class="fw-bold mb-1">

                Learning Progress

            </h5>

            <small class="text-muted">

                Track your module progress

            </small>

        </div>


        <div class="card-body">

            @forelse($progress as $item)

                <div class="progress-item mb-4">

                    <div class="d-flex
                                justify-content-between
                                mb-2">

                        <div>

                            <strong>

                                {{ $item->course->name
                                    ?? 'Course' }}

                            </strong>

                            @if($item->module)

                                <div>

                                    <small class="text-muted">

                                        {{ $item->module->title }}

                                    </small>

                                </div>

                            @endif

                        </div>


                        <span class="fw-bold">

                            {{ $item->progress_percentage }}%

                        </span>

                    </div>


                    <div class="progress"
                         style="height: 8px;">

                        <div
                            class="progress-bar"
                            style="width:
                                {{ $item->progress_percentage }}%"
                        ></div>

                    </div>

                </div>

            @empty

                <div class="text-center py-4">

                    <i class="bi bi-graph-up fs-1
                              text-muted"></i>

                    <p class="text-muted mt-2 mb-0">

                        Your learning progress will
                        appear here.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>


<style>

.stat-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 22px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 5px 20px rgba(0,0,0,.06);
}

.stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.stat-label {
    color: #6c757d;
    font-size: 13px;
}

.stat-value {
    font-size: 27px;
    font-weight: 700;
    color: #111827;
}

.dashboard-card {
    border: 0;
    border-radius: 14px;
    box-shadow: 0 5px 20px rgba(0,0,0,.06);
}

.course-item {
    display: flex;
    gap: 15px;
    padding: 18px 0;
    border-bottom: 1px solid #eeeeee;
}

.course-item:last-child {
    border-bottom: 0;
}

.course-icon {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    background: #eef2ff;
    color: #4f46e5;
    display: flex;
    align-items: center;
    justify-content: center;
}

.certificate-item {
    display: flex;
    gap: 12px;
    padding: 15px 0;
    border-bottom: 1px solid #eeeeee;
}

.certificate-item:last-child {
    border-bottom: 0;
}

.certificate-icon {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: #fff8e7;
    color: #c49a5a;
    display: flex;
    align-items: center;
    justify-content: center;
}

.progress-item:last-child {
    margin-bottom: 0 !important;
}

</style>

@endsection