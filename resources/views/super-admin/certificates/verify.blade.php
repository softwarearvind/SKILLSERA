<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Certificate Verification
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        body {
            min-height: 100vh;
            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1f2937
                );
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .verification-card {
            width: 100%;
            max-width: 850px;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0,0,0,.30);
        }

        .verification-header {
            background: #111827;
            color: #ffffff;
            text-align: center;
            padding: 40px 25px;
        }

        .verification-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #c49a5a;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 38px;
        }

        .verification-header h1 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .verification-header p {
            margin: 0;
            color: #d1d5db;
        }

        .certificate-body {
            padding: 40px;
        }

        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #d1fae5;
            color: #047857;
            border-radius: 50px;
            padding: 10px 18px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .student-name {
            font-family: Georgia, serif;
            font-size: 36px;
            font-weight: 700;
            color: #111827;
        }

        .course-name {
            font-family: Georgia, serif;
            color: #c49a5a;
            font-size: 27px;
            font-weight: 700;
        }

        .info-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 18px;
            height: 100%;
        }

        .info-label {
            font-size: 12px;
            color: #6c757d;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: .5px;
        }

        .info-value {
            margin-top: 5px;
            font-size: 16px;
            font-weight: 600;
            color: #111827;
        }

        .certificate-number {
            background: #fff8e7;
            border: 1px solid #ead39b;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-top: 25px;
        }

        .certificate-number small {
            display: block;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .certificate-number strong {
            color: #111827;
            letter-spacing: 1px;
        }

        .footer-note {
            border-top: 1px solid #dee2e6;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 13px;
        }

    </style>

</head>


<body>

<div class="verification-card">

    @if($certificate)

        {{-- Header --}}
        <div class="verification-header">

            <div class="verification-icon">

                <i class="bi bi-patch-check-fill"></i>

            </div>

            <h1>
                Certificate Verified
            </h1>

            <p>
                This certificate has been successfully verified.
            </p>

        </div>


        {{-- Body --}}
        <div class="certificate-body">

            <div class="text-center">

                @if($certificate->is_active)

                    <div class="verified-badge">

                        <i class="bi bi-check-circle-fill"></i>

                        Authentic Certificate

                    </div>

                @else

                    <div class="badge bg-danger px-3 py-2">

                        <i class="bi bi-x-circle-fill me-1"></i>

                        Certificate Inactive

                    </div>

                @endif


                <p class="text-muted mb-2">

                    This certificate belongs to

                </p>

                <div class="student-name">

                    {{ $certificate->student->name }}

                </div>


                <p class="text-muted mt-4 mb-2">

                    Successfully completed

                </p>

                <div class="course-name">

                    {{ $certificate->course->name }}

                </div>

            </div>


            {{-- Information --}}
            <div class="row g-3 mt-4">

                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Certificate Title
                        </div>

                        <div class="info-value">

                            {{ $certificate->title }}

                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-label">
                            Course Code
                        </div>

                        <div class="info-value">

                            {{ $certificate->course->code ?? '—' }}

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Issue Date
                        </div>

                        <div class="info-value">

                            {{ $certificate->issue_date
                                ? $certificate->issue_date->format('d M Y')
                                : '—' }}

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Completion Date
                        </div>

                        <div class="info-value">

                            {{ $certificate->completion_date
                                ? $certificate->completion_date->format('d M Y')
                                : '—' }}

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="info-box">

                        <div class="info-label">
                            Result
                        </div>

                        <div class="info-value">

                            @if($certificate->percentage !== null)

                                {{ $certificate->percentage }}%

                            @elseif($certificate->grade)

                                {{ $certificate->grade }}

                            @else

                                Completed

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- Certificate Number --}}
            <div class="certificate-number">

                <small>
                    Certificate Number
                </small>

                <strong>

                    {{ $certificate->certificate_number }}

                </strong>

            </div>


            {{-- Description --}}
            @if($certificate->description)

                <div class="text-center mt-4">

                    <p class="text-muted mb-0">

                        {{ $certificate->description }}

                    </p>

                </div>

            @endif


            <div class="footer-note">

                <i class="bi bi-shield-check me-1"></i>

                This certificate was issued by the institute
                and can be independently verified using
                the certificate number.

            </div>

        </div>

    @else

        {{-- Invalid Certificate --}}
        <div class="verification-header">

            <div class="verification-icon bg-danger">

                <i class="bi bi-x-lg"></i>

            </div>

            <h1>
                Certificate Not Found
            </h1>

            <p>
                The certificate number could not be verified.
            </p>

        </div>

        <div class="certificate-body text-center">

            <div class="alert alert-danger">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                This certificate number is invalid or does not
                exist in our records.

            </div>

            <a
                href="{{ url('/') }}"
                class="btn btn-dark"
            >

                <i class="bi bi-house me-1"></i>

                Back to Website

            </a>

        </div>

    @endif

</div>

</body>

</html>