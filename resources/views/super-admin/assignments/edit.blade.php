@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Assignment
            </h3>

            <p class="text-muted mb-0">
                Update assignment information.
            </p>
        </div>

        <a href="{{ route('super-admin.assignments.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Back
        </a>

    </div>


    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Assignment Information
            </h5>

        </div>


        <div class="card-body">

            <form action="{{ route('super-admin.assignments.update', $assignment->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="row g-4">


                    {{-- Course --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Course
                            <span class="text-danger">*</span>
                        </label>

                        <select name="course_id"
                                id="course_id"
                                class="form-select @error('course_id') is-invalid @enderror"
                                required>

                            <option value="">
                                -- Select Course --
                            </option>

                            @foreach($courses as $course)

                                <option value="{{ $course->id }}"
                                    {{ old('course_id', $assignment->course_id) == $course->id ? 'selected' : '' }}>

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
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Module
                            <span class="text-danger">*</span>
                        </label>

                        <select name="module_id"
                                id="module_id"
                                class="form-select @error('module_id') is-invalid @enderror"
                                required>

                            <option value="">
                                -- Select Module --
                            </option>

                            @foreach($courses as $course)

                                @foreach($course->modules as $module)

                                    <option value="{{ $module->id }}"
                                            data-course="{{ $course->id }}"
                                        {{ old('module_id', $assignment->module_id) == $module->id ? 'selected' : '' }}>

                                        {{ $module->title }}

                                    </option>

                                @endforeach

                            @endforeach

                        </select>

                        @error('module_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Title --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Assignment Title
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title', $assignment->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Example: Laravel CRUD Project"
                               required>

                        @error('title')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Assignment Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Write assignment instructions...">{{ old('description', $assignment->description) }}</textarea>

                        @error('description')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Due Date --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Due Date
                        </label>

                        <input type="date"
                               name="due_date"
                               value="{{ old(
                                   'due_date',
                                   $assignment->due_date
                                       ? $assignment->due_date->format('Y-m-d')
                                       : ''
                               ) }}"
                               class="form-control @error('due_date') is-invalid @enderror">

                        @error('due_date')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Total Marks --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Total Marks
                            <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               name="total_marks"
                               value="{{ old('total_marks', $assignment->total_marks) }}"
                               min="1"
                               max="10000"
                               class="form-control @error('total_marks') is-invalid @enderror"
                               required>

                        @error('total_marks')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="is_active"
                                class="form-select">

                            <option value="1"
                                {{ old('is_active', $assignment->is_active) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ old('is_active', $assignment->is_active) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Current File --}}
                    @if($assignment->file)

                        <div class="col-12">

                            <div class="alert alert-light border">

                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <i class="bi bi-file-earmark-text-fill text-primary fs-4 me-2"></i>

                                        <strong>Current File:</strong>

                                        {{ basename($assignment->file) }}

                                    </div>

                                    <a href="{{ asset('storage/' . $assignment->file) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">

                                        <i class="bi bi-eye"></i>
                                        View

                                    </a>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- Replace File --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Replace Assignment File
                        </label>

                        <input type="file"
                               name="file"
                               class="form-control @error('file') is-invalid @enderror"
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip">

                        <small class="text-muted">

                            Leave empty to keep the current file.

                            <br>

                            Allowed:
                            PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, ZIP

                            <br>

                            Maximum size: 20 MB

                        </small>

                        @error('file')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Information --}}
                    <div class="col-12">

                        <div class="alert alert-info mb-0">

                            <i class="bi bi-info-circle-fill me-1"></i>

                            If you upload a new file, the old assignment file
                            will automatically be replaced.

                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-12">

                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('super-admin.assignments.index') }}"
                               class="btn btn-light border">

                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-check-circle me-1"></i>

                                Update Assignment

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Course → Module Dynamic Filter --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const courseSelect =
        document.getElementById('course_id');

    const moduleSelect =
        document.getElementById('module_id');


    function filterModules() {

        const selectedCourse =
            courseSelect.value;


        Array.from(moduleSelect.options).forEach(function (option) {

            if (!option.value) {
                return;
            }

            option.hidden =
                option.dataset.course !== selectedCourse;

        });


        const selectedModule =
            moduleSelect.options[moduleSelect.selectedIndex];


        if (
            selectedModule &&
            selectedModule.value &&
            selectedModule.dataset.course !== selectedCourse
        ) {

            moduleSelect.value = '';

        }

    }


    courseSelect.addEventListener(
        'change',
        filterModules
    );


    filterModules();

});

</script>

@endsection

