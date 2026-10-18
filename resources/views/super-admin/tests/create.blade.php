@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Create Test / Exam
            </h4>

            <p class="text-muted mb-0">
                Create a new online test for a course module.
            </p>
        </div>

        <a href="{{ route('super-admin.tests.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left"></i>
            Back

        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
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
          action="{{ route('super-admin.tests.store') }}">

        @csrf

        <div class="row g-4">

            {{-- Main Information --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0 fw-semibold">
                            Test Information
                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- Course --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Course <span class="text-danger">*</span>
                            </label>

                            <select
                                name="course_id"
                                id="course_id"
                                class="form-select @error('course_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Select Course
                                </option>

                                @foreach($courses as $course)

                                    <option
                                        value="{{ $course->id }}"
                                        {{ old('course_id') == $course->id ? 'selected' : '' }}
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


                        {{-- Module --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Module <span class="text-danger">*</span>
                            </label>

                            <select
                                name="module_id"
                                id="module_id"
                                class="form-select @error('module_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Select Module
                                </option>

                            </select>

                            @error('module_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                First select a course.
                            </small>

                        </div>


                        {{-- Test Title --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Test Title
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Example: Laravel Module 1 Test"
                                required
                            >

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Description --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter test instructions or description..."
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


            {{-- Test Settings --}}
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0 fw-semibold">
                            Test Settings
                        </h5>

                    </div>

                    <div class="card-body">

                        {{-- Duration --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Duration (Minutes)
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                name="duration_minutes"
                                value="{{ old('duration_minutes', 30) }}"
                                min="1"
                                max="1440"
                                class="form-control @error('duration_minutes') is-invalid @enderror"
                                required
                            >

                            @error('duration_minutes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Total Marks --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Total Marks
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                name="total_marks"
                                value="{{ old('total_marks', 100) }}"
                                min="1"
                                class="form-control @error('total_marks') is-invalid @enderror"
                                required
                            >

                            @error('total_marks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Passing Marks --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Passing Marks
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                name="passing_marks"
                                value="{{ old('passing_marks', 40) }}"
                                min="1"
                                class="form-control @error('passing_marks') is-invalid @enderror"
                                required
                            >

                            @error('passing_marks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Attempts --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Attempts Allowed
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                name="attempts_allowed"
                                value="{{ old('attempts_allowed', 1) }}"
                                min="1"
                                max="10"
                                class="form-control @error('attempts_allowed') is-invalid @enderror"
                                required
                            >

                            @error('attempts_allowed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Start At --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Start Date & Time
                            </label>

                            <input
                                type="datetime-local"
                                name="start_at"
                                value="{{ old('start_at') }}"
                                class="form-control @error('start_at') is-invalid @enderror"
                            >

                            @error('start_at')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- End At --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                End Date & Time
                            </label>

                            <input
                                type="datetime-local"
                                name="end_at"
                                value="{{ old('end_at') }}"
                                class="form-control @error('end_at') is-invalid @enderror"
                            >

                            @error('end_at')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Status --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="is_active"
                                class="form-select @error('is_active') is-invalid @enderror"
                                required
                            >

                                <option value="1"
                                    {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0"
                                    {{ old('is_active') === '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                            @error('is_active')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- Submit --}}
            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body d-flex justify-content-end gap-2">

                        <a href="{{ route('super-admin.tests.index') }}"
                           class="btn btn-light border">

                            Cancel

                        </a>

                        <button type="submit"
                                class="btn btn-primary px-4">

                            <i class="bi bi-check-lg"></i>
                            Create Test

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- Course → Module JavaScript --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const courseSelect = document.getElementById('course_id');
    const moduleSelect = document.getElementById('module_id');

    const courses = @json($courses);

    const oldModuleId = "{{ old('module_id') }}";


    function loadModules(courseId) {

        moduleSelect.innerHTML = '';

        const defaultOption = document.createElement('option');

        defaultOption.value = '';
        defaultOption.textContent = 'Select Module';

        moduleSelect.appendChild(defaultOption);


        if (!courseId) {
            return;
        }


        const selectedCourse = courses.find(
            course => course.id == courseId
        );


        if (!selectedCourse || !selectedCourse.modules) {
            return;
        }


        selectedCourse.modules.forEach(function (module) {

            const option = document.createElement('option');

            option.value = module.id;
            option.textContent = module.title;

            if (oldModuleId == module.id) {
                option.selected = true;
            }

            moduleSelect.appendChild(option);

        });

    }


    courseSelect.addEventListener(
        'change',
        function () {

            loadModules(this.value);

        }
    );


    if (courseSelect.value) {

        loadModules(courseSelect.value);

    }

});

</script>

@endsection
