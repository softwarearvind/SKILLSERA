@extends('layouts.student')

@section('title', 'Course Details')

@section('content')

@php

    $course = $batch->course;

@endphp


<div class="container-fluid">


    {{-- Header --}}
    <div class="d-flex flex-wrap
                justify-content-between
                align-items-center
                gap-3 mb-4">

        <div>

            <a
                href="{{ route('student.courses.index') }}"
                class="text-decoration-none small"
            >

                <i class="bi bi-arrow-left"></i>

                My Courses

            </a>

            <h3 class="fw-bold mt-2 mb-1">

                {{ $course->name }}

            </h3>

            <p class="text-muted mb-0">

                {{ $course->code }}

                ·

                Batch:
                {{ $batch->name }}

            </p>

        </div>


        <span class="badge bg-success px-3 py-2">

            <i class="bi bi-check-circle me-1"></i>

            Enrolled

        </span>

    </div>


    {{-- Course Overview --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="row g-4 align-items-center">

                <div class="col-lg-8">

                    <h5 class="fw-bold">

                        Course Overview

                    </h5>

                    <p class="text-muted mb-3">

                        {{ $course->description
                            ?? 'Welcome to your training course.' }}

                    </p>


                    <div class="row g-3">

                        <div class="col-md-4">

                            <div class="course-stat">

                                <i class="bi bi-layers-fill"></i>

                                <div>

                                    <small>
                                        Modules
                                    </small>

                                    <strong>
                                        {{ $course->modules->count() }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="course-stat">

                                <i class="bi bi-calendar-event"></i>

                                <div>

                                    <small>
                                        Start Date
                                    </small>

                                    <strong>

                                        {{ $batch->start_date
                                            ? $batch->start_date
                                                ->format('d M Y')
                                            : '—' }}

                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="course-stat">

                                <i class="bi bi-display"></i>

                                <div>

                                    <small>
                                        Mode
                                    </small>

                                    <strong>

                                        {{ ucfirst(
                                            $batch->mode
                                        ) }}

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="course-progress-box">

                        <div class="text-muted small">

                            Overall Progress

                        </div>

                        <div class="progress-circle">

                            0%

                        </div>

                        <div class="progress"
                             style="height:8px;">

                            <div
                                class="progress-bar"
                                style="width:0%;"
                            ></div>

                        </div>

                        <small class="text-muted">

                            Keep learning to complete
                            your course.

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Modules --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">

            <h5 class="fw-bold mb-1">

                Course Modules

            </h5>

            <small class="text-muted">

                Complete each module to finish the course.

            </small>

        </div>


        <div class="card-body p-4">


            @forelse($course->modules as $index => $module)

                <div class="module-item">

                    <div class="module-number">

                        {{ $index + 1 }}

                    </div>


                    <div class="flex-grow-1">

                        <h6 class="fw-bold mb-1">

                            {{ $module->title }}

                        </h6>

                        <p class="text-muted small mb-2">

                            {{ \Illuminate\Support\Str::limit(
                                $module->description
                                    ?? 'Training module',
                                120
                            ) }}

                        </p>


                        <div class="d-flex flex-wrap gap-3">

                            <small class="text-muted">

                                <i class="bi bi-file-earmark-text"></i>

                                {{ $module->studyMaterials->count() }}
                                Materials

                            </small>


                            <small class="text-muted">

                                <i class="bi bi-pencil-square"></i>

                                {{ $module->onlineTests->count() }}
                                Tests

                            </small>

                        </div>

                    </div>


                    <div>

                        <button
                            type="button"
                            class="btn btn-outline-primary"
                            disabled
                        >

                            Start Module

                            <i class="bi bi-arrow-right ms-1"></i>

                        </button>

                    </div>

                </div>

            @empty

                <div class="text-center py-5">

                    <i class="bi bi-layers fs-1 text-muted"></i>

                    <h6 class="fw-bold mt-3">

                        No Modules Available

                    </h6>

                    <p class="text-muted mb-0">

                        Modules will appear here when
                        the institute adds them.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>


<style>

.course-stat {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #f8f9fa;
    padding: 13px;
    border-radius: 10px;
}

.course-stat > i {
    color: #4f46e5;
    font-size: 21px;
}

.course-stat small,
.course-stat strong {
    display: block;
}

.course-stat small {
    color: #6b7280;
    font-size: 11px;
}

.course-stat strong {
    margin-top: 2px;
    font-size: 14px;
}

.course-progress-box {
    background: #f8f9ff;
    border-radius: 14px;
    padding: 25px;
    text-align: center;
}

.progress-circle {
    font-size: 38px;
    font-weight: 700;
    color: #4f46e5;
    margin: 10px 0;
}

.module-item {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 20px 0;
    border-bottom: 1px solid #eeeeee;
}

.module-item:last-child {
    border-bottom: 0;
}

.module-number {
    min-width: 45px;
    height: 45px;
    border-radius: 12px;
    background: #eef2ff;
    color: #4f46e5;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

@media(max-width: 767px) {

    .module-item {
        align-items: flex-start;
    }

    .module-item > div:last-child {
        display: none;
    }

}

</style>

@endsection