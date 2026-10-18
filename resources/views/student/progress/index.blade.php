@extends('layouts.student')

@section('title', 'My Progress')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold mb-1">
            My Progress
        </h3>

        <p class="text-muted mb-0">
            Track your course and module learning progress.
        </p>
    </div>


    {{-- Statistics --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">
                        Overall Progress
                    </small>

                    <h2 class="fw-bold text-primary mb-0">
                        {{ $overallProgress }}%
                    </h2>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">
                        Total Modules
                    </small>

                    <h2 class="fw-bold mb-0">
                        {{ $totalModules }}
                    </h2>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">
                        Completed
                    </small>

                    <h2 class="fw-bold text-success mb-0">
                        {{ $completedModules }}
                    </h2>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">
                        In Progress
                    </small>

                    <h2 class="fw-bold text-warning mb-0">
                        {{ $inProgressModules }}
                    </h2>
                </div>
            </div>
        </div>

    </div>


    {{-- Overall Progress --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between mb-2">

                <strong>
                    Overall Course Progress
                </strong>

                <strong>
                    {{ $overallProgress }}%
                </strong>

            </div>

            <div
                class="progress"
                style="height: 12px;"
            >

                <div
                    class="progress-bar"
                    role="progressbar"
                    style="width: {{ $overallProgress }}%;"
                    aria-valuenow="{{ $overallProgress }}"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>

            </div>

        </div>

    </div>


    {{-- Module Progress --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h5 class="fw-bold mb-4">
                Module Progress
            </h5>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Module</th>
                            <th>Progress</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($progress as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $item->course->name ?? '-' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $item->module->title ?? 'Course Overall' }}
                                </td>

                                <td style="min-width: 180px;">

                                    <div class="d-flex justify-content-between mb-1">

                                        <small>
                                            Progress
                                        </small>

                                        <small class="fw-bold">
                                            {{ $item->progress_percentage }}%
                                        </small>

                                    </div>

                                    <div
                                        class="progress"
                                        style="height: 8px;"
                                    >

                                        <div
                                            class="progress-bar"
                                            style="width: {{ $item->progress_percentage }}%;"
                                        ></div>

                                    </div>

                                </td>

                                <td>

                                    @if($item->status === 'completed')

                                        <span class="badge bg-success">
                                            Completed
                                        </span>

                                    @elseif($item->status === 'in_progress')

                                        <span class="badge bg-warning text-dark">
                                            In Progress
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Not Started
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="text-center py-5"
                                >

                                    <i class="bi bi-graph-up fs-1 text-muted"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        No progress data available yet.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
