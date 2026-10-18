@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Module</h4>
        <p class="text-muted mb-0">
            Update module information
        </p>
    </div>

    <a href="{{ route('super-admin.courses.modules.index', $course->id) }}"
       class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Modules
    </a>
</div>


{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <div class="fw-bold mb-2">
            Please fix the following errors:
        </div>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">

    {{-- Form --}}
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">
                <h5 class="fw-bold mb-0">
                    Module Information
                </h5>
            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route(
                          'super-admin.courses.modules.update',
                          [$course->id, $module->id]
                      ) }}">

                    @csrf
                    @method('PUT')


                    {{-- Course --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Course
                        </label>

                        <input type="text"
                               class="form-control"
                               value="{{ $course->name }}"
                               readonly>

                        <small class="text-muted">
                            Course cannot be changed from here.
                        </small>
                    </div>


                    {{-- Module Title --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Module Title
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $module->title) }}"
                               placeholder="Enter module title">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- Sort Order --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Sort Order
                            <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="sort_order"
                               min="1"
                               class="form-control @error('sort_order') is-invalid @enderror"
                               value="{{ old('sort_order', $module->sort_order) }}">

                        @error('sort_order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <small class="text-muted">
                            Example: 1, 2, 3, 4...
                        </small>
                    </div>


                    {{-- Description --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="6"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Enter module description">{{ old('description', $module->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- Buttons --}}
                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>
                            Update Module
                        </button>

                        <a href="{{ route(
                            'super-admin.courses.modules.index',
                            $course->id
                        ) }}"
                           class="btn btn-light border">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>


    {{-- Module Summary --}}
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 py-3">
                <h6 class="fw-bold mb-0">
                    Current Module
                </h6>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <small class="text-muted d-block">
                        Module
                    </small>

                    <div class="fw-semibold">
                        {{ $module->title }}
                    </div>
                </div>

                <div class="mb-3">
                    <small class="text-muted d-block">
                        Course
                    </small>

                    <div class="fw-semibold">
                        {{ $course->name }}
                    </div>
                </div>

                <div class="mb-3">
                    <small class="text-muted d-block">
                        Sort Order
                    </small>

                    <span class="badge bg-light text-dark">
                        {{ $module->sort_order }}
                    </span>
                </div>

                <div>
                    <small class="text-muted d-block mb-1">
                        Status
                    </small>

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
        </div>


        {{-- Future Module Content --}}
        <div class="card border-0 shadow-sm mt-3">

            <div class="card-body">

                <h6 class="fw-bold">
                    <i class="bi bi-info-circle me-1"></i>
                    Module Content
                </h6>

                <p class="text-muted small mb-0">
                    After creating modules, we will add
                    lessons, videos, study materials,
                    assignments and tests inside each module.
                </p>

            </div>
        </div>

    </div>

</div>


</div>

@endsection
