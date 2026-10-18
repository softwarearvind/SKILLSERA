@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Student Details
            </h4>

            <p class="text-muted mb-0">
                View complete student information
            </p>
        </div>

        <a href="{{ route('super-admin.students.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Students
        </a>

    </div>


    {{-- Student Profile --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row">

                {{-- Profile --}}
                <div class="col-md-4 text-center border-end">

                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width:90px;height:90px;font-size:35px;">

                        {{ strtoupper(substr($student->name ?? 'S', 0, 1)) }}

                    </div>

                    <h4 class="fw-bold">
                        {{ $student->name }}
                    </h4>

                    <span class="badge
                        {{ $student->is_active ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $student->is_active ? 'Approved' : 'Pending' }}
                    </span>

                </div>


                {{-- Information --}}
                <div class="col-md-8">

                    <h5 class="fw-bold mb-4">
                        Personal Information
                    </h5>

                    <div class="row g-3">

                        {{-- Name --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Full Name
                            </label>

                            <div class="fw-semibold">
                                {{ $student->name }}
                            </div>

                        </div>


                        {{-- Email --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Email Address
                            </label>

                            <div class="fw-semibold">
                                {{ $student->email }}
                            </div>

                        </div>


                        {{-- Phone --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Phone
                            </label>

                            <div class="fw-semibold">
                                {{ $student->phone ?? 'Not provided' }}
                            </div>

                        </div>


                        {{-- Role --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Role
                            </label>

                            <div class="fw-semibold text-capitalize">
                                {{ $student->role }}
                            </div>

                        </div>


                        {{-- Registration --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Registration Date
                            </label>

                            <div class="fw-semibold">
                                {{ $student->created_at?->format('d M Y, h:i A') }}
                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6">

                            <label class="text-muted small">
                                Account Status
                            </label>

                            <div>

                                @if($student->is_active)

                                    <span class="badge bg-success">
                                        Active / Approved
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Actions --}}
    <div class="card border-0 shadow-sm mt-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Student Actions
            </h5>

            <div class="d-flex gap-2">

                @if(!$student->is_active)

                    <form method="POST"
                          action="{{ route('super-admin.students.approve', $student->id) }}">

                        @csrf

                        <button type="submit"
                                class="btn btn-success">

                            <i class="bi bi-check-circle me-1"></i>
                            Approve Student

                        </button>

                    </form>

                @else

                    <form method="POST"
                          action="{{ route('super-admin.students.deactivate', $student->id) }}">

                        @csrf

                        <button type="submit"
                                class="btn btn-warning">

                            <i class="bi bi-person-x me-1"></i>
                            Deactivate

                        </button>

                    </form>

                @endif


                {{-- Delete --}}
                <form method="POST"
                      action="{{ route('super-admin.students.destroy', $student->id) }}"
                      onsubmit="return confirm('Are you sure you want to delete this student?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">

                        <i class="bi bi-trash me-1"></i>
                        Delete

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
