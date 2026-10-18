@extends('layouts.admin')

@section('title', 'Study Materials')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-file-earmark-text-fill me-2"></i>
                Study Materials
            </h3>

            <p class="text-muted mb-0">
                Manage course and module study materials.
            </p>
        </div>

        <a href="{{ route('super-admin.study-materials.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Add Material

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Stats --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Total Materials
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $totalMaterials }}
                            </h3>
                        </div>

                        <div class="fs-2 text-primary">
                            <i class="bi bi-files"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Active Materials
                            </small>

                            <h3 class="fw-bold mb-0 text-success">
                                {{ $activeMaterials }}
                            </h3>
                        </div>

                        <div class="fs-2 text-success">
                            <i class="bi bi-check-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Inactive Materials
                            </small>

                            <h3 class="fw-bold mb-0 text-danger">
                                {{ $inactiveMaterials }}
                            </h3>
                        </div>

                        <div class="fs-2 text-danger">
                            <i class="bi bi-x-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Search / Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.study-materials.index') }}">

                <div class="row g-3 align-items-end">

                    {{-- Search --}}
                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            Search
                        </label>

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Search material, course or module..."
                               value="{{ request('search') }}">

                    </div>


                    {{-- Status --}}
                    <div class="col-md-2">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="">
                                All
                            </option>

                            <option value="active"
                                {{ request('status') === 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ request('status') === 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Filter --}}
                    <div class="col-md-2">

                        <button type="submit"
                                class="btn btn-dark w-100">

                            <i class="bi bi-funnel me-1"></i>
                            Filter

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Materials Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Material List
            </h5>

        </div>


        @if($materials->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Material</th>

                            <th>Course</th>

                            <th>Module</th>

                            <th>Type</th>

                            <th>Status</th>

                            <th width="180">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($materials as $material)

                            <tr>

                                {{-- # --}}
                                <td>

                                    {{ $materials->firstItem() + $loop->index }}

                                </td>


                                {{-- Material --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $material->title }}

                                    </div>

                                    @if($material->description)

                                        <small class="text-muted">

                                            {{ Str::limit(
                                                $material->description,
                                                60
                                            ) }}

                                        </small>

                                    @endif

                                </td>


                                {{-- Course --}}
                                <td>

                                    {{ $material->course->name ?? 'N/A' }}

                                </td>


                                {{-- Module --}}
                                <td>

                                    <span class="badge bg-light text-dark">

                                        {{ $material->module->title ?? 'N/A' }}

                                    </span>

                                </td>


                                {{-- Type --}}
                                <td>

                                    @if($material->file_type)

                                        <span class="badge bg-primary">

                                            {{ strtoupper(
                                                $material->file_type
                                            ) }}

                                        </span>

                                    @elseif($material->external_url)

                                        <span class="badge bg-info text-dark">

                                            URL

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($material->is_active)

                                        <span class="badge bg-success">

                                            Active

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="d-flex gap-1">

                                        {{-- View --}}
                                        <a href="{{ route(
                                            'super-admin.study-materials.show',
                                            $material->id
                                        ) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="View">

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route(
                                            'super-admin.study-materials.edit',
                                            $material->id
                                        ) }}"
                                           class="btn btn-sm btn-outline-warning"
                                           title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Toggle --}}
                                        <form method="POST"
                                              action="{{ route(
                                                  'super-admin.study-materials.toggle-status',
                                                  $material->id
                                              ) }}">

                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-success"
                                                    title="Toggle Status">

                                                <i class="bi bi-power"></i>

                                            </button>

                                        </form>


                                        {{-- Delete --}}
                                        <form method="POST"
                                              action="{{ route(
                                                  'super-admin.study-materials.destroy',
                                                  $material->id
                                              ) }}"
                                              onsubmit="return confirm('Delete this study material?');">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="card-footer bg-white">

                {{ $materials->links() }}

            </div>

        @else

            <div class="text-center py-5">

                <i class="bi bi-file-earmark-x fs-1 text-muted"></i>

                <h5 class="mt-3">
                    No Study Materials Found
                </h5>

                <p class="text-muted">
                    Add your first study material.
                </p>

                <a href="{{ route(
                    'super-admin.study-materials.create'
                ) }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle me-1"></i>
                    Add Material

                </a>

            </div>

        @endif

    </div>

</div>

@endsection
