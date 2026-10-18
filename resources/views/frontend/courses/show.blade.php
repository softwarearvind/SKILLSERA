@extends('layouts.frontend')

@section('title', $course->name . ' | ' . ($websiteSetting->site_name ?? 'Institute'))

@section('content')

{{-- Header --}}
<section
    class="py-5 text-white"
    style="
        background:
        linear-gradient(
            100deg,
            rgba(8,47,107,.96),
            rgba(13,71,161,.85)
        );
    "
>

    <div class="container py-4">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark mb-3">
                    {{ ucfirst($course->mode) }} Training
                </span>

                <h1 class="display-5 fw-bold">
                    {{ $course->name }}
                </h1>

                <p class="lead text-white-50">
                    {{ $course->description }}
                </p>

                <div class="d-flex flex-wrap gap-3">

                    <span>
                        <i class="bi bi-clock me-1"></i>
                        {{ $course->duration ?? 'Flexible Duration' }}
                    </span>

                    <span>
                        <i class="bi bi-layers me-1"></i>
                        {{ $course->modules->count() }} Modules
                    </span>

                    <span>
                        <i class="bi bi-tag me-1"></i>
                        ₹{{ number_format($course->fees, 0) }}
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- Course Content --}}
<section class="section-padding bg-light">

    <div class="container">

        <div class="row g-5">

            {{-- Modules --}}
            <div class="col-lg-8">

                <div class="bg-white rounded-4 shadow-sm p-4">

                    <div class="mb-4">

                        <span class="text-primary fw-semibold">
                            COURSE CURRICULUM
                        </span>

                        <h2 class="fw-bold text-dark mt-2">
                            Course Modules
                        </h2>

                        <p class="text-muted">
                            Complete these modules to successfully
                            complete the course.
                        </p>

                    </div>


                    @forelse($course->modules as $index => $module)

                        <div
                            class="border rounded-3 p-4 mb-3"
                        >

                            <div class="d-flex">

                                {{-- Number --}}
                                <div
                                    class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="
                                        width:45px;
                                        height:45px;
                                    "
                                >
                                    {{ $index + 1 }}
                                </div>


                                {{-- Module Info --}}
                                <div class="ms-3 flex-grow-1">

                                    <div class="d-flex justify-content-between">

                                        <h5 class="fw-bold text-dark mb-1">
                                            {{ $module->title }}
                                        </h5>

                                        @if($module->is_active)

                                            <span class="badge bg-success-subtle text-success">
                                                Active
                                            </span>

                                        @endif

                                    </div>


                                    @if($module->description)

                                        <p class="text-muted small mb-2">
                                            {{ $module->description }}
                                        </p>

                                    @endif


                                    <div class="small text-muted">

                                        <i class="bi bi-file-earmark-text me-1"></i>

                                        {{ $module->studyMaterials->count() }}
                                        Study Materials

                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-5">

                            <i class="bi bi-layers fs-1 text-muted"></i>

                            <h5 class="mt-3">
                                Modules Coming Soon
                            </h5>

                            <p class="text-muted">
                                Course modules will be added soon.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- Right Side --}}
            <div class="col-lg-4">

                <div
                    class="bg-white rounded-4 shadow-sm p-4"
                    style="position:sticky;top:100px;"
                >

                    <h4 class="fw-bold text-dark">
                        {{ $course->name }}
                    </h4>

                    <hr>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Course Fee
                        </span>

                        <strong class="text-primary fs-5">
                            ₹{{ number_format($course->fees, 0) }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Duration
                        </span>

                        <strong>
                            {{ $course->duration ?? 'Flexible' }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Training Mode
                        </span>

                        <strong>
                            {{ ucfirst($course->mode) }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-4">

                        <span class="text-muted">
                            Modules
                        </span>

                        <strong>
                            {{ $course->modules->count() }}
                        </strong>

                    </div>


                    <a
                        href="{{ url('/register') }}"
                        class="btn btn-primary-custom w-100 btn-lg"
                    >
                        Apply For This Course

                        <i class="bi bi-arrow-right ms-1"></i>

                    </a>


                    <a
                        href="{{ url('/contact') }}"
                        class="btn btn-outline-custom w-100 mt-2"
                    >
                        Enquire Now
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="py-5">

    <div class="container">

        <div
            class="rounded-4 p-5 text-white text-center"
            style="
                background:
                linear-gradient(
                    110deg,
                    #082f6b,
                    #0d47a1
                );
            "
        >

            <h2 class="fw-bold">
                Interested In This Course?
            </h2>

            <p class="text-white-50">
                Register now and start your learning journey.
            </p>

            <a
                href="{{ url('/register') }}"
                class="btn btn-warning btn-lg px-4 fw-semibold"
            >
                Register Now
            </a>

        </div>

    </div>

</section>

@endsection
