@extends('layouts.admin')

@section('title', 'Attendance Management')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-calendar-check me-2"></i>
                Attendance Management
            </h3>

            <p class="text-muted mb-0">
                Manage student attendance.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('super-admin.attendance.history') }}"
               class="btn btn-outline-dark">

                <i class="bi bi-clock-history me-1"></i>
                History

            </a>

            <a href="{{ route('super-admin.attendance.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle me-1"></i>
                Mark Attendance

            </a>

        </div>

    </div>


    {{-- Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.attendance.index') }}">

                <div class="row g-3 align-items-end">

                    <div class="col-md-5">

                        <label class="form-label fw-semibold">
                            Batch
                        </label>

                        <select name="batch_id"
                                class="form-select">

                            <option value="">
                                -- Select Batch --
                            </option>

                            @foreach($batches as $batch)

                                <option value="{{ $batch->id }}"
                                    {{ request('batch_id') == $batch->id ? 'selected' : '' }}>

                                    {{ $batch->name }}
                                    -
                                    {{ $batch->course->name ?? '' }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Date
                        </label>

                        <input type="date"
                               name="date"
                               class="form-control"
                               value="{{ request('date') }}">

                    </div>


                    <div class="col-md-3">

                        <button type="submit"
                                class="btn btn-primary w-100">

                            <i class="bi bi-search me-1"></i>
                            View Attendance

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Attendance Result --}}
    @if(request()->filled('batch_id') && request()->filled('date'))

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white py-3">

                <h5 class="fw-bold mb-0">
                    Attendance Records
                </h5>

            </div>

            @if($attendances->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>
                                <th>Student</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Remarks</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($attendances as $attendance)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        <div class="fw-semibold">
                                            {{ $attendance->student->name ?? 'N/A' }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $attendance->student->email ?? '' }}
                                        </small>

                                    </td>

                                    <td>

                                        {{ $attendance->attendance_date
                                            ? $attendance->attendance_date->format('d M Y')
                                            : 'N/A'
                                        }}

                                    </td>

                                    <td>

                                        @if($attendance->status === 'present')

                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Present
                                            </span>

                                        @elseif($attendance->status === 'absent')

                                            <span class="badge bg-danger">
                                                <i class="bi bi-x-circle me-1"></i>
                                                Absent
                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-clock me-1"></i>
                                                Half Day
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        {{ $attendance->remarks ?? '—' }}

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-center py-5">

                    <i class="bi bi-calendar-x fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        No Attendance Found
                    </h5>

                    <p class="text-muted">
                        No attendance has been marked for this batch and date.
                    </p>

                </div>

            @endif

        </div>

    @else

        {{-- Empty State --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-calendar-check fs-1 text-primary"></i>

                <h5 class="mt-3">
                    Attendance Management
                </h5>

                <p class="text-muted mb-4">
                    Select a batch and date to view attendance.
                </p>

                <a href="{{ route('super-admin.attendance.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle me-1"></i>
                    Mark New Attendance

                </a>

            </div>

        </div>

    @endif

</div>

@endsection
