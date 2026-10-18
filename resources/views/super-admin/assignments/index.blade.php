@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-journal-text"></i>
                Assignments
            </h3>

            <p class="text-muted mb-0">
                Manage course and module assignments.
            </p>
        </div>

        <a href="{{ route('super-admin.assignments.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>
            Add Assignment

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Statistics --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Total Assignments
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $totalAssignments }}
                            </h3>
                        </div>

                        <div class="text-primary fs-2">
                            <i class="bi bi-journal-text"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Active
                            </small>

                            <h3 class="fw-bold text-success mb-0">
                                {{ $activeAssignments }}
                            </h3>
                        </div>

                        <div class="text-success fs-2">
                            <i class="bi bi-check-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Inactive
                            </small>

                            <h3 class="fw-bold text-danger mb-0">
                                {{ $inactiveAssignments }}
                            </h3>
                        </div>

                        <div class="text-danger fs-2">
                            <i class="bi bi-x-circle"></i>
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
                  action="{{ route('super-admin.assignments.index') }}">

                <div class="row g-3 align-items-end">

                    {{-- Search --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Search
                        </label>

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Search assignment, course or module...">

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

                            <option value="active"
                                {{ request('status') == 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-md-3 d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-search"></i>
                            Search

                        </button>

                        <a href="{{ route('super-admin.assignments.index') }}"
                           class="btn btn-light border">

                            <i class="bi bi-arrow-clockwise"></i>

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Assignment Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-bold">
                Assignment List
            </h5>

        </div>


        <div class="card-body p-0">

            @if($assignments->count())

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4">
                                    #
                                </th>

                                <th>
                                    Assignment
                                </th>

                                <th>
                                    Course
                                </th>

                                <th>
                                    Module
                                </th>

                                <th>
                                    Due Date
                                </th>

                                <th>
                                    Marks
                                </th>

                                <th>
                                    Status
                                </th>

                                <th class="text-end px-4">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($assignments as $assignment)

                                <tr>

                                    <td class="px-4">

                                        {{ $assignments->firstItem() + $loop->index }}

                                    </td>


                                    {{-- Assignment --}}
                                    <td>

                                        <div class="fw-semibold">

                                            {{ $assignment->title }}

                                        </div>

                                        @if($assignment->file)

                                            <small class="text-muted">

                                                <i class="bi bi-paperclip"></i>
                                                File attached

                                            </small>

                                        @endif

                                    </td>


                                    {{-- Course --}}
                                    <td>

                                        {{ $assignment->course->name ?? 'N/A' }}

                                        @if($assignment->course)

                                            <small class="d-block text-muted">

                                                {{ $assignment->course->code }}

                                            </small>

                                        @endif

                                    </td>


                                    {{-- Module --}}
                                    <td>

                                        {{ $assignment->module->title ?? 'N/A' }}

                                    </td>


                                    {{-- Due Date --}}
                                    <td>

                                        @if($assignment->due_date)

                                            {{ $assignment->due_date->format('d M Y') }}

                                        @else

                                            <span class="text-muted">
                                                No deadline
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Marks --}}
                                    <td>

                                        <span class="badge bg-light text-dark border">

                                            {{ $assignment->total_marks }}

                                            Marks

                                        </span>

                                    </td>


                                    {{-- Status --}}
                                    <td>

                                        @if($assignment->is_active)

                                            <span class="badge bg-success">

                                                Active

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Inactive

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Actions --}}
                                    <td class="text-end px-4">

                                        <div class="dropdown">

                                            <button class="btn btn-sm btn-light border"
                                                    data-bs-toggle="dropdown">

                                                <i class="bi bi-three-dots-vertical"></i>

                                            </button>


                                            <ul class="dropdown-menu dropdown-menu-end">

                                                {{-- View --}}
                                                <li>

                                                    <a class="dropdown-item"
                                                       href="{{ route('super-admin.assignments.show', $assignment->id) }}">

                                                        <i class="bi bi-eye me-2"></i>

                                                        View

                                                    </a>

                                                </li>


                                                {{-- Edit --}}
                                                <li>

                                                    <a class="dropdown-item"
                                                       href="{{ route('super-admin.assignments.edit', $assignment->id) }}">

                                                        <i class="bi bi-pencil-square me-2"></i>

                                                        Edit

                                                    </a>

                                                </li>


                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>


                                                {{-- Toggle Status --}}
                                                <li>

                                                    <form action="{{ route('super-admin.assignments.toggle-status', $assignment->id) }}"
                                                          method="POST">

                                                        @csrf

                                                        <button type="submit"
                                                                class="dropdown-item">

                                                            @if($assignment->is_active)

                                                                <i class="bi bi-pause-circle me-2"></i>
                                                                Deactivate

                                                            @else

                                                                <i class="bi bi-check-circle me-2"></i>
                                                                Activate

                                                            @endif

                                                        </button>

                                                    </form>

                                                </li>


                                                {{-- Delete --}}
                                                <li>

                                                    <form action="{{ route('super-admin.assignments.destroy', $assignment->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this assignment?');">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                class="dropdown-item text-danger">

                                                            <i class="bi bi-trash me-2"></i>

                                                            Delete

                                                        </button>

                                                    </form>

                                                </li>

                                            </ul>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}
                <div class="p-3">

                    {{ $assignments->links() }}

                </div>

            @else

                {{-- Empty State --}}
                <div class="text-center py-5">

                    <i class="bi bi-journal-x display-4 text-muted"></i>

                    <h5 class="mt-3">
                        No Assignments Found
                    </h5>

                    <p class="text-muted">
                        Start by creating your first assignment.
                    </p>

                    <a href="{{ route('super-admin.assignments.create') }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-lg"></i>
                        Add Assignment

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection

