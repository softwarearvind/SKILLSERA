@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Course Management
            </h4>

            <p class="text-muted mb-0">
                Manage institute courses and training programs.
            </p>
        </div>

        <a href="{{ route('super-admin.courses.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>

            Add Course

        </a>

    </div>


    {{-- Alerts --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Statistics --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        Total Courses
                    </div>

                    <h3 class="fw-bold mb-0">
                        {{ $totalCourses }}
                    </h3>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        Active Courses
                    </div>

                    <h3 class="fw-bold text-success mb-0">
                        {{ $activeCourses }}
                    </h3>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="text-muted small">
                        Inactive Courses
                    </div>

                    <h3 class="fw-bold text-secondary mb-0">
                        {{ $inactiveCourses }}
                    </h3>

                </div>

            </div>

        </div>

    </div>


    {{-- Search --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-2">

                    <div class="col-md-7">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Search course name or code...">

                    </div>


                    <div class="col-md-3">

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


                    <div class="col-md-2">

                        <button class="btn btn-dark w-100">

                            <i class="bi bi-search me-1"></i>
                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Courses Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                Course
                            </th>

                            <th>
                                Code
                            </th>

                            <th>
                                Duration
                            </th>

                            <th>
                                Fees
                            </th>

                            <th>
                                Mode
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

                    @forelse($courses as $course)

                        <tr>

                            <td class="px-4">

                                <div class="fw-semibold">
                                    {{ $course->name }}
                                </div>

                            </td>


                            <td>

                                <span class="badge bg-light text-dark">
                                    {{ $course->code }}
                                </span>

                            </td>


                            <td>
                                {{ $course->duration ?? '-' }}
                            </td>


                            <td>
                                ₹{{ number_format($course->fees, 2) }}
                            </td>


                            <td>

                                <span class="text-capitalize">
                                    {{ $course->mode }}
                                </span>

                            </td>


                            <td>

                                @if($course->is_active)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            <td class="text-end px-4">

                                  <a href="{{ route('super-admin.courses.modules.index', $course->id) }}"
       class="btn btn-sm btn-outline-success"
       title="Manage Modules">

        <i class="bi bi-layers-fill"></i>

    </a>

                                <a href="{{ route('super-admin.courses.show', $course->id) }}"
                                   class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-eye"></i>

                                </a>


                                <a href="{{ route('super-admin.courses.edit', $course->id) }}"
                                   class="btn btn-sm btn-outline-dark">

                                    <i class="bi bi-pencil"></i>

                                </a>


                                <form method="POST"
                                      action="{{ route('super-admin.courses.toggle-status', $course->id) }}"
                                      class="d-inline">

                                    @csrf

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-warning">

                                        <i class="bi bi-power"></i>

                                    </button>

                                </form>


                                <form method="POST"
                                      action="{{ route('super-admin.courses.destroy', $course->id) }}"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this course?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                <div class="text-muted">

                                    <i class="bi bi-book fs-2 d-block mb-2"></i>

                                    No courses found.

                                </div>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($courses->hasPages())

            <div class="card-footer bg-white border-0">

                {{ $courses->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
