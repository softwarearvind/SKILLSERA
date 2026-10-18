@extends('layouts.admin')

@section('title', 'Attendance History')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-clock-history me-2"></i>
                Attendance History
            </h3>

            <p class="text-muted mb-0">
                View and filter student attendance records.
            </p>
        </div>

        <a href="{{ route('super-admin.attendance.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Mark Attendance

        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Filters --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.attendance.history') }}">

                <div class="row g-3 align-items-end">

                    {{-- Batch --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Batch
                        </label>

                        <select name="batch_id"
                                class="form-select">

                            <option value="">
                                All Batches
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


                    {{-- Date --}}
                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Date
                        </label>

                        <input type="date"
                               name="date"
                               class="form-control"
                               value="{{ request('date') }}">

                    </div>


                    {{-- Status --}}
                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="">
                                All Status
                            </option>

                            <option value="present"
                                {{ request('status') === 'present' ? 'selected' : '' }}>
                                Present
                            </option>

                            <option value="absent"
                                {{ request('status') === 'absent' ? 'selected' : '' }}>
                                Absent
                            </option>

                            <option value="half_day"
                                {{ request('status') === 'half_day' ? 'selected' : '' }}>
                                Half Day
                            </option>

                        </select>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-md-2">

                        <button type="submit"
                                class="btn btn-primary w-100">

                            <i class="bi bi-funnel me-1"></i>
                            Filter

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Attendance Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    Attendance Records
                </h5>

                <span class="badge bg-light text-dark">

                    {{ $attendances->total() }} Records

                </span>

            </div>

        </div>


        @if($attendances->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Student</th>

                            <th>Course</th>

                            <th>Batch</th>

                            <th>Date</th>

                            <th>Status</th>

                            <th>Remarks</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($attendances as $attendance)

                            <tr>

                                {{-- # --}}
                                <td>

                                    {{ $attendances->firstItem() + $loop->index }}

                                </td>


                                {{-- Student --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $attendance->student->name ?? 'N/A' }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $attendance->student->email ?? '' }}

                                    </small>

                                </td>


                                {{-- Course --}}
                                <td>

                                    {{ $attendance->batch->course->name ?? 'N/A' }}

                                </td>


                                {{-- Batch --}}
                                <td>

                                    <span class="badge bg-light text-dark">

                                        {{ $attendance->batch->name ?? 'N/A' }}

                                    </span>

                                </td>


                                {{-- Date --}}
                                <td>

                                    {{ $attendance->attendance_date
                                        ? $attendance->attendance_date->format('d M Y')
                                        : 'N/A'
                                    }}

                                </td>


                                {{-- Status --}}
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


                                {{-- Remarks --}}
                                <td>

                                    @if($attendance->remarks)

                                        {{ $attendance->remarks }}

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="card-footer bg-white">

                {{ $attendances->links() }}

            </div>

        @else

            <div class="text-center py-5">

                <i class="bi bi-calendar-x fs-1 text-muted"></i>

                <h5 class="mt-3">
                    No Attendance Records
                </h5>

                <p class="text-muted mb-0">
                    No attendance records match your filters.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection
