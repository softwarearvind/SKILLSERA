@extends('layouts.student')

@section('title', 'My Certificates')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">
            My Certificates
        </h3>

        <p class="text-muted mb-0">
            View and verify your course certificates.
        </p>
    </div>

    <div class="row g-4">

        @forelse($certificates as $certificate)

            <div class="col-md-6 col-xl-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="text-center mb-3">

                            <div
                                class="rounded-circle bg-warning bg-opacity-10
                                       d-inline-flex align-items-center
                                       justify-content-center"
                                style="width:70px;height:70px;"
                            >
                                <i class="bi bi-award-fill text-warning fs-1"></i>
                            </div>

                        </div>

                        <h5 class="fw-bold text-center">
                            {{ $certificate->title }}
                        </h5>

                        <p class="text-muted text-center mb-3">
                            {{ $certificate->course->name ?? '-' }}
                        </p>

                        {{-- Certificate Number --}}
                        <div class="bg-light rounded p-3 mb-3">

                            <small class="text-muted d-block">
                                Certificate Number
                            </small>

                            <strong class="text-primary">
                                {{ $certificate->certificate_number }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-3">

                            <div>
                                <small class="text-muted d-block">
                                    Issue Date
                                </small>

                                <strong>
                                    {{ $certificate->issue_date?->format('d M Y') }}
                                </strong>
                            </div>

                            @if($certificate->grade)

                                <div class="text-end">

                                    <small class="text-muted d-block">
                                        Grade
                                    </small>

                                    <strong>
                                        {{ $certificate->grade }}
                                    </strong>

                                </div>

                            @endif

                        </div>

                        <a
                            href="{{ route('student.certificates.show', $certificate->id) }}"
                            class="btn btn-primary w-100"
                        >
                            <i class="bi bi-eye me-1"></i>
                            View Certificate
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-award fs-1 text-muted"></i>

                        <h5 class="fw-bold mt-3">
                            No Certificate Available
                        </h5>

                        <p class="text-muted mb-0">
                            Your certificate will appear here after course completion.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

    <div class="mt-4">
        {{ $certificates->links() }}
    </div>

</div>

@endsection
