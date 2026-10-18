@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-journal-text me-2"></i>
                Assignment Details
            </h3>
            <p class="text-muted mb-0">
                View complete assignment information.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('super-admin.assignments.edit', $assignment->id) }}"
               class="btn btn-primary">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>

            <a href="{{ route('super-admin.assignments.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <div class="row g-4">

        {{-- Assignment Information --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Assignment Information</h5>
                </div>

                <div class="card-body">

                    <div class="mb-4">
                        <label class="text-muted small">Assignment Title</label>
                        <h4 class="fw-bold mb-0">
                            {{ $assignment->title }}
                        </h4>
                    </div>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="text-muted small">Course</label>
                            <div class="fw-semibold">
                                {{ $assignment->course->name ?? 'N/A' }}
                            </div>

                            @if($assignment->course)
                                <small class="text-muted">
                                    Code: {{ $assignment->course->code }}
                                </small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted small">Module</label>
                            <div class="fw-semibold">
                                {{ $assignment->module->title ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted small">Due Date</label>
                            <div class="fw-semibold">
                                {{ $assignment->due_date
                                    ? $assignment->due_date->format('d M Y')
                                    : 'No deadline' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted small">Total Marks</label>
                            <div>
                                <span class="badge bg-primary fs-6">
                                    {{ $assignment->total_marks }} Marks
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted small">Status</label>
                            <div>
                                @if($assignment->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted small">Created At</label>
                            <div class="fw-semibold">
                                {{ $assignment->created_at?->format('d M Y, h:i A') }}
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <label class="text-muted small">Description / Instructions</label>

                    <div class="mt-2">
                        @if($assignment->description)
                            {!! nl2br(e($assignment->description)) !!}
                        @else
                            <p class="text-muted mb-0">
                                No description available.
                            </p>
                        @endif
                    </div>

                </div>
            </div>

        </div>

        {{-- File & Actions --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Assignment File</h5>
                </div>

                <div class="card-body">

                    @if($assignment->file)

                        <div class="text-center py-3">
                            <i class="bi bi-file-earmark-text display-3 text-primary"></i>

                            <p class="fw-semibold mt-3 mb-1">
                                {{ basename($assignment->file) }}
                            </p>

                            <p class="text-muted small">
                                Uploaded assignment document
                            </p>
                        </div>

                        <a href="{{ asset('storage/' . $assignment->file) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-primary w-100">
                            <i class="bi bi-download me-1"></i>
                            Open / Download File
                        </a>

                    @else

                        <div class="text-center py-4">
                            <i class="bi bi-file-earmark-x display-4 text-muted"></i>
                            <p class="text-muted mt-3 mb-0">
                                No file uploaded.
                            </p>
                        </div>

                    @endif

                    <hr>

                    <a href="{{ route('super-admin.assignments.edit', $assignment->id) }}"
                       class="btn btn-outline-primary w-100 mb-2">
                        <i class="bi bi-pencil-square me-1"></i>
                        Edit Assignment
                    </a>

                    <a href="{{ route('super-admin.assignments.index') }}"
                       class="btn btn-light border w-100">
                        Back to Assignments
                    </a>

                </div>
            </div>

            {{-- Record Details --}}
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Record Information</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <small class="text-muted d-block">Assignment ID</small>
                        <strong>#{{ $assignment->id }}</strong>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Created</small>
                        <strong>
                            {{ $assignment->created_at?->format('d M Y') }}
                        </strong>
                    </div>

                    <div>
                        <small class="text-muted d-block">Last Updated</small>
                        <strong>
                            {{ $assignment->updated_at?->format('d M Y, h:i A') }}
                        </strong>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
