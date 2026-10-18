@extends('layouts.student')

@section('title', 'Certificate')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-3">

        <a
            href="{{ route('student.certificates.index') }}"
            class="text-decoration-none"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Certificates
        </a>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row align-items-center">

                {{-- Certificate Information --}}
                <div class="col-lg-8">

                    <div class="text-center text-lg-start mb-4">

                        <i class="bi bi-award-fill text-warning fs-1"></i>

                        <h2 class="fw-bold mt-2">
                            {{ $certificate->title }}
                        </h2>

                        <p class="text-muted">
                            This certificate is awarded to
                        </p>

                        <h3 class="fw-bold">
                            {{ $certificate->student->name?? 'Student Name' }}
                        </h3>

                        <p class="text-muted">
                            for successfully completing
                        </p>

                        <h4 class="fw-bold text-primary">
                            {{ $certificate->course->name ?? '-' }}
                        </h4>

                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">

                            <div class="bg-light rounded p-3">

                                <small class="text-muted d-block">
                                    Certificate Number
                                </small>

                                <strong>
                                    {{ $certificate->certificate_number }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="bg-light rounded p-3">

                                <small class="text-muted d-block">
                                    Issue Date
                                </small>

                                <strong>
                                    {{ $certificate->issue_date?->format('d M Y') }}
                                </strong>

                            </div>

                        </div>

                        @if($certificate->percentage)

                            <div class="col-md-6">

                                <div class="bg-light rounded p-3">

                                    <small class="text-muted d-block">
                                        Percentage
                                    </small>

                                    <strong>
                                        {{ $certificate->percentage }}%
                                    </strong>

                                </div>

                            </div>

                        @endif

                        @if($certificate->grade)

                            <div class="col-md-6">

                                <div class="bg-light rounded p-3">

                                    <small class="text-muted d-block">
                                        Grade
                                    </small>

                                    <strong>
                                        {{ $certificate->grade }}
                                    </strong>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- QR Code --}}
                <div class="col-lg-4 text-center mt-4 mt-lg-0">

                    <div class="border rounded p-4">

                        <h6 class="fw-bold mb-3">
                            Verify Certificate
                        </h6>

                        @php
                            use SimpleSoftwareIO\QrCode\Facades\QrCode;
                        @endphp

                        {!! QrCode::size(180)
                            ->margin(1)
                            ->generate($verificationUrl) !!}

                        <p class="small text-muted mt-3 mb-1">
                            Scan QR Code to verify
                        </p>

                        <div class="small text-break">
                            {{ $certificate->certificate_number }}
                        </div>

                    </div>

                </div>

            </div>

            @if($certificate->description)

                <hr class="my-4">

                <h6 class="fw-bold">
                    Description
                </h6>

                <p class="text-muted mb-0">
                    {{ $certificate->description }}
                </p>

            @endif

        </div>

    </div>

</div>

@endsection
