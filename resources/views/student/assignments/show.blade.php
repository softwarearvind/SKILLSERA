@extends('layouts.student')

@section('title', $assignment->title)

@section('content')

<div class="container-fluid py-4">

    <div class="mb-3">

        <a
            href="{{ route('student.assignments.index') }}"
            class="text-decoration-none"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Assignments
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="d-flex align-items-start gap-3 mb-4">

                <div class="assignment-icon">
                    <i class="bi bi-journal-text"></i>
                </div>

                <div>

                    <h3 class="fw-bold mb-1">
                        {{ $assignment->title }}
                    </h3>

                    <div class="text-muted">

                        {{ $assignment->course->name ?? '' }}

                        @if($assignment->module)
                            /
                            {{ $assignment->module->title }}
                        @endif

                    </div>

                </div>

            </div>

            <div class="row g-3 mb-4">

                <div class="col-md-4">

                    <div class="info-box">

                        <small class="text-muted">
                            Total Marks
                        </small>

                        <h5 class="fw-bold mb-0">
                            {{ $assignment->total_marks }}
                        </h5>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-box">

                        <small class="text-muted">
                            Due Date
                        </small>

                        <h5 class="fw-bold mb-0">

                            @if($assignment->due_date)

                                {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y') }}

                            @else

                                No Deadline

                            @endif

                        </h5>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-box">

                        <small class="text-muted">
                            Module
                        </small>

                        <h5 class="fw-bold mb-0">

                            {{ $assignment->module->title ?? '-' }}

                        </h5>

                    </div>

                </div>

            </div>

            @if($assignment->description)

                <div class="mb-4">

                    <h5 class="fw-bold">
                        Assignment Instructions
                    </h5>

                    <div class="text-muted">
                        {!! nl2br(e($assignment->description)) !!}
                    </div>

                </div>

            @endif

            @if($assignment->file)

                <div class="border rounded p-4 mb-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <i class="bi bi-file-earmark-arrow-down fs-3"></i>

                            <strong class="ms-2">
                                Assignment File
                            </strong>

                        </div>

                        <a
                            href="{{ asset('storage/' . $assignment->file) }}"
                            target="_blank"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-download me-1"></i>
                            Download
                        </a>

                    </div>

                </div>

            @endif

            {{-- Submission will be added next --}}
            <div class="alert alert-info">

                <i class="bi bi-info-circle me-2"></i>

                Assignment submission system will be available here.

            </div>

        </div>

    </div>

</div>

<style>

.assignment-icon {
    width: 55px;
    height: 55px;
    border-radius: 12px;
    background: #eef4ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    flex-shrink: 0;
}

.info-box {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
}

</style>

@endsection
