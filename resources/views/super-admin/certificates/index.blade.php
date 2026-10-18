@extends('layouts.admin')

@section('title', 'Certificates')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between
                align-items-center gap-3 mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-award-fill text-primary"></i>
                Certificates
            </h3>

            <p class="text-muted mb-0">
                Manage student certificates and course completions
            </p>
        </div>

        <a href="{{ route('super-admin.certificates.create') }}"
           class="btn btn-primary px-4">

            <i class="bi bi-plus-lg me-1"></i>
            Generate Certificate

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif


    {{-- Statistics --}}
    <div class="row g-4 mb-4">

        {{-- Total --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Total Certificates
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalCertificates }}
                            </h3>

                        </div>

                        <div class="rounded-circle
                                    bg-primary bg-opacity-10
                                    text-primary p-3">

                            <i class="bi bi-award-fill fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Active --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Active
                            </p>

                            <h3 class="fw-bold text-success mb-0">
                                {{ $activeCertificates }}
                            </h3>

                        </div>

                        <div class="rounded-circle
                                    bg-success bg-opacity-10
                                    text-success p-3">

                            <i class="bi bi-check-circle-fill fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Inactive --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Inactive
                            </p>

                            <h3 class="fw-bold text-secondary mb-0">
                                {{ $inactiveCertificates }}
                            </h3>

                        </div>

                        <div class="rounded-circle
                                    bg-secondary bg-opacity-10
                                    text-secondary p-3">

                            <i class="bi bi-pause-circle-fill fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- This Month --}}
        <div class="col-md-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Issued This Month
                            </p>

                            <h3 class="fw-bold text-info mb-0">
                                {{ $thisMonthCertificates }}
                            </h3>

                        </div>

                        <div class="rounded-circle
                                    bg-info bg-opacity-10
                                    text-info p-3">

                            <i class="bi bi-calendar-check-fill fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Filters --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.certificates.index') }}">

                <div class="row g-3 align-items-end">

                    {{-- Search --}}
                    <div class="col-lg-4">

                        <label class="form-label fw-semibold">
                            Search
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Certificate no, student or course"
                                value="{{ request('search') }}"
                            >

                        </div>

                    </div>


                    {{-- Course --}}
                    <div class="col-lg-3">

                        <label class="form-label fw-semibold">
                            Course
                        </label>

                        <select name="course_id"
                                class="form-select">

                            <option value="">
                                All Courses
                            </option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ request('course_id') == $course->id
                                        ? 'selected'
                                        : '' }}
                                >
                                    {{ $course->name }}
                                </option>

                            @endforeach

                        </select>

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

                            <option value="1"
                                {{ request('status') === '1'
                                    ? 'selected'
                                    : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ request('status') === '0'
                                    ? 'selected'
                                    : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    {{-- Buttons --}}
                    <div class="col-lg-2 d-flex gap-2">

                        <button type="submit"
                                class="btn btn-primary flex-grow-1">

                            <i class="bi bi-search"></i>
                            Search

                        </button>

                        <a href="{{ route(
                            'super-admin.certificates.index'
                        ) }}"
                           class="btn btn-light border">

                            <i class="bi bi-arrow-clockwise"></i>

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Certificate Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex
                        justify-content-between
                        align-items-center">

                <div>

                    <h5 class="fw-bold mb-1">
                        Certificate Records
                    </h5>

                    <small class="text-muted">
                        All generated student certificates
                    </small>

                </div>

                <span class="badge bg-light text-dark border">

                    {{ $certificates->total() }} Records

                </span>

            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover
                              align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                Certificate
                            </th>

                            <th>
                                Student
                            </th>

                            <th>
                                Course
                            </th>

                            <th>
                                Result
                            </th>

                            <th>
                                Issue Date
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-end px-4">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($certificates as $certificate)

                            <tr>

                                {{-- Certificate --}}
                                <td class="px-4">

                                    <div class="d-flex
                                                align-items-center">

                                        <div
                                            class="rounded-3
                                                   bg-primary
                                                   bg-opacity-10
                                                   text-primary
                                                   p-2 me-3">

                                            <i class="bi bi-award-fill
                                                      fs-4"></i>

                                        </div>

                                        <div>

                                            <div class="fw-bold">

                                                {{ $certificate->certificate_number }}

                                            </div>

                                            <small class="text-muted">

                                                {{ $certificate->title }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Student --}}
                                <td>

                                    <div class="d-flex
                                                align-items-center">

                                        <div
                                            class="rounded-circle
                                                   bg-dark
                                                   text-white
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   me-2"
                                            style="width:38px;height:38px;"
                                        >

                                            {{ strtoupper(
                                                substr(
                                                    $certificate->student->name ?? 'S',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                        <div>

                                            <div class="fw-semibold">

                                                {{ $certificate->student->name
                                                    ?? 'N/A' }}

                                            </div>

                                            <small class="text-muted">

                                                {{ $certificate->student->email
                                                    ?? '' }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Course --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $certificate->course->name
                                            ?? 'N/A' }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $certificate->course->code
                                            ?? '' }}

                                    </small>

                                </td>


                                {{-- Result --}}
                                <td>

                                    @if($certificate->percentage !== null)

                                        <div class="fw-bold">

                                            {{ $certificate->percentage }}%

                                        </div>

                                    @endif

                                    @if($certificate->grade)

                                        <span class="badge bg-info
                                                     text-dark">

                                            Grade:
                                            {{ $certificate->grade }}

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- Issue Date --}}
                                <td>

                                    {{ $certificate->issue_date
                                        ? $certificate->issue_date
                                            ->format('d M Y')
                                        : '—' }}

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($certificate->is_active)

                                        <span class="badge
                                                     bg-success">

                                            <i class="bi bi-check-circle"></i>
                                            Active

                                        </span>

                                    @else

                                        <span class="badge
                                                     bg-secondary">

                                            <i class="bi bi-pause-circle"></i>
                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="text-end px-4">

                                    <div class="d-flex
                                                justify-content-end
                                                gap-1">

                                        {{-- View --}}
                                        <a
                                            href="{{ route(
                                                'super-admin.certificates.show',
                                                $certificate->id
                                            ) }}"
                                            class="btn btn-sm
                                                   btn-outline-primary"
                                            title="View"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Status --}}
                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'super-admin.certificates.toggle-status',
                                                $certificate->id
                                            ) }}"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-sm
                                                       btn-outline-warning"
                                                title="Toggle Status"
                                            >

                                                <i class="bi bi-power"></i>

                                            </button>

                                        </form>


                                        {{-- Delete --}}
                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'super-admin.certificates.destroy',
                                                $certificate->id
                                            ) }}"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this certificate?'
                                            );"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm
                                                       btn-outline-danger"
                                                title="Delete"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <div class="py-4">

                                        <div
                                            class="rounded-circle
                                                   bg-light
                                                   d-inline-flex
                                                   p-4 mb-3">

                                            <i class="bi bi-award
                                                      text-muted fs-1"></i>

                                        </div>

                                        <h5 class="fw-bold">
                                            No Certificates Found
                                        </h5>

                                        <p class="text-muted mb-3">

                                            No certificates have been
                                            generated yet.

                                        </p>

                                        <a
                                            href="{{ route(
                                                'super-admin.certificates.create'
                                            ) }}"
                                            class="btn btn-primary"
                                        >

                                            <i class="bi bi-plus-lg"></i>

                                            Generate First Certificate

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($certificates->hasPages())

            <div class="card-footer bg-white">

                {{ $certificates->links() }}

            </div>

        @endif

    </div>

</div>

@endsection