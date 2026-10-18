@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">
{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="fw-bold mb-1">
            Edit Batch
        </h4>

        <p class="text-muted mb-0">
            Update batch details and assigned students
        </p>
    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('super-admin.batches.show', $batch->id) }}"
           class="btn btn-light border">

            <i class="bi bi-eye me-1"></i>
            View Batch

        </a>

        <a href="{{ route('super-admin.batches.index') }}"
           class="btn btn-light border">

            <i class="bi bi-arrow-left me-1"></i>
            Back

        </a>

    </div>

</div>


{{-- Validation Errors --}}
@if($errors->any())

    <div class="alert alert-danger">

        <div class="fw-bold mb-2">

            <i class="bi bi-exclamation-triangle me-1"></i>

            Please fix the following errors:

        </div>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<form method="POST"
      action="{{ route('super-admin.batches.update', $batch->id) }}">

    @csrf

    @method('PUT')


    <div class="row g-4">


        {{-- LEFT SIDE --}}
        <div class="col-lg-8">


            {{-- Batch Information --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-1">

                        <i class="bi bi-info-circle text-primary me-2"></i>

                        Batch Information

                    </h5>

                    <small class="text-muted">
                        Update basic batch details
                    </small>

                </div>


                <div class="card-body">

                    <div class="row g-3">


                        {{-- Course --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">

                                Course
                                <span class="text-danger">*</span>

                            </label>

                            <select name="course_id"
                                    class="form-select @error('course_id') is-invalid @enderror"
                                    required>

                                <option value="">
                                    Select Course
                                </option>

                                @foreach($courses as $course)

                                    <option value="{{ $course->id }}"
                                        {{ old('course_id', $batch->course_id) == $course->id ? 'selected' : '' }}>

                                        {{ $course->name }}
                                        ({{ $course->code }})

                                    </option>

                                @endforeach

                            </select>

                            @error('course_id')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Batch Name --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">

                                Batch Name
                                <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $batch->name) }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   required>

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Batch Code --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">

                                Batch Code
                                <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   name="code"
                                   value="{{ old('code', $batch->code) }}"
                                   class="form-control @error('code') is-invalid @enderror"
                                   required>

                            @error('code')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Capacity --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">

                                Maximum Students
                                <span class="text-danger">*</span>

                            </label>

                            <input type="number"
                                   name="capacity"
                                   value="{{ old('capacity', $batch->capacity) }}"
                                   min="1"
                                   class="form-control @error('capacity') is-invalid @enderror"
                                   required>

                            @error('capacity')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>

                </div>

            </div>


            {{-- Schedule --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-1">

                        <i class="bi bi-calendar-event text-primary me-2"></i>

                        Class Schedule

                    </h5>

                    <small class="text-muted">
                        Update batch dates and class timing
                    </small>

                </div>


                <div class="card-body">

                    <div class="row g-3">


                        {{-- Start Date --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">

                                Start Date
                                <span class="text-danger">*</span>

                            </label>

                            <input type="date"
                                   name="start_date"
                                   value="{{ old(
                                       'start_date',
                                       $batch->start_date?->format('Y-m-d')
                                   ) }}"
                                   class="form-control @error('start_date') is-invalid @enderror"
                                   required>

                            @error('start_date')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- End Date --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                End Date
                            </label>

                            <input type="date"
                                   name="end_date"
                                   value="{{ old(
                                       'end_date',
                                       $batch->end_date?->format('Y-m-d')
                                   ) }}"
                                   class="form-control @error('end_date') is-invalid @enderror">

                            @error('end_date')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Start Time --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Start Time
                            </label>

                            <input type="time"
                                   name="start_time"
                                   value="{{ old(
                                       'start_time',
                                       $batch->start_time
                                   ) }}"
                                   class="form-control @error('start_time') is-invalid @enderror">

                            @error('start_time')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- End Time --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                End Time
                            </label>

                            <input type="time"
                                   name="end_time"
                                   value="{{ old(
                                       'end_time',
                                       $batch->end_time
                                   ) }}"
                                   class="form-control @error('end_time') is-invalid @enderror">

                            @error('end_time')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Days --}}
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Class Days
                            </label>

                            <input type="text"
                                   name="days"
                                   value="{{ old('days', $batch->days) }}"
                                   class="form-control"
                                   placeholder="Example: Monday, Wednesday, Friday">

                        </div>


                    </div>

                </div>

            </div>


            {{-- Mode --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="fw-bold mb-1">

                        <i class="bi bi-display text-primary me-2"></i>

                        Class Mode

                    </h5>

                </div>


                <div class="card-body">

                    <div class="row g-3">


                        {{-- Mode --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">

                                Mode
                                <span class="text-danger">*</span>

                            </label>

                            <select name="mode"
                                    id="mode"
                                    class="form-select"
                                    required>

                                <option value="offline"
                                    {{ old('mode', $batch->mode) === 'offline' ? 'selected' : '' }}>
                                    Offline
                                </option>

                                <option value="online"
                                    {{ old('mode', $batch->mode) === 'online' ? 'selected' : '' }}>
                                    Online
                                </option>

                                <option value="hybrid"
                                    {{ old('mode', $batch->mode) === 'hybrid' ? 'selected' : '' }}>
                                    Hybrid
                                </option>

                            </select>

                        </div>


                        {{-- Room --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Room / Classroom
                            </label>

                            <input type="text"
                                   name="room"
                                   value="{{ old('room', $batch->room) }}"
                                   class="form-control"
                                   placeholder="Example: Lab 01">

                        </div>


                        {{-- Meeting Link --}}
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Online Meeting Link
                            </label>

                            <input type="url"
                                   name="meeting_link"
                                   value="{{ old(
                                       'meeting_link',
                                       $batch->meeting_link
                                   ) }}"
                                   class="form-control"
                                   placeholder="https://meet.google.com/...">

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

                    <textarea name="description"
                              rows="5"
                              class="form-control"
                              placeholder="Enter batch description...">{{ old('description', $batch->description) }}</textarea>

                </div>

            </div>


        </div>


        {{-- RIGHT SIDE --}}
        <div class="col-lg-4">


            {{-- Students --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="fw-bold mb-1">

                                <i class="bi bi-people-fill text-primary me-2"></i>

                                Assign Students

                            </h5>

                            <small class="text-muted">
                                Select approved students
                            </small>

                        </div>

                        <span class="badge bg-primary">
                            {{ $students->count() }}
                        </span>

                    </div>

                </div>


                <div class="card-body">


                    {{-- Select All --}}
                    <div class="form-check border-bottom pb-3 mb-3">

                        <input class="form-check-input"
                               type="checkbox"
                               id="selectAllStudents">

                        <label class="form-check-label fw-semibold"
                               for="selectAllStudents">

                            Select All Students

                        </label>

                    </div>


                    {{-- Students --}}
                    <div style="max-height:450px;overflow-y:auto;">

                        @forelse($students as $student)

                            @php

                                $isSelected = $batch->students
                                    ->contains('id', $student->id);

                            @endphp


                            <div class="form-check mb-3">

                                <input class="form-check-input student-checkbox"
                                       type="checkbox"
                                       name="students[]"
                                       value="{{ $student->id }}"
                                       id="student{{ $student->id }}"

                                       {{ in_array(
                                           $student->id,
                                           old('students', $batch->students->pluck('id')->toArray())
                                       ) ? 'checked' : '' }}>


                                <label class="form-check-label"
                                       for="student{{ $student->id }}">

                                    <div class="fw-semibold">

                                        {{ $student->name }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $student->email }}

                                        @if($student->phone)
                                            • {{ $student->phone }}
                                        @endif

                                    </small>

                                </label>

                            </div>

                        @empty

                            <div class="text-center py-4">

                                <i class="bi bi-person-x fs-1 text-muted"></i>

                                <h6 class="fw-bold mt-2">
                                    No Approved Students
                                </h6>

                                <p class="text-muted small mb-0">
                                    Approve students before assigning them.
                                </p>

                            </div>

                        @endforelse

                    </div>


                </div>

            </div>


            {{-- Current Student Count --}}
            <div class="alert alert-info border-0 shadow-sm">

                <div class="d-flex">

                    <i class="bi bi-info-circle-fill me-2"></i>

                    <div>

                        <strong>
                            Current Assignment
                        </strong>

                        <p class="small mb-0 mt-1">

                            {{ $batch->students->count() }}
                            student(s) currently assigned.

                            Maximum capacity:
                            {{ $batch->capacity }}.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Actions --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <button type="submit"
                            class="btn btn-primary w-100 mb-2">

                        <i class="bi bi-check-lg me-1"></i>
                        Update Batch

                    </button>


                    <a href="{{ route(
                        'super-admin.batches.show',
                        $batch->id
                    ) }}"
                       class="btn btn-light border w-100">

                        Cancel

                    </a>

                </div>

            </div>


        </div>

    </div>

</form>

</div>

{{-- Select All --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const selectAll = document.getElementById('selectAllStudents');

    const checkboxes = document.querySelectorAll('.student-checkbox');


    if (!selectAll) {
        return;
    }


    function updateSelectAllState() {

        const total = checkboxes.length;

        const checked = document.querySelectorAll(
            '.student-checkbox:checked'
        ).length;

        selectAll.checked =
            total > 0 && total === checked;

    }


    selectAll.addEventListener('change', function () {

        checkboxes.forEach(function (checkbox) {

            checkbox.checked = selectAll.checked;

        });

    });


    checkboxes.forEach(function (checkbox) {

        checkbox.addEventListener('change', function () {

            updateSelectAllState();

        });

    });


    updateSelectAllState();

});

</script>

@endsection
