
@extends('layouts.frontend')

@section('title', 'Login | ' . ($websiteSetting->site_name ?? 'Institute'))

@section('meta_description', 'Login to your institute training system to access courses, modules and student learning resources.')

@section('content')

<style>
    .login-section {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 15px;
        background: linear-gradient(135deg, #f5f7ff, #eef2ff);
    }

    .login-card {
        width: 100%;
        max-width: 450px;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 15px 45px rgba(31, 41, 55, 0.12);
    }

    .login-card-body {
        padding: 35px;
    }

    .login-logo {
        width: 110px;
        height: 110px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .login-title {
        color: #1e293b;
        font-size: 27px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .login-subtitle {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 28px;
    }

    .login-card .form-label {
        color: #334155;
        font-weight: 600;
        font-size: 14px;
    }

    .login-card .form-control {
        min-height: 48px;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        padding: 12px 14px;
    }

    .login-card .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
    }

    .login-btn {
        min-height: 48px;
        border: none;
        border-radius: 10px;
        background: #4f46e5;
        color: #ffffff;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .login-btn:hover {
        background: #3730a3;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .register-link {
        color: #4f46e5;
        font-weight: 600;
        text-decoration: none;
    }

    .register-link:hover {
        color: #3730a3;
        text-decoration: underline;
    }

    .login-footer {
        border-top: 1px solid #eef2f7;
        padding-top: 20px;
        margin-top: 25px;
        font-size: 14px;
        color: #64748b;
    }

    @media (max-width: 576px) {
        .login-card-body {
            padding: 25px 20px;
        }

        .login-title {
            font-size: 23px;
        }

        .login-logo {
            width: 90px;
            height: 90px;
        }
    }
</style>

<section class="login-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-5">

                <div class="card login-card">

                    <div class="card-body login-card-body">

                        {{-- Logo --}}
                        <div class="text-center">

                            <a href="{{ url('/') }}" class="d-inline-block">

                                <img
                                    src="{{ asset('images/logo.png') }}"
                                    alt="{{ $websiteSetting->site_name ?? 'Institute Logo' }}"
                                    class="login-logo"
                                >

                            </a>

                            {{-- Institute Name --}}
                            <h3 class="login-title">
                                {{ $websiteSetting->site_name ?? 'Institute Training System' }}
                            </h3>

                            <p class="login-subtitle">
                                Welcome back! Please login to your account.
                            </p>

                        </div>

                        {{-- Success Message --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show"
                                 role="alert">

                                {{ session('success') }}

                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                </button>

                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show"
                                 role="alert">

                                {{ session('error') }}

                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                </button>

                            </div>
                        @endif

                        {{-- Validation Errors --}}
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">

                                <strong>Please correct the following:</strong>

                                <ul class="mb-0 mt-2 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        {{-- Login Form --}}
                        <form method="POST"
                              action="{{ route('login.submit') }}">

                            @csrf

                            {{-- Email --}}
                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email address"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    required
                                    autofocus
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Password --}}
                            <div class="mb-3">

                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password"
                                    autocomplete="current-password"
                                    required
                                >

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Remember Me --}}
                            <div class="d-flex align-items-center justify-content-between mb-4">

                                <div class="form-check">

                                    <input
                                        type="checkbox"
                                        name="remember"
                                        value="1"
                                        class="form-check-input"
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <label class="form-check-label"
                                           for="remember">
                                        Remember me
                                    </label>

                                </div>

                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                    class="btn login-btn w-100">

                                Login to Your Account

                            </button>

                        </form>

                        {{-- Registration --}}
                        <div class="text-center login-footer">

                            <p class="mb-2">
                                Don't have a student account?
                            </p>

                            <a href="{{ route('register') }}"
                               class="register-link">
                                Create Student Account
                            </a>

                        </div>

                    </div>

                </div>

                <p class="text-center text-secondary mt-4 small">
                    &copy; {{ date('Y') }}
                    {{ $websiteSetting->site_name ?? 'Institute Training System' }}.
                    All rights reserved.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection

