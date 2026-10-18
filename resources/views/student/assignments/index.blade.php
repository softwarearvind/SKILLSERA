@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.student')

@section('title', 'Assignments')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">
            Assignments
        </h3>

        <p class="text-muted mb-0">
            View and complete assignments from your courses.
        </p>
    </div>

    <div class="row g-4">

        @forelse($assignments as $assignment)

            @php
                $isOverdue = $assignment->due_date &&
                    \Carbon\Carbon::parse($assignment->due_date)->isPast();
            @endphp

            <div class="col-xl-4 col-lg-6">

                <div class="card border-0 shadow-sm h-100 assignment-card">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between mb-3">

                            <div class="assignment-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>

                            @if($isOverdue)

                                <span class="badge bg-danger">
                                    Overdue
                                </span>

                            @elseif($assignment->due_date)

                                <span class="badge bg-warning text-dark">
                                    Due {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y') }}
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @endif

                        </div>

                        <h5 class="fw-bold mb-2">
                            {{ $assignment->title }}
                        </h5>

                        <div class="small text-muted mb-2">

                            <i class="bi bi-book me-1"></i>

                            {{ $assignment->course->name ?? 'Course' }}

                        </div>

                        <div class="small text-muted mb-3">

                            <i class="bi bi-layers me-1"></i>

                            {{ $assignment->module->title ?? 'Module' }}

                        </div>

                        @if($assignment->description)

                            <p class="text-muted small">

                                {{ Str::limit($assignment->description, 120) }}

                            </p>

                        @endif

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <span class="small text-muted">
                                Total Marks
                            </span>

                            <strong>
                                {{ $assignment->total_marks }}
                            </strong>

                        </div>

                        <a
                            href="{{ route('student.assignments.show', $assignment->id) }}"
                            class="btn btn-primary w-100"
                        >
                            <i class="bi bi-eye me-1"></i>
                            View Assignment
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-journal-x fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            No Assignments Available
                        </h5>

                        <p class="text-muted mb-0">
                            Your assignments will appear here when assigned.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

    @if($assignments->hasPages())

        <div class="mt-4">
            {{ $assignments->links() }}
        </div>

    @endif

</div>

<style>

.assignment-card {
    transition: .2s ease;
}

.assignment-card:hover {
    transform: translateY(-4px);
}

.assignment-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    background: #eef4ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

</style>

@endsection
