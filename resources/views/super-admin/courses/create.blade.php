@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Add New Course
            </h4>

            <p class="text-muted mb-0">
                Create a new training course.
            </p>
        </div>

        <a href="{{ route('super-admin.courses.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Back

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form method="POST"
                  action="{{ route('super-admin.courses.store') }}"
                  enctype="multipart/form-data">

                @csrf


                <div class="row g-4">

                    {{-- Course Name --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            Course Name
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control"
                               placeholder="e.g. Full Stack Web Development"
                               required>

                    </div>


                    {{-- Course Code --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Course Code
                        </label>

                        <input type="text"
                               name="code"
                               value="{{ old('code') }}"
                               class="form-control"
                               placeholder="e.g. FSWD-01"
                               required>

                    </div>


                    {{-- Description --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Course Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Enter course description...">{{ old('description') }}</textarea>

                    </div>


                    {{-- Duration --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Duration
                        </label>

                        <input type="text"
                               name="duration"
                               value="{{ old('duration') }}"
                               class="form-control"
                               placeholder="e.g. 6 Months">

                    </div>


                    {{-- Fees --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Course Fees
                        </label>

                        <input type="number"
                               name="fees"
                               value="{{ old('fees', 0) }}"
                               class="form-control"
                               min="0"
                               step="0.01"
                               required>

                    </div>


                    {{-- Mode --}}
                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Training Mode
                        </label>

                        <select name="mode"
                                class="form-select"
                                required>

                            <option value="offline">
                                Offline
                            </option>

                            <option value="online">
                                Online
                            </option>

                            <option value="hybrid">
                                Hybrid
                            </option>

                        </select>

                    </div>


                    {{-- Thumbnail --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Course Thumbnail
                        </label>

                        <input type="file"
                               name="thumbnail"
                               class="form-control"
                               accept="image/*">

                        <small class="text-muted">
                            JPG, PNG, WEBP — Max 2MB
                        </small>

                    </div>

                </div>


                <hr class="my-4">


                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('super-admin.courses.index') }}"
                       class="btn btn-light">

                        Cancel

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-lg me-1"></i>

                        Create Course

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
