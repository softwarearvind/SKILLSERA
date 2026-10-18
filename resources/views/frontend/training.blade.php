
@extends('layouts.frontend')

@section('title', 'Training | ' . ($websiteSetting->site_name ?? 'SKILLS ERA'))

@section('meta_description', 'Explore practical HR training programs, industry-oriented learning, case studies and professional development opportunities.')

@section('content')

{{-- Training Banner --}}
<section class="py-5 text-white"
    style="
        background:
        linear-gradient(100deg, rgba(8,47,107,.96), rgba(13,71,161,.82)),
        url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1800&q=85')
        center/cover no-repeat;
    ">

    <div class="container py-lg-5">
        <div class="row align-items-center">
            <div class="col-lg-9">

                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"
                               class="text-white text-decoration-none">
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white"
                            aria-current="page">
                            Training
                        </li>
                    </ol>
                </nav>

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    Professional Development
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    Practical Training for a Better Career
                </h1>

                <p class="fs-5 text-white-50 mb-4"
                   style="max-width: 750px;">
                    Develop practical knowledge, improve professional skills
                    and understand workplace processes through structured
                    training and industry-oriented learning.
                </p>

                <a href="{{ url('/courses') }}"
                   class="btn btn-warning btn-lg fw-semibold px-4 me-2 mb-2">
                    Explore Courses
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

                <a href="{{ url('/contact') }}"
                   class="btn btn-outline-light btn-lg px-4 mb-2">
                    Contact Us
                </a>

            </div>
        </div>
    </div>
</section>


{{-- Training Benefits --}}
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase">
                Why Choose Our Training
            </span>

            <h2 class="fw-bold mt-2">
                Learn Skills That Matter
            </h2>

            <p class="text-secondary mx-auto"
               style="max-width: 700px;">
                Focus on practical understanding, guided learning and
                professional development for your career journey.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="rounded-3 bg-primary bg-opacity-10
                                    d-inline-flex p-3 mb-3">
                            <i class="bi bi-person-workspace fs-2 text-primary"></i>
                        </div>

                        <h4 class="fw-bold">Practical Learning</h4>

                        <p class="text-secondary mb-0">
                            Understand concepts through practical exercises,
                            assignments and workplace-based examples.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="rounded-3 bg-warning bg-opacity-25
                                    d-inline-flex p-3 mb-3">
                            <i class="bi bi-journal-check fs-2 text-warning"></i>
                        </div>

                        <h4 class="fw-bold">Industry Knowledge</h4>

                        <p class="text-secondary mb-0">
                            Learn about professional processes, case studies
                            and common business situations.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <div class="rounded-3 bg-success bg-opacity-10
                                    d-inline-flex p-3 mb-3">
                            <i class="bi bi-people fs-2 text-success"></i>
                        </div>

                        <h4 class="fw-bold">Guided Development</h4>

                        <p class="text-secondary mb-0">
                            Improve your understanding with structured
                            learning, guidance and constructive feedback.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- Trainer Profile Section --}}
<section class="py-5 bg-light">
    <div class="container">

        {{-- Section Heading --}}
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase">
                Meet Our Experts
            </span>

            <h2 class="fw-bold mt-2">Our Professional Trainers</h2>

            <p class="text-secondary mx-auto" style="max-width: 700px;">
                Learn from experienced trainers who bring practical
                knowledge, industry insights and professional guidance
                to your learning journey.
            </p>
        </div>

        {{-- Trainer Cards --}}
        <div class="row g-4">

            {{-- Trainer 1 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden trainer-card">

                    <div class="trainer-image">
                        <img
                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=700&q=85"
                            alt="Senior HR Trainer"
                            class="w-100"
                        >
                    </div>

                    <div class="card-body p-4">
                        <span class="badge bg-primary-subtle text-primary mb-2">
                            HR Training
                        </span>

                        <h4 class="fw-bold mb-1">Aadarsh Tomar</h4>

                        <p class="text-secondary mb-3">
                            Founder &amp; Lead Trainer
                        </p>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-briefcase-fill text-primary me-2"></i>
                            <span><strong>Experience:</strong> Add actual years</span>
                        </div>

                        <div class="border-top pt-3 mb-3">
                            <h6 class="fw-bold">Specialization</h6>
                            <p class="text-secondary small mb-0">
                                HR Generalist, Payroll, Statutory Compliances
                                and HR Policies.
                            </p>
                        </div>

                        <div class="d-flex align-items-center text-secondary small">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            Ghaziabad, Uttar Pradesh
                        </div>
                    </div>

                </div>
            </div>

            {{-- Trainer 2 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden trainer-card">

                    <div class="trainer-image">
                        <img
                            src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=700&q=85"
                            alt="HR Professional Trainer"
                            class="w-100"
                        >
                    </div>

                    <div class="card-body p-4">
                        <span class="badge bg-success-subtle text-success mb-2">
                            Recruitment
                        </span>

                        <h4 class="fw-bold mb-1">HR Trainer</h4>

                        <p class="text-secondary mb-3">
                            Recruitment &amp; Talent Management
                        </p>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-briefcase-fill text-success me-2"></i>
                            <span><strong>Experience:</strong> Add actual years</span>
                        </div>

                        <div class="border-top pt-3 mb-3">
                            <h6 class="fw-bold">Specialization</h6>
                            <p class="text-secondary small mb-0">
                                Recruitment, Interviewing, Talent Acquisition
                                and Employee Onboarding.
                            </p>
                        </div>

                        <div class="d-flex align-items-center text-secondary small">
                            <i class="bi bi-person-workspace me-2"></i>
                            Practical HR Training
                        </div>
                    </div>

                </div>
            </div>

            {{-- Trainer 3 --}}
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden trainer-card">

                    <div class="trainer-image">
                        <img
                            src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=700&q=85"
                            alt="Corporate Trainer"
                            class="w-100"
                        >
                    </div>

                    <div class="card-body p-4">
                        <span class="badge bg-warning-subtle text-dark mb-2">
                            HR Compliance
                        </span>

                        <h4 class="fw-bold mb-1">HR Compliance Trainer</h4>

                        <p class="text-secondary mb-3">
                            Payroll &amp; Compliance
                        </p>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-briefcase-fill text-warning me-2"></i>
                            <span><strong>Experience:</strong> Add actual years</span>
                        </div>

                        <div class="border-top pt-3 mb-3">
                            <h6 class="fw-bold">Specialization</h6>
                            <p class="text-secondary small mb-0">
                                Payroll Processing, Labour Laws and
                                Statutory Compliance.
                            </p>
                        </div>

                        <div class="d-flex align-items-center text-secondary small">
                            <i class="bi bi-journal-check me-2"></i>
                            Industry Case Studies
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Pagination UI --}}
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Trainer pagination">
                <ul class="pagination">

                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>

                    <li class="page-item active">
                        <span class="page-link">1</span>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#trainers-page-2">2</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#trainers-page-3">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#trainers-page-2"
                           aria-label="Next page">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>

    </div>
</section>

{{-- Trainer Card Styling --}}




{{-- Training Process --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Training Approach</h2>
            <p class="text-secondary">
                A simple, structured approach to professional learning.
            </p>
        </div>

        <div class="row g-4 text-center">

            @php
                $steps = [
                    [
                        'number' => '01',
                        'icon' => 'bi-book',
                        'title' => 'Learn',
                        'description' => 'Understand important concepts and fundamentals.'
                    ],
                    [
                        'number' => '02',
                        'icon' => 'bi-laptop',
                        'title' => 'Practise',
                        'description' => 'Apply your knowledge through guided exercises.'
                    ],
                    [
                        'number' => '03',
                        'icon' => 'bi-clipboard-check',
                        'title' => 'Apply',
                        'description' => 'Work on assignments and relevant case studies.'
                    ],
                    [
                        'number' => '04',
                        'icon' => 'bi-graph-up-arrow',
                        'title' => 'Improve',
                        'description' => 'Review feedback and strengthen your skills.'
                    ],
                ];
            @endphp

            @foreach($steps as $step)
                <div class="col-6 col-lg-3">
                    <div class="border rounded-4 p-4 h-100">
                        <i class="bi {{ $step['icon'] }} display-5 text-primary"></i>

                        <div class="text-warning fw-bold mt-3">
                            STEP {{ $step['number'] }}
                        </div>

                        <h5 class="fw-bold mt-2">
                            {{ $step['title'] }}
                        </h5>

                        <p class="text-secondary small mb-0">
                            {{ $step['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


{{-- Training CTA --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="rounded-4 bg-dark text-white text-center p-4 p-lg-5">

            <h2 class="fw-bold mb-3">
                Ready to Start Your Learning Journey?
            </h2>

            <p class="text-white-50 mx-auto mb-4"
               style="max-width: 650px;">
                Explore our available training programs and find a course
                that aligns with your learning and professional goals.
            </p>

            <a href="{{ url('/courses') }}"
               class="btn btn-warning btn-lg fw-semibold px-4">
                View Training Programs
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </div>
</section>

@endsection