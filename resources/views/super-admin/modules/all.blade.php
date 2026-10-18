@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Module Management
            </h4>

            <p class="text-muted mb-0">
                Manage all course modules
            </p>
        </div>

        <a href="{{ route('super-admin.courses.index') }}"
           class="btn btn-primary">

            <i class="bi bi-book me-1"></i>

            Courses
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Module Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="fw-bold mb-1">
                        All Modules
                    </h5>

                    <small class="text-muted">
                        Total modules:
                        {{ $modules->total() }}
                    </small>
                </div>

            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                #
                            </th>

                            <th>
                                Module
                            </th>

                            <th>
                                Course
                            </th>

                            <th>
                                Order
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-end px-4">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($modules as $module)

                        <tr>

                            {{-- Number --}}
                            <td class="px-4">

                                {{ $modules->firstItem() + $loop->index }}

                            </td>


                            {{-- Module --}}
                            <td>

                                <div class="fw-semibold">

                                    {{ $module->title }}

                                </div>

                                @if($module->description)

                                    <small class="text-muted">

                                        {{ Str::limit($module->description, 60) }}

                                    </small>

                                @endif

                            </td>


                            {{-- Course --}}
                            <td>

                                @if($module->course)

                                    <span class="fw-semibold">

                                        {{ $module->course->name }}

                                    </span>

                                    <br>

                                    <small class="text-muted">

                                        {{ $module->course->code }}

                                    </small>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Order --}}
                            <td>

                                <span class="badge bg-light text-dark">

                                    {{ $module->sort_order }}

                                </span>

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($module->is_active)

                                    <span class="badge bg-success">

                                        Active

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Action --}}
                            <td class="text-end px-4">

                                @if($module->course)

                                    <a href="{{ route(
                                        'super-admin.courses.modules.show',
                                        [
                                            $module->course_id,
                                            $module->id
                                        ]
                                    ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="View Module">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <a href="{{ route(
                                        'super-admin.courses.modules.edit',
                                        [
                                            $module->course_id,
                                            $module->id
                                        ]
                                    ) }}"
                                    class="btn btn-sm btn-outline-warning"
                                    title="Edit Module">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <div class="mb-3">

                                    <i class="bi bi-layers fs-1 text-muted"></i>

                                </div>

                                <h6 class="fw-bold">
                                    No Modules Found
                                </h6>

                                <p class="text-muted mb-3">
                                    Create a module inside a course.
                                </p>

                                <a href="{{ route('super-admin.courses.index') }}"
                                   class="btn btn-primary">

                                    <i class="bi bi-book me-1"></i>

                                    Go to Courses

                                </a>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($modules->hasPages())

            <div class="card-footer bg-white border-0">

                {{ $modules->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
