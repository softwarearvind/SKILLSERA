@extends('layouts.admin')

@section('title', 'Student Progress')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Student Progress
            </h3>

            <p class="text-muted mb-0">
                Manage student module progress
            </p>
        </div>

        <a
            href="{{ route('super-admin.progress.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Add Progress
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- Statistics --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        Total Progress
                    </div>

                    <h3 class="fw-bold mb-0">
                        {{ $totalProgress }}
                    </h3>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        Completed
                    </div>

                    <h3 class="fw-bold text-success mb-0">
                        {{ $completedProgress }}
                    </h3>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        In Progress
                    </div>

                    <h3 class="fw-bold text-warning mb-0">
                        {{ $inProgress }}
                    </h3>

                </div>

            </div>

        </div>


        <div class="col-md-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        Not Started
                    </div>

                    <h3 class="fw-bold text-secondary mb-0">
                        {{ $notStarted }}
                    </h3>

                </div>

            </div>

        </div>

    </div>


    {{-- Filters --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form
                method="GET"
                action="{{ route('super-admin.progress.index') }}"
            >

                <div class="row g-3">

                    <div class="col-md-4">

                        <label class="form-label">
                            Search Student
                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Name or email"
                        >

                    </div>


                    <div class="col-md-3">

                        <label class="form-label">
                            Course
                        </label>

                        <select
                            name="course_id"
                            class="form-select"
                        >

                            <option value="">
                                All Courses
                            </option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    @selected(request('course_id') == $course->id)
                                >
                                    {{ $course->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option value="">
                                All Status
                            </option>

                            <option
                                value="not_started"
                                @selected(request('status') === 'not_started')
                            >
                                Not Started
                            </option>

                            <option
                                value="in_progress"
                                @selected(request('status') === 'in_progress')
                            >
                                In Progress
                            </option>

                            <option
                                value="completed"
                                @selected(request('status') === 'completed')
                            >
                                Completed
                            </option>

                        </select>

                    </div>


                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            <i class="bi bi-search me-1"></i>
                            Filter
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-3">
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

                            <th class="text-end px-3">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($progress as $item)

                            <tr>

                                <td class="px-3">

                                    <div class="fw-semibold">
                                        {{ $item->student->name ?? 'N/A' }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $item->student->email ?? '' }}
                                    </small>

                                </td>


                                <td>
                                    {{ $item->course->name ?? 'N/A' }}
                                </td>


                                <td>
                                    {{ $item->module->title ?? 'N/A' }}
                                </td>


                                <td style="min-width: 150px;">

                                    <div class="progress mb-1"
                                         style="height: 7px;">

                                        <div
                                            class="progress-bar {{ $item->progress_percentage >= 100 ? 'bg-success' : '' }}"
                                            style="width: {{ $item->progress_percentage }}%;"
                                        ></div>

                                    </div>

                                    <small class="fw-semibold">
                                        {{ $item->progress_percentage }}%
                                    </small>

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


                                <td class="text-end px-3">

                                    <a
                                        href="{{ route(
                                            'super-admin.progress.show',
                                            $item->id
                                        ) }}"
                                        class="btn btn-sm btn-outline-info"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a
                                        href="{{ route(
                                            'super-admin.progress.edit',
                                            $item->id
                                        ) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form
                                        action="{{ route(
                                            'super-admin.progress.destroy',
                                            $item->id
                                        ) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Delete this progress record?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-5 text-muted"
                                >
                                    No progress records found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        @if($progress->hasPages())

            <div class="card-footer bg-white">

                {{ $progress->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
