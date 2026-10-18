@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">
{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="fw-bold mb-1">
            Batch / Class Management
        </h4>

        <p class="text-muted mb-0">
            Manage courses, batches and assigned students
        </p>
    </div>

    <a href="{{ route('super-admin.batches.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-lg me-1"></i>
        Create Batch

    </a>

</div>


{{-- Success Message --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-1"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- Info Message --}}
@if(session('info'))

    <div class="alert alert-info alert-dismissible fade show">

        <i class="bi bi-info-circle me-1"></i>

        {{ session('info') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- Statistics --}}
<div class="row g-3 mb-4">

    {{-- Total --}}
    <div class="col-xl-4 col-md-6">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="rounded-3 bg-primary bg-opacity-10 p-3">

                        <i class="bi bi-collection-fill text-primary fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <div class="text-muted small">
                            Total Batches
                        </div>

                        <h4 class="fw-bold mb-0">
                            {{ $totalBatches }}
                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Active --}}
    <div class="col-xl-4 col-md-6">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="rounded-3 bg-success bg-opacity-10 p-3">

                        <i class="bi bi-check-circle-fill text-success fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <div class="text-muted small">
                            Active Batches
                        </div>

                        <h4 class="fw-bold mb-0">
                            {{ $activeBatches }}
                        </h4>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Inactive --}}
    <div class="col-xl-4 col-md-6">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="rounded-3 bg-secondary bg-opacity-10 p-3">

                        <i class="bi bi-pause-circle-fill text-secondary fs-4"></i>

                    </div>

                    <div class="ms-3">

                        <div class="text-muted small">
                            Inactive Batches
                        </div>

                        <h4 class="fw-bold mb-0">
                            {{ $inactiveBatches }}
                        </h4>

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
              action="{{ route('super-admin.batches.index') }}">

            <div class="row g-2 align-items-end">

                {{-- Search --}}
                <div class="col-lg-6">

                    <label class="form-label fw-semibold">
                        Search
                    </label>

                    <input type="text"
                           name="search"
                           class="form-control"
                           value="{{ request('search') }}"
                           placeholder="Search batch, code or course...">

                </div>


                {{-- Status --}}
                <div class="col-lg-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="">
                            All Status
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


                {{-- Buttons --}}
                <div class="col-lg-3">

                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-search me-1"></i>
                            Search

                        </button>

                        <a href="{{ route('super-admin.batches.index') }}"
                           class="btn btn-light border">

                            <i class="bi bi-arrow-clockwise"></i>

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>


{{-- Batch Table --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-bold mb-1">
                    All Batches
                </h5>

                <small class="text-muted">
                    Total records: {{ $batches->total() }}
                </small>

            </div>

            <a href="{{ route('super-admin.batches.create') }}"
               class="btn btn-sm btn-primary">

                <i class="bi bi-plus-lg me-1"></i>
                New Batch

            </a>

        </div>

    </div>


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-4">
                            #
                        </th>

                        <th>
                            Batch
                        </th>

                        <th>
                            Course
                        </th>

                        <th>
                            Schedule
                        </th>

                        <th>
                            Mode
                        </th>

                        <th>
                            Students
                        </th>

                        <th>
                            Status
                        </th>

                        <th class="text-end px-4">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($batches as $batch)

                    <tr>

                        {{-- Number --}}
                        <td class="px-4">

                            {{ $batches->firstItem() + $loop->index }}

                        </td>


                        {{-- Batch --}}
                        <td>

                            <div class="fw-semibold">
                                {{ $batch->name }}
                            </div>

                            <small class="text-muted">
                                {{ $batch->code }}
                            </small>

                        </td>


                        {{-- Course --}}
                        <td>

                            @if($batch->course)

                                <div class="fw-semibold">
                                    {{ $batch->course->name }}
                                </div>

                                <small class="text-muted">
                                    {{ $batch->course->code }}
                                </small>

                            @else

                                <span class="text-muted">
                                    Course deleted
                                </span>

                            @endif

                        </td>


                        {{-- Schedule --}}
                        <td>

                            <div class="fw-semibold">

                                {{ $batch->start_date?->format('d M Y') }}

                                @if($batch->end_date)

                                    -
                                    {{ $batch->end_date->format('d M Y') }}

                                @endif

                            </div>

                            @if($batch->start_time || $batch->end_time)

                                <small class="text-muted">

                                    {{ $batch->start_time }}
                                    -
                                    {{ $batch->end_time }}

                                </small>

                            @endif

                            @if($batch->days)

                                <br>

                                <small class="text-muted">
                                    {{ $batch->days }}
                                </small>

                            @endif

                        </td>


                        {{-- Mode --}}
                        <td>

                            @if($batch->mode === 'online')

                                <span class="badge bg-primary">
                                    <i class="bi bi-globe me-1"></i>
                                    Online
                                </span>

                            @elseif($batch->mode === 'hybrid')

                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-diagram-3 me-1"></i>
                                    Hybrid
                                </span>

                            @else

                                <span class="badge bg-info text-dark">
                                    <i class="bi bi-building me-1"></i>
                                    Offline
                                </span>

                            @endif

                        </td>


                        {{-- Students --}}
                        <td>

                            @php
                                $studentCount = $batch->students()->count();
                            @endphp

                            <div class="fw-semibold">

                                {{ $studentCount }}

                                <span class="text-muted fw-normal">
                                    / {{ $batch->capacity }}
                                </span>

                            </div>

                            <small class="text-muted">
                                Students
                            </small>

                        </td>


                        {{-- Status --}}
                        <td>

                            @if($batch->is_active)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td class="text-end px-4">

                            {{-- View --}}
                            <a href="{{ route(
                                'super-admin.batches.show',
                                $batch->id
                            ) }}"
                               class="btn btn-sm btn-outline-primary"
                               title="View">

                                <i class="bi bi-eye"></i>

                            </a>


                            {{-- Edit --}}
                            <a href="{{ route(
                                'super-admin.batches.edit',
                                $batch->id
                            ) }}"
                               class="btn btn-sm btn-outline-warning"
                               title="Edit">

                                <i class="bi bi-pencil"></i>

                            </a>


                            {{-- Status --}}
                            <form method="POST"
                                  action="{{ route(
                                      'super-admin.batches.toggle-status',
                                      $batch->id
                                  ) }}"
                                  class="d-inline">

                                @csrf

                                <button type="submit"
                                        class="btn btn-sm btn-outline-success"
                                        title="Toggle Status">

                                    @if($batch->is_active)

                                        <i class="bi bi-pause"></i>

                                    @else

                                        <i class="bi bi-play"></i>

                                    @endif

                                </button>

                            </form>


                            {{-- Delete --}}
                            <form method="POST"
                                  action="{{ route(
                                      'super-admin.batches.destroy',
                                      $batch->id
                                  ) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this batch?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Delete">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center py-5">

                            <div class="mb-3">

                                <i class="bi bi-collection fs-1 text-muted"></i>

                            </div>

                            <h6 class="fw-bold">
                                No Batches Found
                            </h6>

                            <p class="text-muted mb-3">
                                Create your first batch to get started.
                            </p>

                            <a href="{{ route('super-admin.batches.create') }}"
                               class="btn btn-primary">

                                <i class="bi bi-plus-lg me-1"></i>
                                Create Batch

                            </a>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if($batches->hasPages())

        <div class="card-footer bg-white border-0">

            {{ $batches->links() }}

        </div>

    @endif

</div>


</div>

@endsection
