@extends('layouts.student')

@section('title', 'My Attendance')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h3 class="fw-bold mb-1">
            My Attendance
        </h3>

        <p class="text-muted mb-0">
            View your course and batch attendance.
        </p>
    </div>


    {{-- Statistics --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small class="text-muted">
                        Total Classes
                    </small>

                    <h3 class="fw-bold mb-0">
                        {{ $total }}
                    </h3>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small class="text-muted">
                        Present
                    </small>

                    <h3 class="fw-bold text-success mb-0">
                        {{ $present }}
                    </h3>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small class="text-muted">
                        Absent
                    </small>

                    <h3 class="fw-bold text-danger mb-0">
                        {{ $absent }}
                    </h3>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <small class="text-muted">
                        Half Day
                    </small>

                    <h3 class="fw-bold text-warning mb-0">
                        {{ $halfDay }}
                    </h3>
                </div>
            </div>
        </div>

    </div>


    {{-- Attendance Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Course</th>
                            <th>Batch</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($attendances as $attendance)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $attendance->attendance_date?->format('d M Y') }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $attendance->batch->course->name ?? '-' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $attendance->batch->name ?? '-' }}
                                </td>

                                <td>

                                    @if($attendance->status === 'present')

                                        <span class="badge bg-success">
                                            Present
                                        </span>

                                    @elseif($attendance->status === 'absent')

                                        <span class="badge bg-danger">
                                            Absent
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Half Day
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $attendance->remarks ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-calendar-x fs-1 text-muted"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        No attendance records found.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($attendances->hasPages())

                <div class="mt-3">
                    {{ $attendances->links() }}
                </div>

            @endif

        </div>

    </div>

</div>

@endsection
