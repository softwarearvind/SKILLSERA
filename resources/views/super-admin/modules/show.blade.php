@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                {{ $module->title }}
            </h4>

            <p class="text-muted mb-0">
                Course: {{ $course->name }}
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route(
                'super-admin.courses.modules.index',
                $course->id
            ) }}"
               class="btn btn-light border">

                <i class="bi bi-arrow-left me-1"></i>
                Back to Modules

            </a>

            <a href="{{ route(
                'super-admin.courses.modules.edit',
                [$course->id, $module->id]
            ) }}"
               class="btn btn-dark">

                <i class="bi bi-pencil me-1"></i>
                Edit Module

            </a>

        </div>

    </div>


    {{-- Module Details --}}
    <div class="row g-4">

        {{-- Main Information --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Module Information
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-4">

                        {{-- Module Title --}}
                        <div class="col-md-8">

                            <small class="text-muted">
                                Module Title
                            </small>

                            <div class="fw-semibold fs-5 mt-1">
                                {{ $module->title }}
                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-4">

                            <small class="text-muted">
                                Status
                            </small>

                            <div class="mt-1">

                                @if($module->is_active)

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


                        {{-- Course --}}
                        <div class="col-md-6">

                            <small class="text-muted">
                                Course
                            </small>

                            <div class="fw-semibold mt-1">
                                {{ $course->name }}
                            </div>

                        </div>


                        {{-- Course Code --}}
                        <div class="col-md-3">

                            <small class="text-muted">
                                Course Code
                            </small>

                            <div class="mt-1">

                                <span class="badge bg-light text-dark">
                                    {{ $course->code }}
                                </span>

                            </div>

                        </div>


                        {{-- Sort Order --}}
                        <div class="col-md-3">

                            <small class="text-muted">
                                Module Order
                            </small>

                            <div class="fw-semibold mt-1">

                                {{ $module->sort_order }}

                            </div>

                        </div>


                        {{-- Slug --}}
                        <div class="col-12">

                            <small class="text-muted">
                                Slug
                            </small>

                            <div class="mt-1">

                                <code>
                                    {{ $module->slug ?? '-' }}
                                </code>

                            </div>

                        </div>


                        {{-- Description --}}
                        <div class="col-12">

                            <small class="text-muted">
                                Description
                            </small>

                            <div class="mt-2">

                                @if($module->description)

                                    {!! nl2br(e($module->description)) !!}

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


        {{-- Module Content --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Module Content
                    </h5>

                </div>

                <div class="card-body">

                    <div class="text-center py-3">

                        <i class="bi bi-collection-play fs-1 text-primary"></i>

                        <h5 class="fw-bold mt-3">
                            Training Content
                        </h5>

                        <p class="text-muted">
                            Manage lessons, videos, study materials,
                            assignments and tests for this module.
                        </p>

                        <button type="button"
                                class="btn btn-primary w-100"
                                disabled>

                            <i class="bi bi-plus-lg me-1"></i>
                            Manage Content

                        </button>

                        <small class="text-muted d-block mt-2">
                            Content management will be added next.
                        </small>

                    </div>

                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="card border-0 shadow-sm mt-4">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">
                        Quick Actions
                    </h6>

                </div>

                <div class="card-body">

                    <div class="d-grid gap-2">

                        <a href="{{ route(
                            'super-admin.courses.modules.edit',
                            [$course->id, $module->id]
                        ) }}"
                           class="btn btn-outline-dark">

                            <i class="bi bi-pencil me-1"></i>
                            Edit Module

                        </a>


                        <form method="POST"
                              action="{{ route(
                                  'super-admin.courses.modules.toggle-status',
                                  [$course->id, $module->id]
                              ) }}">

                            @csrf

                            <button type="submit"
                                    class="btn btn-outline-warning w-100">

                                <i class="bi bi-power me-1"></i>

                                {{ $module->is_active
                                    ? 'Deactivate Module'
                                    : 'Activate Module' }}

                            </button>

                        </form>


                        <form method="POST"
                              action="{{ route(
                                  'super-admin.courses.modules.destroy',
                                  [$course->id, $module->id]
                              ) }}"
                              onsubmit="return confirm('Delete this module?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-outline-danger w-100">

                                <i class="bi bi-trash me-1"></i>
                                Delete Module

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
