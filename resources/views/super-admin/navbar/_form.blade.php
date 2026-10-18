
@php
    $item = $item ?? null;
@endphp

<div class="mb-3">
    <label class="form-label">Menu Title</label>
    <input type="text" name="title" class="form-control"
           value="{{ old('title', $item?->title) }}"
           placeholder="e.g. About Us" required>
    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label class="form-label">URL</label>
    <input type="text" name="url" class="form-control"
           value="{{ old('url', $item?->url) }}"
           placeholder="/about">
    <small class="text-muted">
        Example: /about, /courses, /contact or /login
    </small>
    @error('url') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Menu Type</label>
        <select name="type" class="form-select" required>
            @foreach(['link' => 'Normal Link', 'demo' => 'Free Demo Class', 'login' => 'Student Login'] as $value => $label)
                <option value="{{ $value }}"
                    @selected(old('type', $item?->type ?? 'link') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Open Link In</label>
        <select name="target" class="form-select" required>
            <option value="_self"
                @selected(old('target', $item?->target ?? '_self') === '_self')>
                Same Tab
            </option>
            <option value="_blank"
                @selected(old('target', $item?->target ?? '_self') === '_blank')>
                New Tab
            </option>
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control"
               min="0" required
               value="{{ old('sort_order', $item?->sort_order ?? 0) }}">
    </div>
</div>

<div class="form-check form-switch mb-4">
    <input type="hidden" name="is_active" value="0">

    <input class="form-check-input" type="checkbox"
           name="is_active" value="1" id="is_active"
           @checked(old('is_active', $item?->is_active ?? true))>

    <label class="form-check-label" for="is_active">
        Show on Website
    </label>
</div>

<button type="submit" class="btn btn-primary">
    Save Menu Item
</button>

<a href="{{ route('super-admin.navbar.index') }}"
   class="btn btn-secondary">Cancel</a>
