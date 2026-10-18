
@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-file-earmark-text-fill"></i>
                Study Material Details
            </h3>

            <p class="text-muted mb-0">
                View study material information
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('super-admin.study-materials.edit', $material->id) }}"
               class="btn btn-primary">
                <i class="bi bi-pencil-square"></i>
                Edit
            </a>

            <a href="{{ route('super-admin.study-materials.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>

        </div>

    </div>


    <div class="row g-4">

        {{-- Main Information --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">
                        Material Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="mb-4">

                        <label class="text-muted small">
                            Material Title
                        </label>

                        <h4 class="fw-bold mb-0">
                            {{ $material->title }}
                        </h4>

                    </div>


                    <div class="row g-4">

                        {{-- Course --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Course
                            </label>

                            <div class="fw-semibold">
                                {{ $material->course->name ?? 'N/A' }}
                            </div>

                            @if($material->course)
                                <small class="text-muted">
                                    Code: {{ $material->course->code }}
                                </small>
                            @endif

                        </div>


                        {{-- Module --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Module
                            </label>

                            <div class="fw-semibold">
                                {{ $material->module->title ?? 'N/A' }}
                            </div>

                        </div>


                        {{-- File Type --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                File Type
                            </label>

                            <div>

                                @if($material->file_type)

                                    <span class="badge bg-primary">
                                        {{ strtoupper($material->file_type) }}
                                    </span>

                                @else

                                    <span class="text-muted">
                                        External Link
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Status
                            </label>

                            <div>

                                @if($material->is_active)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>


                    <hr class="my-4">


                    {{-- Description --}}
                    <div>

                        <label class="text-muted small">
                            Description
                        </label>

                        @if($material->description)

                            <p class="mb-0 mt-2">
                                {!! nl2br(e($material->description)) !!}
                            </p>

                        @else

                            <p class="text-muted mb-0 mt-2">
                                No description available.
                            </p>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Actions --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">
                        Material Access
                    </h5>
                </div>

                <div class="card-body">

                    {{-- Uploaded File --}}
                    @if($material->file)

                        <div class="mb-4">

                            <div class="d-flex align-items-center mb-2">

                                <i class="bi bi-file-earmark-arrow-down fs-3 text-primary me-2"></i>

                                <div>
                                    <strong>Uploaded File</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ strtoupper($material->file_type ?? 'FILE') }}
                                    </small>
                                </div>

                            </div>

                            <a href="{{ asset('storage/' . $material->file) }}"
                               target="_blank"
                               class="btn btn-primary w-100">

                                <i class="bi bi-eye me-1"></i>
                                Open / Download File

                            </a>

                        </div>

                    @endif


                    {{-- External URL --}}
                    @if($material->external_url)

                        <div class="mb-3">

                            <div class="d-flex align-items-center mb-2">

                                <i class="bi bi-link-45deg fs-3 text-success me-2"></i>

                                <div>
                                    <strong>External Link</strong>
                                    <br>
                                    <small class="text-muted">
                                        Online Resource
                                    </small>
                                </div>

                            </div>

                            <a href="{{ $material->external_url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-success w-100">

                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                Open External Link

                            </a>

                        </div>

                    @endif


                    {{-- No File / URL --}}
                    @if(!$material->file && !$material->external_url)

                        <div class="text-center py-4">

                            <i class="bi bi-file-earmark-x fs-1 text-muted"></i>

                            <p class="text-muted mt-2 mb-0">
                                No file or external link available.
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- Record Information --}}
            <div class="card border-0 shadow-sm mt-4">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">
                        Record Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Created At
                        </small>

                        <strong>
                            {{ $material->created_at?->format('d M Y, h:i A') }}
                        </strong>

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Last Updated
                        </small>

                        <strong>
                            {{ $material->updated_at?->format('d M Y, h:i A') }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

