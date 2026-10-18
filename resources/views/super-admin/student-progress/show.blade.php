@extends('layouts.admin')

@section('title', 'Student Progress Details')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-graph-up-arrow text-primary"></i>
                Student Progress Details
            </h3>

            <p class="text-muted mb-0">
                Detailed progress information
            </p>
        </div>

        <a href="{{ route('super-admin.student-progress.index') }}"
           class="btn btn-light border">

            <i class="bi bi-arrow-left"></i>
            Back

        </a>

    </div>


    {{-- Student Information --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row align-items-center">

                {{-- Student --}}
                <div class="col-md-6">

                    <div class="d-flex align-items-center">

                        <div
                            class="rounded-circle bg-primary text-white
                                   d-flex align-items-center
                                   justify-content-center me-3"
                            style="width:65px;height:65px;font-size:24px;"
                        >

                            {{ strtoupper(
                                substr(
                                    $progress->student->name ?? 'S',
                                    0,
                                    1
                                )
                            ) }}

                        </div>

                        <div>

                            <h4 class="fw-bold mb-1">

                                {{ $progress->student->name ?? 'N/A' }}

                            </h4>

                            <p class="text-muted mb-0">

                                <i class="bi bi-envelope"></i>

                                {{ $progress->student->email ?? 'N/A' }}

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Course --}}
                <div class="col-md-6 mt-3 mt-md-0">

                    <div class="bg-light rounded p-3">

                        <small class="text-muted">
                            Course
                        </small>

                        <h5 class="fw-bold mb-0">

                            {{ $progress->course->name ?? 'N/A' }}

                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Progress Summary --}}
    <div class="row g-4 mb-4">

        {{-- Progress --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                        <h6 class="fw-bold mb-0">
                            Overall Progress
                        </h6>

                        <i class="bi bi-bar-chart-fill
                                  text-primary fs-4"></i>

                    </div>


                    <h2 class="fw-bold mb-3">

                        {{ $progress->progress_percentage }}%

                    </h2>


                    <div class="progress"
                         style="height:12px;">

                        <div
                            class="progress-bar
                                @if($progress->progress_percentage >= 100)
                                    bg-success
                                @elseif($progress->progress_percentage > 0)
                                    bg-primary
                                @else
                                    bg-secondary
                                @endif"
                            style="width:
                                {{ $progress->progress_percentage }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Status --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                        <h6 class="fw-bold mb-0">
                            Status
                        </h6>

                        <i class="bi bi-check-circle
                                  text-success fs-4"></i>

                    </div>


                    @if($progress->status === 'completed')

                        <span class="badge bg-success fs-6 px-3 py-2">
                            Completed
                        </span>

                    @elseif($progress->status === 'in_progress')

                        <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                            In Progress
                        </span>

                    @else

                        <span class="badge bg-secondary fs-6 px-3 py-2">
                            Not Started
                        </span>

                    @endif

                </div>

            </div>

        </div>


        {{-- Module --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center
                                mb-3">

                        <h6 class="fw-bold mb-0">
                            Module
                        </h6>

                        <i class="bi bi-layers-fill
                                  text-primary fs-4"></i>

                    </div>


                    <h5 class="fw-bold">

                        {{ $progress->module->title ?? 'Overall Course' }}

                    </h5>

                </div>

            </div>

        </div>

    </div>


    {{-- Timeline / Dates --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                <i class="bi bi-calendar-event text-primary"></i>
                Progress Timeline
            </h5>

        </div>


        <div class="card-body">

            <div class="row">

                {{-- Started --}}
                <div class="col-md-6">

                    <div class="border rounded p-3">

                        <small class="text-muted">
                            Started At
                        </small>

                        <h6 class="fw-bold mt-1 mb-0">

                            @if($progress->started_at)

                                {{ $progress->started_at->format('d M Y, h:i A') }}

                            @else

                                Not Started

                            @endif

                        </h6>

                    </div>

                </div>


                {{-- Completed --}}
                <div class="col-md-6 mt-3 mt-md-0">

                    <div class="border rounded p-3">

                        <small class="text-muted">
                            Completed At
                        </small>

                        <h6 class="fw-bold mt-1 mb-0">

                            @if($progress->completed_at)

                                {{ $progress->completed_at->format('d M Y, h:i A') }}

                            @else

                                Not Completed

                            @endif

                        </h6>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Course Information --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                <i class="bi bi-book text-primary"></i>
                Course Information
            </h5>

        </div>


        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-4">

                    <small class="text-muted">
                        Course Name
                    </small>

                    <div class="fw-semibold mt-1">

                        {{ $progress->course->name ?? 'N/A' }}

                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Course Code
                    </small>

                    <div class="fw-semibold mt-1">

                        {{ $progress->course->code ?? 'N/A' }}

                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Duration
                    </small>

                    <div class="fw-semibold mt-1">

                        {{ $progress->course->duration ?? 'N/A' }}

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Current Module --}}
    @if($progress->module)

        <div class="card border-0 shadow-sm mb-4">

            <div class="card-header bg-white py-3">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-layers-fill text-primary"></i>

                    Current Module

                </h5>

            </div>


            <div class="card-body">

                <div class="row g-4">

                    <div class="col-md-8">

                        <h5 class="fw-bold">

                            {{ $progress->module->title }}

                        </h5>

                        <p class="text-muted mb-0">

                            {{ $progress->module->description
                                ?? 'No module description available.' }}

                        </p>

                    </div>


                    <div class="col-md-4">

                        <div class="text-md-end">

                            <span class="badge
                                {{ $progress->module->is_active
                                    ? 'bg-success'
                                    : 'bg-secondary' }}">

                                {{ $progress->module->is_active
                                    ? 'Active'
                                    : 'Inactive' }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif


    {{-- Quick Actions --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Quick Actions
            </h5>

        </div>


        <div class="card-body">

            <div class="d-flex flex-wrap gap-2">

                <a href="{{ route(
                    'super-admin.student-progress.index'
                ) }}"
                   class="btn btn-outline-primary">

                    <i class="bi bi-list"></i>
                    All Progress

                </a>


                <a href="{{ route(
                    'super-admin.students.show',
                    $progress->student->id
                ) }}"
                   class="btn btn-outline-dark">

                    <i class="bi bi-person"></i>
                    Student Profile

                </a>

            </div>

        </div>

    </div>

</div>

@endsection
