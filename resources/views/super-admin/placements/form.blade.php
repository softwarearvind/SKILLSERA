
@php
    $placement = $placement ?? null;
@endphp

<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label">Student Name *</label>
        <input type="text" name="student_name"
            class="form-control"
            value="{{ old('student_name', $placement?->student_name) }}"
            required>
        @error('student_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Student Photo</label>
        <input type="file" name="student_photo"
            class="form-control" accept="image/*">
        @error('student_photo')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        @if($placement?->student_photo)
            <img src="{{ asset('storage/'.$placement->student_photo) }}"
                alt="Student photo" width="80"
                class="mt-2 rounded">
        @endif
    </div>

    <div class="col-md-6">
        <label class="form-label">College / University</label>
        <input type="text" name="college_name"
            class="form-control"
            value="{{ old('college_name', $placement?->college_name) }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Company Name *</label>
        <input type="text" name="company_name"
            class="form-control"
            value="{{ old('company_name', $placement?->company_name) }}"
            required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Job Role *</label>
        <input type="text" name="job_role"
            class="form-control"
            value="{{ old('job_role', $placement?->job_role) }}"
            required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Course / Training</label>
        <input type="text" name="course_name"
            class="form-control"
            value="{{ old('course_name', $placement?->course_name) }}">
    </div>

    <div class="col-12">
        <label class="form-label">Placement Announcement</label>
        <textarea name="announcement" class="form-control"
            rows="3">{{ old('announcement', $placement?->announcement) }}</textarea>
    </div>

    <div class="col-md-4">
        <label class="form-label">Display Order</label>
        <input type="number" name="sort_order"
            class="form-control" min="0"
            value="{{ old('sort_order', $placement?->sort_order ?? 0) }}"
            required>
    </div>

    <div class="col-md-4">
        <div class="form-check mt-4">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1"
                class="form-check-input" id="is_featured"
                @checked(old('is_featured', $placement?->is_featured ?? false))>
            <label class="form-check-label" for="is_featured">
                Featured Wide Card
            </label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-check mt-4">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1"
                class="form-check-input" id="is_active"
                @checked(old('is_active', $placement?->is_active ?? true))>
            <label class="form-check-label" for="is_active">
                Active on Website
            </label>
        </div>
    </div>

</div>

<div class="mt-4 d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        Save Placement
    </button>

    <a href="{{ route('super-admin.placements.index') }}"
       class="btn btn-outline-secondary">
        Cancel
    </a>
</div>
