
@extends('layouts.admin')
@section('title', 'Hero Slider Management')

@section('content')
<div class="container-fluid py-4">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-images text-primary me-2"></i>
                Hero Slider Management
            </h3>
            <p class="text-muted mb-0">
                Manage your homepage hero banners dynamically.
            </p>
        </div>

        <a href="{{ route('super-admin.hero-slides.create') }}"
           class="btn btn-primary px-4">
            <i class="bi bi-plus-lg me-2"></i>
            Add New Slide
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

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
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

    {{-- SUMMARY CARDS --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-3 bg-primary bg-opacity-10 p-3 me-3">
                        <i class="bi bi-images text-primary fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Slides</div>
                        <h4 class="fw-bold mb-0">
                            {{ $slides->total() }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-3 bg-success bg-opacity-10 p-3 me-3">
                        <i class="bi bi-check-circle text-success fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Active Slides</div>
                        <h4 class="fw-bold mb-0">
                            {{ \App\Models\HeroSlide::where('is_active', true)->count() }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-3 bg-secondary bg-opacity-10 p-3 me-3">
                        <i class="bi bi-eye-slash text-secondary fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Inactive Slides</div>
                        <h4 class="fw-bold mb-0">
                            {{ \App\Models\HeroSlide::where('is_active', false)->count() }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SLIDES TABLE --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="fw-bold mb-0">All Hero Slides</h5>
                <span class="badge bg-light text-dark border">
                    {{ $slides->firstItem() ?? 0 }}–{{ $slides->lastItem() ?? 0 }}
                    of {{ $slides->total() }}
                </span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Preview</th>
                            <th>Slide Details</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($slides as $slide)
                            <tr>
                                <td class="ps-4 fw-semibold">
                                    {{ $slides->firstItem() + $loop->index }}
                                </td>

                                {{-- IMAGE PREVIEW --}}
                                <td>
                                    @if($slide->logo)
                                        <img
                                            src="{{ asset('storage/' . $slide->logo) }}"
                                            alt="{{ $slide->title }}"
                                            class="slide-preview"
                                        >
                                    @else
                                        <div class="slide-placeholder">
                                            <i class="bi bi-image fs-3"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- SLIDE DETAILS --}}
                                <td style="min-width: 220px;">
                                    <div class="fw-bold text-dark mb-1">
                                        {{ $slide->title }}
                                    </div>

                                    <div class="text-muted small mb-1">
                                        {{ $slide->subtitle ?: 'No subtitle added' }}
                                    </div>

                                    <div class="text-muted small">
                                        <i class="bi bi-card-text me-1"></i>
                                        {{ \Illuminate\Support\Str::limit($slide->description ?? 'No description', 75) }}
                                    </div>
                                </td>

                                {{-- ORDER --}}
                                <td>
                                    <span class="badge bg-light text-dark border px-3 py-2">
                                        {{ $slide->sort_order }}
                                    </span>
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    @if($slide->is_active)
                                        <span class="badge rounded-pill bg-success bg-opacity-10 text-success px-3 py-2">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Active
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-secondary bg-opacity-10 text-secondary px-3 py-2">
                                            <i class="bi bi-pause-circle me-1"></i>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- ACTIONS --}}
                                <td>
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">

                                        <a href="{{ route('super-admin.hero-slides.edit', $slide->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit slide">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('super-admin.hero-slides.toggle-status', $slide->id) }}"
                                              method="POST">
                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-sm {{ $slide->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                    title="{{ $slide->is_active ? 'Deactivate' : 'Activate' }}">
                                                <i class="bi {{ $slide->is_active ? 'bi-toggle-on' : 'bi-toggle-off' }}"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('super-admin.hero-slides.destroy', $slide->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this slide?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete slide">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="mb-3">
                                        <i class="bi bi-images text-muted"
                                           style="font-size: 3rem;"></i>
                                    </div>

                                    <h5 class="fw-bold">No Hero Slides Found</h5>
                                    <p class="text-muted mb-3">
                                        Add your first slide to display it on the homepage.
                                    </p>

                                    <a href="{{ route('super-admin.hero-slides.create') }}"
                                       class="btn btn-primary">
                                        <i class="bi bi-plus-lg me-2"></i>
                                        Add First Slide
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        @if($slides->hasPages())
            <div class="card-footer bg-white py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <small class="text-muted">
                        Showing {{ $slides->firstItem() }} to
                        {{ $slides->lastItem() }} of
                        {{ $slides->total() }} slides
                    </small>

                    {{ $slides->links() }}
                </div>
            </div>
        @endif
    </div>

</div>

{{-- PAGE STYLES --}}
<style>
    .slide-preview {
        width: 115px;
        height: 68px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        background: #f8fafc;
    }

    .slide-placeholder {
        width: 115px;
        height: 68px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px dashed #cbd5e1;
        border-radius: 8px;
        color: #94a3b8;
        background: #f8fafc;
    }

    .table > :not(caption) > * > * {
        padding: 16px 12px;
    }

    .table thead th {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #64748b;
        white-space: nowrap;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    .card {
        border-radius: 12px;
    }

    .btn {
        border-radius: 7px;
    }
</style>
@endsection
