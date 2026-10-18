@extends('layouts.admin')

@section('title', 'Progress Details')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Progress Details
            </h3>

            <p class="text-muted mb-0">
                Student module progress
            </p>

        </div>

        <a
            href="{{ route(
                'super-admin.progress.edit',
                $progress->id
            ) }}"
            class="btn btn-primary"
        >
            <i class="bi bi-pencil me-1"></i>
            Edit Progress
        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-6">

                    <small class="text-muted">
                        Student
                    </small>

                    <h5 class="fw-bold">
                        {{ $progress->student->name ?? 'N/A' }}
                    </h5>

                    <p class="text-muted">
                        {{ $progress->student->email ?? '' }}
                    </p>

                </div>


                <div class="col-md-6">

                    <small class="text-muted">
                        Course
                    </small>

                    <h5 class="fw-bold">
                        {{ $progress->course->name ?? 'N/A' }}
                    </h5>

                </div>


                <div class="col-md-6">

                    <small class="text-muted">
                        Module
                    </small>

                    <h5 class="fw-bold">
                        {{ $progress->module->title ?? 'N/A' }}
                    </h5>

                </div>


                <div class="col-md-6">

                    <small class="text-muted">
                        Status
                    </small>

                    <div class="mt-1">

                        @if($progress->status === 'completed')

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @elseif($progress->status === 'in_progress')

                            <span class="badge bg-warning text-dark">
                                In Progress
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Not Started
                            </span>

                        @endif

                    </div>

                </div>


                <div class="col-12">

                    <small class="text-muted">
                        Progress
                    </small>

                    <div class="d-flex align-items-center gap-3 mt-2">

                        <div
                            class="progress flex-grow-1"
                            style="height: 12px;"
                        >

                            <div
                                class="progress-bar {{ $progress->progress_percentage >= 100 ? 'bg-success' : '' }}"
                                style="width: {{ $progress->progress_percentage }}%"
                            ></div>

                        </div>

                        <strong>
                            {{ $progress->progress_percentage }}%
                        </strong>

                    </div>

                </div>


                <div class="col-md-6">

                    <small class="text-muted">
                        Started At
                    </small>

                    <div>
                        {{ $progress->started_at
                            ? $progress->started_at->format('d M Y h:i A')
                            : 'Not started'
                        }}
                    </div>

                </div>


                <div class="col-md-6">

                    <small class="text-muted">
                        Completed At
                    </small>

                    <div>
                        {{ $progress->completed_at
                            ? $progress->completed_at->format('d M Y h:i A')
                            : 'Not completed'
                        }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
