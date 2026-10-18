@extends('layouts.admin')

@section('title', 'Generate Certificate')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-award-fill text-primary"></i>
                Generate Certificate
            </h3>

            <p class="text-muted mb-0">
                Create a professional course completion certificate
            </p>
        </div>

        <a href="{{ route('super-admin.certificates.index') }}"
           class="btn btn-light border">

            <i class="bi bi-arrow-left me-1"></i>
            Back to Certificates

        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill"></i>
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
          action="{{ route('super-admin.certificates.store') }}">

        @csrf

        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-lg-8">

                {{-- Student & Course --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="fw-bold mb-1">
                            <i class="bi bi-person-vcard text-primary"></i>
                            Student & Course
                        </h5>

                        <small class="text-muted">
                            Select the student and completed course
                        </small>

                    </div>


                    <div class="card-body">

                        <div class="row g-4">

                            {{-- Student --}}
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Student
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="student_id"
                                    class="form-select @error('student_id') is-invalid @enderror"
                                    required
                                >

                                    <option value="">
                                        Select Student
                                    </option>

                                    @foreach($students as $student)

                                        <option
                                            value="{{ $student->id }}"
                                            {{ old('student_id') == $student->id
                                                ? 'selected'
                                                : '' }}
                                        >
                                            {{ $student->name }}
                                            — {{ $student->email }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('student_id')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Course --}}
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Course
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="course_id"
                                    class="form-select @error('course_id') is-invalid @enderror"
                                    required
                                >

                                    <option value="">
                                        Select Course
                                    </option>

                                    @foreach($courses as $course)

                                        <option
                                            value="{{ $course->id }}"
                                            {{ old('course_id') == $course->id
                                                ? 'selected'
                                                : '' }}
                                        >
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

                        </div>

                    </div>

                </div>


                {{-- Certificate Details --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="fw-bold mb-1">

                            <i class="bi bi-file-earmark-text
                                      text-primary"></i>

                            Certificate Details

                        </h5>

                        <small class="text-muted">
                            Enter certificate information
                        </small>

                    </div>


                    <div class="card-body">

                        <div class="row g-4">

                            {{-- Title --}}
                            <div class="col-12">

                                <label class="form-label fw-semibold">

                                    Certificate Title
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old(
                                        'title',
                                        'Certificate of Completion'
                                    ) }}"
                                    required
                                >

                                @error('title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Issue Date --}}
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Issue Date
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="date"
                                    name="issue_date"
                                    class="form-control @error('issue_date') is-invalid @enderror"
                                    value="{{ old(
                                        'issue_date',
                                        now()->format('Y-m-d')
                                    ) }}"
                                    required
                                >

                                @error('issue_date')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Completion Date --}}
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Completion Date

                                </label>

                                <input
                                    type="date"
                                    name="completion_date"
                                    class="form-control @error('completion_date') is-invalid @enderror"
                                    value="{{ old('completion_date') }}"
                                >

                                @error('completion_date')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Percentage --}}
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Percentage

                                </label>

                                <div class="input-group">

                                    <input
                                        type="number"
                                        name="percentage"
                                        class="form-control @error('percentage') is-invalid @enderror"
                                        value="{{ old('percentage') }}"
                                        min="0"
                                        max="100"
                                        step="0.01"
                                        placeholder="e.g. 92.50"
                                    >

                                    <span class="input-group-text">
                                        %
                                    </span>

                                </div>

                                @error('percentage')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Grade --}}
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Grade

                                </label>

                                <select
                                    name="grade"
                                    class="form-select"
                                >

                                    <option value="">
                                        Select Grade
                                    </option>

                                    <option value="A+"
                                        {{ old('grade') == 'A+'
                                            ? 'selected'
                                            : '' }}>
                                        A+
                                    </option>

                                    <option value="A"
                                        {{ old('grade') == 'A'
                                            ? 'selected'
                                            : '' }}>
                                        A
                                    </option>

                                    <option value="B+"
                                        {{ old('grade') == 'B+'
                                            ? 'selected'
                                            : '' }}>
                                        B+
                                    </option>

                                    <option value="B"
                                        {{ old('grade') == 'B'
                                            ? 'selected'
                                            : '' }}>
                                        B
                                    </option>

                                    <option value="C"
                                        {{ old('grade') == 'C'
                                            ? 'selected'
                                            : '' }}>
                                        C
                                    </option>

                                    <option value="Pass"
                                        {{ old('grade') == 'Pass'
                                            ? 'selected'
                                            : '' }}>
                                        Pass
                                    </option>

                                </select>

                            </div>


                            {{-- Description --}}
                            <div class="col-12">

                                <label class="form-label fw-semibold">

                                    Description

                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Certificate description or achievement details..."
                                >{{ old('description') }}</textarea>

                                @error('description')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="col-lg-4">

                {{-- Certificate Preview --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-eye text-primary"></i>

                            Certificate Preview

                        </h5>

                    </div>


                    <div class="card-body">

                        <div
                            class="certificate-preview
                                   rounded-3
                                   p-4
                                   text-center
                                   border"
                            style="
                                background:
                                linear-gradient(
                                    135deg,
                                    #fffdf7,
                                    #f8f9fa
                                );
                                min-height:430px;
                                position:relative;
                            "
                        >

                            {{-- Decorative --}}
                            <div
                                style="
                                    position:absolute;
                                    inset:10px;
                                    border:2px solid #c49a5a;
                                    border-radius:8px;
                                    pointer-events:none;
                                "
                            ></div>


                            <div class="position-relative">

                                <div class="mb-3">

                                    <i
                                        class="bi bi-award-fill"
                                        style="
                                            font-size:45px;
                                            color:#c49a5a;
                                        "
                                    ></i>

                                </div>


                                <small
                                    class="text-uppercase
                                           fw-semibold"
                                    style="
                                        letter-spacing:2px;
                                    "
                                >
                                    Certificate
                                </small>


                                <h5
                                    class="fw-bold mt-2"
                                    style="
                                        color:#111827;
                                    "
                                >
                                    of Completion
                                </h5>


                                <p class="text-muted small mt-4 mb-1">

                                    This certificate is proudly presented to

                                </p>


                                <h4
                                    class="fw-bold"
                                    style="
                                        color:#c49a5a;
                                    "
                                    id="previewStudent"
                                >
                                    Student Name
                                </h4>


                                <p class="text-muted small">

                                    for successfully completing

                                </p>


                                <h6
                                    class="fw-bold"
                                    id="previewCourse"
                                >
                                    Course Name
                                </h6>


                                <div class="mt-4">

                                    <span
                                        class="badge rounded-pill"
                                        style="
                                            background:#111827;
                                            color:white;
                                        "
                                    >
                                        Official Certificate
                                    </span>

                                </div>


                                <div class="row mt-5">

                                    <div class="col-6">

                                        <small class="text-muted">
                                            Issue Date
                                        </small>

                                        <div
                                            class="fw-semibold small"
                                            id="previewDate"
                                        >
                                            {{ now()->format('d M Y') }}
                                        </div>

                                    </div>


                                    <div class="col-6">

                                        <small class="text-muted">
                                            Certificate
                                        </small>

                                        <div
                                            class="fw-semibold small"
                                        >
                                            CERT-XXXXXXX
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Status --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white py-3">

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-toggle-on
                                      text-primary"></i>

                            Certificate Status

                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="form-check form-switch">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="is_active"
                                name="is_active"
                                value="1"
                                {{ old(
                                    'is_active',
                                    1
                                ) ? 'checked' : '' }}
                            >

                            <label
                                class="form-check-label fw-semibold"
                                for="is_active"
                            >
                                Active Certificate
                            </label>

                        </div>

                        <small class="text-muted d-block mt-2">

                            Inactive certificates cannot be treated
                            as valid certificates.

                        </small>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <button
                            type="submit"
                            class="btn btn-primary
                                   w-100 py-2 mb-2"
                        >

                            <i class="bi bi-award-fill me-1"></i>

                            Generate Certificate

                        </button>


                        <a
                            href="{{ route(
                                'super-admin.certificates.index'
                            ) }}"
                            class="btn btn-light
                                   border w-100"
                        >

                            Cancel

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- Preview JavaScript --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const studentSelect =
        document.querySelector(
            'select[name="student_id"]'
        );

    const courseSelect =
        document.querySelector(
            'select[name="course_id"]'
        );

    const previewStudent =
        document.getElementById(
            'previewStudent'
        );

    const previewCourse =
        document.getElementById(
            'previewCourse'
        );

    const issueDate =
        document.querySelector(
            'input[name="issue_date"]'
        );

    const previewDate =
        document.getElementById(
            'previewDate'
        );


    function updatePreview() {

        if (studentSelect.value) {

            const selected =
                studentSelect.options[
                    studentSelect.selectedIndex
                ];

            previewStudent.textContent =
                selected.text.split('—')[0].trim();

        } else {

            previewStudent.textContent =
                'Student Name';

        }


        if (courseSelect.value) {

            const selected =
                courseSelect.options[
                    courseSelect.selectedIndex
                ];

            previewCourse.textContent =
                selected.text;

        } else {

            previewCourse.textContent =
                'Course Name';

        }


        if (issueDate.value) {

            const date =
                new Date(
                    issueDate.value + 'T00:00:00'
                );

            previewDate.textContent =
                date.toLocaleDateString(
                    'en-IN',
                    {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    }
                );

        }

    }


    studentSelect.addEventListener(
        'change',
        updatePreview
    );

    courseSelect.addEventListener(
        'change',
        updatePreview
    );

    issueDate.addEventListener(
        'change',
        updatePreview
    );


    updatePreview();

});

</script>

@endsection