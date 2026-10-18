@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-file-earmark-plus-fill"></i>
                Add Study Material
            </h3>
            <p class="text-muted mb-0">
                Add PDF, documents, presentations or external learning links.
            </p>
        </div>

        <a href="{{ route('super-admin.study-materials.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i>
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
            <h5 class="mb-0 fw-bold">
                Material Information
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('super-admin.study-materials.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Course --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Course <span class="text-danger">*</span>
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
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>

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
                            Module <span class="text-danger">*</span>
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
                                            {{ old('module_id') == $module->id ? 'selected' : '' }}>

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
                            Material Title <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Example: Laravel Introduction PDF"
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
                            Description
                        </label>

                        <textarea name="description"
                                  rows="4"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Enter study material description...">{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- File Upload --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Upload File
                        </label>

                        <input type="file"
                               name="file"
                               class="form-control @error('file') is-invalid @enderror"
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip">

                        <small class="text-muted">
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


                    {{-- External URL --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            External URL
                        </label>

                        <input type="url"
                               name="external_url"
                               value="{{ old('external_url') }}"
                               class="form-control @error('external_url') is-invalid @enderror"
                               placeholder="https://example.com/video">

                        <small class="text-muted">
                            YouTube, Google Drive or any external learning link.
                        </small>

                        @error('external_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Info --}}
                    <div class="col-12">

                        <div class="alert alert-info mb-0">
                            <i class="bi bi-info-circle-fill me-1"></i>

                            You can upload a file, add an external URL,
                            or use both.
                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-12">

                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('super-admin.study-materials.index') }}"
                               class="btn btn-light border">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-save me-1"></i>
                                Save Study Material

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

    const courseSelect = document.getElementById('course_id');
    const moduleSelect = document.getElementById('module_id');

    function filterModules() {

        const selectedCourse = courseSelect.value;

        Array.from(moduleSelect.options).forEach(function (option) {

            if (!option.value) {
                return;
            }

            if (option.dataset.course === selectedCourse) {

                option.hidden = false;

            } else {

                option.hidden = true;

            }

        });

        // Check current selected module
        const selectedModule = moduleSelect.options[moduleSelect.selectedIndex];

        if (
            selectedModule &&
            selectedModule.value &&
            selectedModule.dataset.course !== selectedCourse
        ) {
            moduleSelect.value = '';
        }
    }

    courseSelect.addEventListener('change', filterModules);

    filterModules();

});

</script>

@endsection
