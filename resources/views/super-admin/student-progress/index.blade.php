@extends('layouts.admin')


@section('title', 'Student Progress')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-graph-up-arrow text-primary"></i>
                Student Progress
            </h3>

            <p class="text-muted mb-0">
                Monitor student course and module progress
            </p>
        </div>

    </div>


    {{-- Statistics --}}
    <div class="row g-4 mb-4">

        {{-- Total --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Total Progress
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalProgress }}
                            </h3>
                        </div>

                        <div class="bg-primary bg-opacity-10
                                    text-primary rounded-circle
                                    p-3">

                            <i class="bi bi-bar-chart-fill fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Completed --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Completed
                            </p>

                            <h3 class="fw-bold text-success mb-0">
                                {{ $completedProgress }}
                            </h3>

                        </div>

                        <div class="bg-success bg-opacity-10
                                    text-success rounded-circle
                                    p-3">

                            <i class="bi bi-check-circle-fill fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- In Progress --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                In Progress
                            </p>

                            <h3 class="fw-bold text-warning mb-0">
                                {{ $inProgress }}
                            </h3>

                        </div>

                        <div class="bg-warning bg-opacity-10
                                    text-warning rounded-circle
                                    p-3">

                            <i class="bi bi-hourglass-split fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Not Started --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Not Started
                            </p>

                            <h3 class="fw-bold text-secondary mb-0">
                                {{ $notStarted }}
                            </h3>

                        </div>

                        <div class="bg-secondary bg-opacity-10
                                    text-secondary rounded-circle
                                    p-3">

                            <i class="bi bi-circle fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Filters --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.student-progress.index') }}">

                <div class="row g-3 align-items-end">

                    {{-- Search --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Search Student
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Student name or email"
                            value="{{ request('search') }}"
                        >

                    </div>


                    {{-- Course --}}
                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Course
                        </label>

                        <select name="course_id"
                                class="form-select">

                            <option value="">
                                All Courses
                            </option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ request('course_id') == $course->id ? 'selected' : '' }}
                                >
                                    {{ $course->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="">
                                All Status
                            </option>

                            <option value="not_started"
                                {{ request('status') == 'not_started' ? 'selected' : '' }}>
                                Not Started
                            </option>

                            <option value="in_progress"
                                {{ request('status') == 'in_progress' ? 'selected' : '' }}>
                                In Progress
                            </option>

                            <option value="completed"
                                {{ request('status') == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-md-2 d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary w-100">

                            <i class="bi bi-search"></i>
                            Search

                        </button>

                        <a href="{{ route('super-admin.student-progress.index') }}"
                           class="btn btn-light border">

                            <i class="bi bi-arrow-clockwise"></i>

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Progress Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Student Progress List
            </h5>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                Student
                            </th>

                            <th>
                                Course
                            </th>

                            <th>
                                Module
                            </th>

                            <th>
                                Progress
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Started
                            </th>

                            <th class="text-end px-4">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($progress as $item)

                            <tr>

                                {{-- Student --}}
                                <td class="px-4">

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle
                                                   bg-primary
                                                   text-white
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   me-2"
                                            style="width:40px;height:40px;"
                                        >

                                            {{ strtoupper(
                                                substr(
                                                    $item->student->name ?? 'S',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                        <div>

                                            <div class="fw-semibold">

                                                {{ $item->student->name ?? 'N/A' }}

                                            </div>

                                            <small class="text-muted">

                                                {{ $item->student->email ?? '' }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Course --}}
                                <td>

                                    <span class="fw-semibold">

                                        {{ $item->course->name ?? 'N/A' }}

                                    </span>

                                </td>


                                {{-- Module --}}
                                <td>

                                    {{ $item->module->title ?? 'Overall Course' }}

                                </td>


                                {{-- Progress --}}
                                <td style="min-width:180px;">

                                    <div class="d-flex
                                                justify-content-between
                                                mb-1">

                                        <small class="fw-semibold">

                                            {{ $item->progress_percentage }}%

                                        </small>

                                    </div>

                                    <div class="progress"
                                         style="height:8px;">

                                        <div
                                            class="progress-bar
                                                @if($item->progress_percentage >= 100)
                                                    bg-success
                                                @elseif($item->progress_percentage > 0)
                                                    bg-primary
                                                @else
                                                    bg-secondary
                                                @endif"
                                            role="progressbar"
                                            style="width:
                                                {{ $item->progress_percentage }}%"
                                        ></div>

                                    </div>

                                </td>


                                {{-- Status --}}
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


                                {{-- Started --}}
                                <td>

                                    @if($item->started_at)

                                        {{ $item->started_at->format('d M Y') }}

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- Action --}}
                                <td class="text-end px-4">

                                    <a href="{{ route(
                                        'super-admin.student-progress.show',
                                        $item->id
                                    ) }}"
                                       class="btn btn-sm btn-outline-primary">

                                        <i class="bi bi-eye"></i>
                                        View

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="bi bi-graph-up fs-1"></i>

                                        <h5 class="mt-3">
                                            No Student Progress Found
                                        </h5>

                                        <p class="mb-0">
                                            Student progress will appear here.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($progress->hasPages())

            <div class="card-footer bg-white">

                {{ $progress->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
