@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                {{ $batch->name }}
            </h4>

            <p class="text-muted mb-0">
                Batch Code: {{ $batch->code }}
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('super-admin.batches.edit', $batch->id) }}"
               class="btn btn-warning">

                <i class="bi bi-pencil me-1"></i>
                Edit Batch

            </a>

            <a href="{{ route('super-admin.batches.index') }}"
               class="btn btn-light border">

                <i class="bi bi-arrow-left me-1"></i>
                Back

            </a>

        </div>

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


    <div class="row g-4">


        {{-- LEFT SIDE --}}
        <div class="col-lg-8">


            {{-- Batch Overview --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-info-circle text-primary me-2"></i>

                        Batch Information

                    </h5>

                </div>


                <div class="card-body">

                    <div class="row g-4">


                        {{-- Course --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Course
                            </div>

                            @if($batch->course)

                                <div class="fw-semibold fs-6">
                                    {{ $batch->course->name }}
                                </div>

                                <small class="text-muted">
                                    Code: {{ $batch->course->code }}
                                </small>

                            @else

                                <span class="text-muted">
                                    Course deleted
                                </span>

                            @endif

                        </div>


                        {{-- Batch Name --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Batch Name
                            </div>

                            <div class="fw-semibold">
                                {{ $batch->name }}
                            </div>

                        </div>


                        {{-- Batch Code --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Batch Code
                            </div>

                            <div class="fw-semibold">
                                {{ $batch->code }}
                            </div>

                        </div>


                        {{-- Capacity --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Capacity
                            </div>

                            <div class="fw-semibold">

                                {{ $batch->students->count() }}

                                <span class="text-muted fw-normal">
                                    / {{ $batch->capacity }} Students
                                </span>

                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Status
                            </div>

                            @if($batch->is_active)

                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    <i class="bi bi-pause-circle me-1"></i>
                                    Inactive
                                </span>

                            @endif

                        </div>


                        {{-- Mode --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Mode
                            </div>

                            @if($batch->mode === 'online')

                                <span class="badge bg-primary">
                                    <i class="bi bi-globe me-1"></i>
                                    Online
                                </span>

                            @elseif($batch->mode === 'hybrid')

                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-diagram-3 me-1"></i>
                                    Hybrid
                                </span>

                            @else

                                <span class="badge bg-info text-dark">
                                    <i class="bi bi-building me-1"></i>
                                    Offline
                                </span>

                            @endif

                        </div>


                    </div>

                </div>

            </div>


            {{-- Schedule --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-calendar-event text-primary me-2"></i>

                        Class Schedule

                    </h5>

                </div>


                <div class="card-body">

                    <div class="row g-4">


                        {{-- Start Date --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Start Date
                            </div>

                            <div class="fw-semibold">

                                {{ $batch->start_date?->format('d M Y') ?? '-' }}

                            </div>

                        </div>


                        {{-- End Date --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                End Date
                            </div>

                            <div class="fw-semibold">

                                {{ $batch->end_date?->format('d M Y') ?? 'Not specified' }}

                            </div>

                        </div>


                        {{-- Time --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Class Time
                            </div>

                            <div class="fw-semibold">

                                @if($batch->start_time || $batch->end_time)

                                    {{ $batch->start_time ?? '-' }}
                                    -
                                    {{ $batch->end_time ?? '-' }}

                                @else

                                    Not specified

                                @endif

                            </div>

                        </div>


                        {{-- Days --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Class Days
                            </div>

                            <div class="fw-semibold">

                                {{ $batch->days ?? 'Not specified' }}

                            </div>

                        </div>


                        {{-- Room --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Classroom / Room
                            </div>

                            <div class="fw-semibold">

                                {{ $batch->room ?? 'Not specified' }}

                            </div>

                        </div>


                        {{-- Meeting Link --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Online Meeting
                            </div>

                            @if($batch->meeting_link)

                                <a href="{{ $batch->meeting_link }}"
                                   target="_blank"
                                   class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-camera-video me-1"></i>
                                    Join Meeting

                                </a>

                            @else

                                <span class="text-muted">
                                    No meeting link
                                </span>

                            @endif

                        </div>


                    </div>

                </div>

            </div>


            {{-- Description --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-card-text text-primary me-2"></i>

                        Description

                    </h5>

                </div>


                <div class="card-body">

                    @if($batch->description)

                        <p class="mb-0 text-muted"
                           style="white-space: pre-line;">
                            {{ $batch->description }}
                        </p>

                    @else

                        <span class="text-muted">
                            No description available.
                        </span>

                    @endif

                </div>

            </div>


            {{-- Assigned Students --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="fw-bold mb-1">

                                <i class="bi bi-people-fill text-primary me-2"></i>

                                Assigned Students

                            </h5>

                            <small class="text-muted">
                                Students assigned to this batch
                            </small>

                        </div>

                        <span class="badge bg-primary">

                            {{ $batch->students->count() }}

                            / {{ $batch->capacity }}

                        </span>

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
                                        Student
                                    </th>

                                    <th>
                                        Email
                                    </th>

                                    <th>
                                        Phone
                                    </th>

                                    <th>
                                        Joined
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($batch->students as $student)

                                    <tr>

                                        <td class="px-4">

                                            {{ $loop->iteration }}

                                        </td>


                                        <td>

                                            <div class="d-flex align-items-center">

                                                <div class="rounded-circle bg-primary bg-opacity-10
                                                            text-primary d-flex align-items-center
                                                            justify-content-center me-2"
                                                     style="width:40px;height:40px;">

                                                    {{ strtoupper(substr($student->name, 0, 1)) }}

                                                </div>


                                                <div>

                                                    <div class="fw-semibold">

                                                        {{ $student->name }}

                                                    </div>

                                                    <small class="text-muted">

                                                        Student ID:
                                                        {{ $student->id }}

                                                    </small>

                                                </div>

                                            </div>

                                        </td>


                                        <td>

                                            {{ $student->email }}

                                        </td>


                                        <td>

                                            {{ $student->phone ?? '-' }}

                                        </td>


                                        <td>

                                            {{ $student->pivot->joined_at
                                                ? \Carbon\Carbon::parse($student->pivot->joined_at)->format('d M Y')
                                                : '-' }}

                                        </td>


                                        <td>

                                            @if($student->pivot->is_active)

                                                <span class="badge bg-success">
                                                    Active
                                                </span>

                                            @else

                                                <span class="badge bg-secondary">
                                                    Inactive
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center py-5">

                                            <i class="bi bi-person-x fs-1 text-muted"></i>

                                            <h6 class="fw-bold mt-2">
                                                No Students Assigned
                                            </h6>

                                            <p class="text-muted mb-3">
                                                No students have been assigned to this batch yet.
                                            </p>

                                            <a href="{{ route('super-admin.batches.edit', $batch->id) }}"
                                               class="btn btn-primary btn-sm">

                                                <i class="bi bi-person-plus me-1"></i>
                                                Assign Students

                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="col-lg-4">


            {{-- Quick Summary --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-bar-chart-fill text-primary me-2"></i>
                        Batch Summary
                    </h5>

                </div>


                <div class="card-body">


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Total Capacity
                        </span>

                        <strong>
                            {{ $batch->capacity }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Assigned Students
                        </span>

                        <strong>
                            {{ $batch->students->count() }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Available Seats
                        </span>

                        <strong class="text-success">

                            {{ max(0, $batch->capacity - $batch->students->count()) }}

                        </strong>

                    </div>


                    <hr>


                    <div class="d-flex justify-content-between">

                        <span class="text-muted">
                            Status
                        </span>

                        @if($batch->is_active)

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


            {{-- Course --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-book-fill text-primary me-2"></i>
                        Course
                    </h5>

                </div>


                <div class="card-body">

                    @if($batch->course)

                        <h6 class="fw-bold">
                            {{ $batch->course->name }}
                        </h6>

                        <p class="text-muted small mb-2">
                            {{ $batch->course->code }}
                        </p>

                        @if($batch->course->description)

                            <p class="text-muted small mb-3">

                                {{ \Illuminate\Support\Str::limit(
                                    $batch->course->description,
                                    150
                                ) }}

                            </p>

                        @endif


                        <a href="{{ route(
                            'super-admin.courses.show',
                            $batch->course->id
                        ) }}"
                           class="btn btn-sm btn-outline-primary">

                            <i class="bi bi-eye me-1"></i>
                            View Course

                        </a>

                    @else

                        <span class="text-muted">
                            Course not available.
                        </span>

                    @endif

                </div>

            </div>


            {{-- Actions --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-lightning-fill text-primary me-2"></i>
                        Quick Actions
                    </h5>

                </div>


                <div class="card-body">


                    <a href="{{ route(
                        'super-admin.batches.edit',
                        $batch->id
                    ) }}"
                       class="btn btn-warning w-100 mb-2">

                        <i class="bi bi-pencil me-1"></i>
                        Edit Batch

                    </a>


                    <form method="POST"
                          action="{{ route(
                              'super-admin.batches.toggle-status',
                              $batch->id
                          ) }}"
                          class="mb-2">

                        @csrf

                        <button type="submit"
                                class="btn btn-outline-success w-100">

                            @if($batch->is_active)

                                <i class="bi bi-pause me-1"></i>
                                Deactivate Batch

                            @else

                                <i class="bi bi-play me-1"></i>
                                Activate Batch

                            @endif

                        </button>

                    </form>


                    <form method="POST"
                          action="{{ route(
                              'super-admin.batches.destroy',
                              $batch->id
                          ) }}"
                          onsubmit="return confirm('Are you sure you want to delete this batch?');">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-outline-danger w-100">

                            <i class="bi bi-trash me-1"></i>
                            Delete Batch

                        </button>

                    </form>

                </div>

            </div>


        </div>

    </div>

</div>

@endsection
