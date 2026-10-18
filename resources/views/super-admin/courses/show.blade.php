@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                {{ $course->name }}
            </h4>

            <p class="text-muted mb-0">
                Course details and module management
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('super-admin.courses.index') }}"
               class="btn btn-light border">

                <i class="bi bi-arrow-left me-1"></i>
                Back
            </a>

            <a href="{{ route('super-admin.courses.edit', $course->id) }}"
               class="btn btn-dark">

                <i class="bi bi-pencil me-1"></i>
                Edit Course
            </a>

        </div>

    </div>


    {{-- Course Information --}}
    <div class="row g-4">

        {{-- Main Details --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Course Information
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <small class="text-muted">
                                Course Name
                            </small>

                            <div class="fw-semibold mt-1">
                                {{ $course->name }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Course Code
                            </small>

                            <div class="mt-1">

                                <span class="badge bg-light text-dark">
                                    {{ $course->code }}
                                </span>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Duration
                            </small>

                            <div class="fw-semibold mt-1">
                                {{ $course->duration ?? '-' }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Fees
                            </small>

                            <div class="fw-semibold mt-1">
                                ₹{{ number_format($course->fees, 2) }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Mode
                            </small>

                            <div class="mt-1 text-capitalize">
                                {{ $course->mode }}
                            </div>

                        </div>


                        <div class="col-md-6">

                            <small class="text-muted">
                                Status
                            </small>

                            <div class="mt-1">

                                @if($course->is_active)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Inactive
                                    </span>

                                @endif

                            </div>

                        </div>


                        <div class="col-12">

                            <small class="text-muted">
                                Description
                            </small>

                            <div class="mt-2">

                                @if($course->description)

                                    {!! nl2br(e($course->description)) !!}

                                @else

                                    <span class="text-muted">
                                        No description available.
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Module Management --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Module Management
                    </h5>

                </div>

                <div class="card-body">

                    <div class="text-center py-3">

                        <i class="bi bi-layers-fill fs-1 text-primary"></i>

                        <h5 class="fw-bold mt-3">
                            Course Modules
                        </h5>

                        <p class="text-muted">
                            Manage lessons, training modules
                            and course content.
                        </p>

                        <a href="{{ route(
                            'super-admin.courses.modules.index',
                            $course->id
                        ) }}"
                           class="btn btn-primary w-100">

                            <i class="bi bi-layers-fill me-1"></i>
                            Manage Modules

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
