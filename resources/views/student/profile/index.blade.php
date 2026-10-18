@extends('layouts.student')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">
            My Profile
        </h3>

        <p class="text-muted mb-0">
            Manage your account information and password.
        </p>
    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>

    @endif


    <div class="row g-4">

        {{-- Profile Information --}}
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-person-circle me-2"></i>
                        Profile Information
                    </h5>

                    <div class="mb-3">

                        <label class="form-label text-muted">
                            Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $student->name }}"
                            readonly
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label text-muted">
                            Email
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            value="{{ $student->email }}"
                            readonly
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label text-muted">
                            Phone
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $student->phone ?? 'Not provided' }}"
                            readonly
                        >

                    </div>


                    <div>

                        <label class="form-label text-muted">
                            Account Status
                        </label>

                        @if($student->is_active)

                            <span class="badge bg-success">
                                Active
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Inactive
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Change Password --}}
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-shield-lock me-2"></i>
                        Change Password
                    </h5>

                    <form
                        action="{{ route('student.profile.password.update') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- Current Password --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Current Password
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                required
                            >

                            @error('current_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- New Password --}}
                        <div class="mb-3">

                            <label class="form-label">
                                New Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required
                            >

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Minimum 8 characters.
                            </small>

                        </div>


                        {{-- Confirm Password --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Confirm New Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-key-fill me-1"></i>
                            Change Password
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
