@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Edit Course
            </h4>

            <p class="text-muted mb-0">
                Update course details and training information.
            </p>
        </div>

        <a href="{{ route('super-admin.courses.index') }}"
           class="btn btn-light border">

            <i class="bi bi-arrow-left me-1"></i>
            Back to Courses

        </a>

    </div>


    {{-- Validation Errors --}}
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


    {{-- Edit Course Form --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Course Information
            </h5>

        </div>


        <div class="card-body">

            <form method="POST"
                  action="{{ route('super-admin.courses.update', $course->id) }}">

                @csrf
                @method('PUT')


                <div class="row g-4">

                    {{-- Course Name --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Course Name
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $course->name) }}"
                               class="form-control"
                               placeholder="e.g. Laravel Development"
                               required>

                    </div>


                    {{-- Course Code --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Course Code
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="code"
                               value="{{ old('code', $course->code) }}"
                               class="form-control"
                               placeholder="e.g. LAR-001"
                               required>

                    </div>


                    {{-- Duration --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Duration
                        </label>

                        <input type="text"
                               name="duration"
                               value="{{ old('duration', $course->duration) }}"
                               class="form-control"
                               placeholder="e.g. 3 Months">

                    </div>


                    {{-- Fees --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Course Fees
                        </label>

                        <input type="number"
                               name="fees"
                               value="{{ old('fees', $course->fees) }}"
                               class="form-control"
                               min="0"
                               step="0.01"
                               placeholder="e.g. 25000">

                    </div>


                    {{-- Mode --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Training Mode
                        </label>

                        <select name="mode"
                                class="form-select">

                            <option value="offline"
                                {{ old('mode', $course->mode) == 'offline' ? 'selected' : '' }}>
                                Offline
                            </option>

                            <option value="online"
                                {{ old('mode', $course->mode) == 'online' ? 'selected' : '' }}>
                                Online
                            </option>

                            <option value="hybrid"
                                {{ old('mode', $course->mode) == 'hybrid' ? 'selected' : '' }}>
                                Hybrid
                            </option>

                        </select>

                    </div>


                    {{-- Description --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="6"
                                  class="form-control"
                                  placeholder="Enter course description...">{{ old('description', $course->description) }}</textarea>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="is_active"
                                class="form-select">

                            <option value="1"
                                {{ old('is_active', $course->is_active) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ old('is_active', $course->is_active) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-12">

                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('super-admin.courses.index') }}"
                               class="btn btn-light border">

                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-check-lg me-1"></i>

                                Update Course

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
