@csrf

<div class="mb-3">
    <label class="form-label">Trainer Name *</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $trainer->name ?? '') }}" required>
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Designation *</label>
    <input type="text" name="designation" class="form-control"
           value="{{ old('designation', $trainer->designation ?? '') }}" required>
    @error('designation') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Experience</label>
        <input type="text" name="experience" class="form-control"
               placeholder="10+ Yrs Exp"
               value="{{ old('experience', $trainer->experience ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $trainer->email ?? '') }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Trainer Photo</label>
    <input type="file" name="photo" class="form-control"
           accept=".jpg,.jpeg,.png,.webp">
    <small class="text-muted">Maximum size: 2 MB</small>

    @if(!empty($trainer?->photo))
        <div class="mt-2">
            <img src="{{ asset('storage/'.$trainer->photo) }}"
                 width="100" height="100"
                 style="object-fit:cover;border-radius:10px"
                 alt="Trainer photo">
        </div>
    @endif

    @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $trainer->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Skills</label>
    <input type="text" name="skills" class="form-control"
           placeholder="Payroll, PF & ESI, Labour Laws"
           value="{{ old('skills', isset($trainer) ? implode(', ', $trainer->skills ?? []) : '') }}">
    <small class="text-muted">Skills ko comma se separate karein.</small>
</div>

<div class="mb-3">
    <label class="form-label">LinkedIn URL</label>
    <input type="url" name="linkedin_url" class="form-control"
           value="{{ old('linkedin_url', $trainer->linkedin_url ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Display Order</label>
    <input type="number" min="0" name="sort_order" class="form-control"
           value="{{ old('sort_order', $trainer->sort_order ?? 0) }}">
</div>

<div class="form-check form-switch mb-4">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" value="1"
           class="form-check-input" id="is_active"
           @checked(old('is_active', $trainer->is_active ?? true))>
    <label for="is_active" class="form-check-label">Active on website</label>
</div>

<button type="submit" class="btn btn-primary">
    Save Trainer
</button>

<a href="{{ route('super-admin.trainers.index') }}"
   class="btn btn-secondary">Cancel</a>
