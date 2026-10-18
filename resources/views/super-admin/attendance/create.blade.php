@extends('layouts.admin')

@section('title', 'Mark Attendance')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-calendar-check me-2"></i>
                Mark Attendance
            </h3>

            <p class="text-muted mb-0">
                Select a batch and date to mark student attendance.
            </p>
        </div>

        <a href="{{ route('super-admin.attendance.history') }}"
           class="btn btn-outline-dark">

            <i class="bi bi-clock-history me-1"></i>
            Attendance History

        </a>

    </div>


    {{-- Success Message --}}
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


    {{-- Error Message --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Select Batch --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.attendance.create') }}">

                <div class="row g-3 align-items-end">

                    {{-- Batch --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Select Batch
                        </label>

                        <select name="batch_id"
                                class="form-select"
                                required>

                            <option value="">
                                -- Select Batch --
                            </option>

                            @foreach($batches as $batch)

                                <option value="{{ $batch->id }}"
                                    {{ request('batch_id') == $batch->id ? 'selected' : '' }}>

                                    {{ $batch->name }}
                                    -
                                    {{ $batch->course->name ?? 'No Course' }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Date --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Attendance Date
                        </label>

                        <input type="date"
                               name="date"
                               class="form-control"
                               value="{{ request('date', now()->format('Y-m-d')) }}"
                               required>

                    </div>


                    {{-- Load --}}
                    <div class="col-md-2">

                        <button type="submit"
                                class="btn btn-primary w-100">

                            <i class="bi bi-search me-1"></i>
                            Load Students

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Students --}}
    @if(request()->filled('batch_id'))

        @if($selectedBatch)

            <div class="card border-0 shadow-sm">

                {{-- Card Header --}}
                <div class="card-header bg-white py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="fw-bold mb-1">

                                {{ $selectedBatch->name }}

                            </h5>

                            <small class="text-muted">

                                {{ $selectedBatch->course->name ?? 'Course' }}

                            </small>

                        </div>

                        <span class="badge bg-primary">

                            {{ $students->count() }} Students

                        </span>

                    </div>

                </div>


                @if($students->count() > 0)

                    <form method="POST"
                          action="{{ route('super-admin.attendance.store') }}">

                        @csrf

                        <input type="hidden"
                               name="batch_id"
                               value="{{ $selectedBatch->id }}">

                        <input type="hidden"
                               name="attendance_date"
                               value="{{ request('date', now()->format('Y-m-d')) }}">


                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr>

                                        <th width="60">
                                            #
                                        </th>

                                        <th>
                                            Student
                                        </th>

                                        <th>
                                            Email
                                        </th>

                                        <th width="350">
                                            Attendance
                                        </th>

                                        <th>
                                            Remarks
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($students as $index => $student)

                                        @php

                                            $existingAttendance = $attendances
                                                ->where('student_id', $student->id)
                                                ->first();

                                            $currentStatus = $existingAttendance->status ?? 'present';

                                            $currentRemarks = $existingAttendance->remarks ?? '';

                                        @endphp

                                        <tr>

                                            <td>
                                                {{ $index + 1 }}
                                            </td>


                                            {{-- Student --}}
                                            <td>

                                                <div class="fw-semibold">

                                                    {{ $student->name }}

                                                </div>

                                                <small class="text-muted">

                                                    Student ID:
                                                    {{ $student->id }}

                                                </small>

                                            </td>


                                            {{-- Email --}}
                                            <td>

                                                <span class="text-muted">

                                                    {{ $student->email }}

                                                </span>

                                            </td>


                                            {{-- Status --}}
                                            <td>

                                                <div class="d-flex gap-2">

                                                    {{-- Present --}}
                                                    <div>

                                                        <input type="radio"
                                                               class="btn-check"
                                                               name="attendance[{{ $student->id }}][status]"
                                                               id="present_{{ $student->id }}"
                                                               value="present"
                                                               {{ $currentStatus === 'present' ? 'checked' : '' }}>

                                                        <label class="btn btn-outline-success"
                                                               for="present_{{ $student->id }}">

                                                            <i class="bi bi-check-circle me-1"></i>
                                                            Present

                                                        </label>

                                                    </div>


                                                    {{-- Absent --}}
                                                    <div>

                                                        <input type="radio"
                                                               class="btn-check"
                                                               name="attendance[{{ $student->id }}][status]"
                                                               id="absent_{{ $student->id }}"
                                                               value="absent"
                                                               {{ $currentStatus === 'absent' ? 'checked' : '' }}>

                                                        <label class="btn btn-outline-danger"
                                                               for="absent_{{ $student->id }}">

                                                            <i class="bi bi-x-circle me-1"></i>
                                                            Absent

                                                        </label>

                                                    </div>


                                                    {{-- Half Day --}}
                                                    <div>

                                                        <input type="radio"
                                                               class="btn-check"
                                                               name="attendance[{{ $student->id }}][status]"
                                                               id="half_day_{{ $student->id }}"
                                                               value="half_day"
                                                               {{ $currentStatus === 'half_day' ? 'checked' : '' }}>

                                                        <label class="btn btn-outline-warning"
                                                               for="half_day_{{ $student->id }}">

                                                            <i class="bi bi-clock me-1"></i>
                                                            Half Day

                                                        </label>

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- Remarks --}}
                                            <td>

                                                <input type="text"
                                                       name="attendance[{{ $student->id }}][remarks]"
                                                       class="form-control"
                                                       placeholder="Optional"
                                                       value="{{ $currentRemarks }}">

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>


                        {{-- Footer --}}
                        <div class="card-footer bg-white py-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="text-muted">

                                    Date:
                                    <strong>
                                        {{ \Carbon\Carbon::parse(request('date'))->format('d M Y') }}
                                    </strong>

                                </div>

                                <button type="submit"
                                        class="btn btn-success px-4">

                                    <i class="bi bi-save me-1"></i>

                                    Save Attendance

                                </button>

                            </div>

                        </div>

                    </form>

                @else

                    <div class="text-center py-5">

                        <i class="bi bi-people fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            No students found
                        </h5>

                        <p class="text-muted">
                            No active students are assigned to this batch.
                        </p>

                    </div>

                @endif

            </div>

        @endif

    @else

        {{-- Empty State --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-calendar-check fs-1 text-primary"></i>

                <h5 class="mt-3">
                    Select Batch & Date
                </h5>

                <p class="text-muted mb-0">

                    Select a batch and attendance date
                    to load students.

                </p>

            </div>

        </div>

    @endif

</div>

@endsection
