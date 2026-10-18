@extends('layouts.admin')

@section('title', 'Edit Hero Slide')

@section('content')
<div class="container-fluid py-4">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="text-muted small mb-2">
                <a href="{{ route('super-admin.dashboard') }}"
                   class="text-decoration-none text-muted">
                    Dashboard
                </a>

                <i class="bi bi-chevron-right mx-2"></i>

                <a href="{{ route('super-admin.hero-slides.index') }}"
                   class="text-decoration-none text-muted">
                    Hero Slides
                </a>

                <i class="bi bi-chevron-right mx-2"></i>

                <span class="text-primary">Edit Slide</span>
            </div>

            <h3 class="fw-bold mb-1">
                <i class="bi bi-pencil-square text-primary me-2"></i>
                Edit Hero Slide
            </h3>

            <p class="text-muted mb-0">
                Update your homepage banner content, image and settings.
            </p>
        </div>

        <a href="{{ route('super-admin.hero-slides.index') }}"
           class="btn btn-outline-secondary px-4">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Slides
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Please correct the following errors:
            </div>

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('super-admin.hero-slides.update', $slide->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row g-4">

            {{-- LEFT COLUMN --}}
            <div class="col-lg-8">

                {{-- BASIC INFORMATION --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-1">
                            <i class="bi bi-card-heading text-primary me-2"></i>
                            Basic Information
                        </h5>
                        <p class="text-muted small mb-0">
                            Edit the title and content of your slide.
                        </p>
                    </div>

                    <div class="card-body p-4">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Slide Title <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $slide->title) }}"
                                   maxlength="255"
                                   required>

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Subtitle
                            </label>

                            <input type="text"
                                   name="subtitle"
                                   class="form-control @error('subtitle') is-invalid @enderror"
                                   value="{{ old('subtitle', $slide->subtitle) }}"
                                   maxlength="255">

                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $slide->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">
                                Tags / Topics
                            </label>

                            <input type="text"
                                   name="tags"
                                   class="form-control @error('tags') is-invalid @enderror"
                                   value="{{ old('tags', $slide->tags) }}"
                                   placeholder="HR Generalist | Payroll | Compliance">

                            <div class="form-text">
                                Separate tags using the pipe symbol (|).
                            </div>

                            @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- IMAGE --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-1">
                            <i class="bi bi-image text-primary me-2"></i>
                            Slide Logo / Image
                        </h5>
                        <p class="text-muted small mb-0">
                            Upload a new image or keep the existing one.
                        </p>
                    </div>

                    <div class="card-body p-4">

                        @if($slide->logo)
                            <div class="mb-3">
                                <label class="form-label fw-semibold d-block">
                                    Current Image
                                </label>

                                <div class="current-image-box">
                                    <img src="{{ asset('storage/' . $slide->logo) }}"
                                         alt="{{ $slide->title }}"
                                         class="current-slide-image">
                                </div>
                            </div>
                        @endif

                        <label class="form-label fw-semibold">
                            Upload New Image
                        </label>

                        <input type="file"
                               name="logo"
                               id="slideImage"
                               class="form-control @error('logo') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <div class="form-text">
                            Optional. JPG, JPEG, PNG or WEBP. Maximum size: 2 MB.
                            Leave empty to keep the current image.
                        </div>

                        @error('logo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror

                        <div id="imagePreviewBox" class="mt-3 d-none">
                            <label class="form-label fw-semibold d-block">
                                New Image Preview
                            </label>

                            <img id="imagePreview"
                                 src=""
                                 alt="New image preview"
                                 class="current-slide-image">
                        </div>
                    </div>
                </div>

                {{-- FEATURE CARDS --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-1">
                            <i class="bi bi-grid-3x3-gap text-primary me-2"></i>
                            Feature Cards
                        </h5>
                        <p class="text-muted small mb-0">
                            Update the three cards shown in the banner.
                        </p>
                    </div>

                    <div class="card-body p-4">
                        @for($i = 1; $i <= 3; $i++)
                            <div class="feature-card-form mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="feature-number">{{ $i }}</span>
                                    <h6 class="fw-bold mb-0">
                                        Feature Card {{ $i }}
                                    </h6>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">
                                            Bootstrap Icon Name
                                        </label>

                                        <input type="text"
                                               name="card{{ $i }}_icon"
                                               class="form-control"
                                               value="{{ old('card'.$i.'_icon', $slide->{'card'.$i.'_icon'}) }}"
                                               placeholder="e.g. laptop">
                                    </div>

                                    <div class="col-md-8">
                                        <label class="form-label">
                                            Card Title
                                        </label>

                                        <input type="text"
                                               name="card{{ $i }}_title"
                                               class="form-control"
                                               value="{{ old('card'.$i.'_title', $slide->{'card'.$i.'_title'}) }}"
                                               placeholder="e.g. Online Training">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">
                                            Card Description
                                        </label>

                                        <input type="text"
                                               name="card{{ $i }}_text"
                                               class="form-control"
                                               value="{{ old('card'.$i.'_text', $slide->{'card'.$i.'_text'}) }}"
                                               placeholder="e.g. Learn from anywhere">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- BUTTON SETTINGS --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-1">
                            <i class="bi bi-mouse text-primary me-2"></i>
                            Call-to-Action Buttons
                        </h5>
                        <p class="text-muted small mb-0">
                            Edit the button labels and destinations.
                        </p>
                    </div>

                    <div class="card-body p-4">
                        @for($i = 1; $i <= 2; $i++)
                            <div class="button-config mb-4">
                                <h6 class="fw-bold mb-3">
                                    Button {{ $i }}
                                </h6>

                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label class="form-label">
                                            Button Text
                                        </label>

                                        <input type="text"
                                               name="button{{ $i }}_text"
                                               class="form-control"
                                               value="{{ old('button'.$i.'_text', $slide->{'button'.$i.'_text'}) }}"
                                               placeholder="e.g. Explore Courses">
                                    </div>

                                    <div class="col-md-7">
                                        <label class="form-label">
                                            Button URL
                                        </label>

                                        <input type="text"
                                               name="button{{ $i }}_url"
                                               class="form-control"
                                               value="{{ old('button'.$i.'_url', $slide->{'button'.$i.'_url'}) }}"
                                               placeholder="/courses">

                                        <div class="form-text">
                                            Example: /courses or /contact.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="col-lg-4">

                {{-- SETTINGS --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-sliders text-primary me-2"></i>
                            Slide Settings
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Display Order
                            </label>

                            <input type="number"
                                   name="sort_order"
                                   class="form-control @error('sort_order') is-invalid @enderror"
                                   value="{{ old('sort_order', $slide->sort_order) }}"
                                   min="0"
                                   required>

                            <div class="form-text">
                                Lower numbers appear first.
                            </div>

                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <label class="form-label fw-semibold d-block">
                            Slide Status
                        </label>

                        <input type="hidden" name="is_active" value="0">

                        <div class="form-check form-switch">
                            <input class="form-check-input"
                                   type="checkbox"
                                   role="switch"
                                   id="is_active"
                                   name="is_active"
                                   value="1"
                                   {{ (string) old('is_active', (int) $slide->is_active) === '1' ? 'checked' : '' }}>

                            <label class="form-check-label fw-semibold"
                                   for="is_active">
                                Active
                            </label>
                        </div>

                        <div class="form-text">
                            Only active slides appear on your homepage.
                        </div>
                    </div>
                </div>

                {{-- UPDATE ACTIONS --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-3">
                        <button type="submit"
                                class="btn btn-primary w-100 py-2 mb-2">
                            <i class="bi bi-check-circle me-2"></i>
                            Update Hero Slide
                        </button>

                        <a href="{{ route('super-admin.hero-slides.index') }}"
                           class="btn btn-light border w-100 py-2">
                            Cancel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: 1px solid #eef0f4;
    }

    .form-label {
        font-size: 14px;
        color: #374151;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 12px;
        border-color: #dfe3eb;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 .2rem rgba(99, 102, 241, .12);
    }

    .feature-card-form,
    .button-config {
        padding: 18px;
        background: #f8fafc;
        border: 1px solid #e9edf4;
        border-radius: 10px;
    }

    .feature-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        margin-right: 10px;
        border-radius: 8px;
        background: #e0e7ff;
        color: #4338ca;
        font-weight: 700;
    }

    .current-image-box {
        padding: 12px;
        display: inline-block;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
    }

    .current-slide-image {
        display: block;
        max-width: 240px;
        max-height: 150px;
        object-fit: contain;
        border-radius: 8px;
    }

    .form-check-input {
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #4f46e5;
        border-color: #4f46e5;
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('slideImage');
    const preview = document.getElementById('imagePreview');
    const previewBox = document.getElementById('imagePreviewBox');

    input.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            preview.src = '';
            previewBox.classList.add('d-none');
            return;
        }

        if (!file.type.startsWith('image/')) {
            this.value = '';
            preview.src = '';
            previewBox.classList.add('d-none');
            alert('Please select a valid image file.');
            return;
        }

        preview.src = URL.createObjectURL(file);
        previewBox.classList.remove('d-none');
    });
});
</script>
@endsection
