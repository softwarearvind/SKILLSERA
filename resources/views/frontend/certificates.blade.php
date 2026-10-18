@extends('layouts.frontend')

@section('title', 'Certificates | ' . ($websiteSetting->site_name ?? 'SKILLS ERA'))

@section('meta_description', 'Explore SKILLS ERA training certificates, course completion recognition and professional learning achievements.')

@section('content')

{{-- ================= CERTIFICATE HERO ================= --}}
<section class="certificate-hero text-white">
    <div class="container py-5 position-relative">
        <div class="row align-items-center g-4 py-lg-4">

            <div class="col-lg-7">

                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"
                               class="text-white text-decoration-none">
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white"
                            aria-current="page">
                            Certificates
                        </li>
                    </ol>
                </nav>

                <span class="certificate-hero-badge">
                    <i class="bi bi-patch-check-fill me-2"></i>
                    LEARNING ACHIEVEMENTS
                </span>

                <h1 class="display-4 fw-bold mt-4 mb-3">
                    Certificates That<br>
                    <span class="text-warning">Recognize Your Skills</span>
                </h1>

                <p class="hero-description mb-4">
                    Celebrate your learning journey with course completion
                    certificates from SKILLS ERA. Build your professional
                    portfolio and showcase the knowledge you gain through
                    practical training.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="#certificate-programs"
                       class="btn btn-warning btn-lg fw-bold px-4">
                        Explore Certificates
                        <i class="bi bi-arrow-down-right ms-2"></i>
                    </a>

                    <a href="{{ url('/courses') }}"
                       class="btn btn-outline-light btn-lg px-4">
                        Explore Courses
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>

            </div>

            {{-- Hero Certificate Illustration --}}
            <div class="col-lg-5">
                <div class="hero-certificate-visual">
                    <div class="hero-certificate-paper">
                        <div class="certificate-inner-border">

                            <i class="bi bi-award-fill hero-award-icon"></i>

                            <p class="hero-paper-small">SKILLS ERA</p>

                            <h3>Certificate</h3>

                            <div class="paper-divider"></div>

                            <p class="paper-caption">OF COMPLETION</p>

                            <p class="paper-recipient">
                                Professional Training
                            </p>

                            <p class="paper-course">
                                Human Resources &amp; Practical Skills
                            </p>

                            <div class="paper-bottom">
                                <div>
                                    <div class="signature-line"></div>
                                    <small>Authorized Signatory</small>
                                </div>

                                <i class="bi bi-patch-check-fill paper-seal"></i>
                            </div>

                        </div>
                    </div>

                    <div class="floating-certificate-icon">
                        <i class="bi bi-patch-check-fill"></i>
                        <span>Learning Achievement</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ================= INTRODUCTION ================= --}}
<section class="py-5 certificate-intro">
    <div class="container py-lg-3">

        <div class="row align-items-center g-4">

            <div class="col-lg-6">
                <span class="section-eyebrow">YOUR ACHIEVEMENT MATTERS</span>

                <h2 class="section-heading mt-3">
                    Turn Learning Into a
                    <span>Professional Achievement</span>
                </h2>

                <p class="text-secondary lh-lg mt-3">
                    A certificate can help document the training you have
                    completed and the skills you have studied. At SKILLS ERA,
                    our training programs focus on practical knowledge,
                    workplace understanding and career development.
                </p>

                <div class="intro-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    Recognition of completed training
                </div>

                <div class="intro-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    A useful addition to your professional portfolio
                </div>

                <div class="intro-feature">
                    <i class="bi bi-check-circle-fill"></i>
                    Support for presenting your learning achievements
                </div>
            </div>

            <div class="col-lg-6">
                <div class="certificate-info-box">
                    <div class="info-box-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <h4>Learn. Practice. Achieve.</h4>

                    <p>
                        Complete your selected training program and fulfil
                        its applicable assessment and attendance requirements
                        to become eligible for a course completion certificate.
                    </p>

                    <a href="{{ url('/courses') }}"
                       class="btn btn-primary rounded-pill px-4 mt-2">
                        Find Your Course
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- ================= CERTIFICATE PROGRAMS ================= --}}
<section class="py-5 certificate-programs" id="certificate-programs">
    <div class="container py-lg-3">

        <div class="text-center mb-5">
            <span class="section-eyebrow">OUR CERTIFICATE PROGRAMS</span>

            <h2 class="section-heading mt-3">
                Explore Our <span>Training Certificates</span>
            </h2>

            <p class="text-secondary mx-auto section-description">
                Discover training areas where you can build knowledge
                and work towards your course completion certificate.
            </p>

            <div class="certificate-heading-line mx-auto"></div>
        </div>

        <div class="row g-4">

            {{-- HR Generalist --}}
            <div class="col-md-6 col-lg-4">
                <div class="certificate-program-card h-100">
                    <div class="program-card-top bg-soft-blue">
                        <div class="program-icon text-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="program-tag">HR TRAINING</span>
                    </div>

                    <div class="program-card-body">
                        <h5>HR Generalist Training</h5>

                        <p>
                            Learn HR operations, employee lifecycle,
                            documentation and essential HR processes.
                        </p>

                        <div class="program-card-footer">
                            <span>
                                <i class="bi bi-award me-2"></i>
                                Course Completion
                            </span>

                            <a href="{{ url('/courses') }}"
                               aria-label="Explore HR Generalist Training courses">
                                <i class="bi bi-arrow-up-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payroll --}}
            <div class="col-md-6 col-lg-4">
                <div class="certificate-program-card h-100">
                    <div class="program-card-top bg-soft-green">
                        <div class="program-icon text-success">
                            <i class="bi bi-calculator-fill"></i>
                        </div>
                        <span class="program-tag">PAYROLL</span>
                    </div>

                    <div class="program-card-body">
                        <h5>HR Payroll &amp; Compliance</h5>

                        <p>
                            Develop knowledge of payroll calculations,
                            salary structures and statutory processes.
                        </p>

                        <div class="program-card-footer">
                            <span>
                                <i class="bi bi-award me-2"></i>
                                Course Completion
                            </span>

                            <a href="{{ url('/courses') }}"
                               aria-label="Explore HR Payroll courses">
                                <i class="bi bi-arrow-up-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recruitment --}}
            <div class="col-md-6 col-lg-4">
                <div class="certificate-program-card h-100">
                    <div class="program-card-top bg-soft-orange">
                        <div class="program-icon text-warning">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <span class="program-tag">RECRUITMENT</span>
                    </div>

                    <div class="program-card-body">
                        <h5>Recruitment &amp; Selection</h5>

                        <p>
                            Understand candidate sourcing, screening,
                            interview coordination and hiring workflows.
                        </p>

                        <div class="program-card-footer">
                            <span>
                                <i class="bi bi-award me-2"></i>
                                Course Completion
                            </span>

                            <a href="{{ url('/courses') }}"
                               aria-label="Explore recruitment courses">
                                <i class="bi bi-arrow-up-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- IR --}}
            <div class="col-md-6 col-lg-4">
                <div class="certificate-program-card h-100">
                    <div class="program-card-top bg-soft-purple">
                        <div class="program-icon text-purple">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <span class="program-tag">COMPLIANCE</span>
                    </div>

                    <div class="program-card-body">
                        <h5>Industrial Relations &amp; Legal Compliance</h5>

                        <p>
                            Study industrial relations fundamentals,
                            compliance documentation and HR responsibilities.
                        </p>

                        <div class="program-card-footer">
                            <span>
                                <i class="bi bi-award me-2"></i>
                                Course Completion
                            </span>

                            <a href="{{ url('/courses') }}"
                               aria-label="Explore industrial relations courses">
                                <i class="bi bi-arrow-up-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- HR Analytics --}}
            <div class="col-md-6 col-lg-4">
                <div class="certificate-program-card h-100">
                    <div class="program-card-top bg-soft-cyan">
                        <div class="program-icon text-info">
                            <i class="bi bi-bar-chart-line-fill"></i>
                        </div>
                        <span class="program-tag">ANALYTICS</span>
                    </div>

                    <div class="program-card-body">
                        <h5>HR MIS &amp; Excel Analytics</h5>

                        <p>
                            Practise HR reporting, spreadsheet analysis,
                            dashboards and employee data summaries.
                        </p>

                        <div class="program-card-footer">
                            <span>
                                <i class="bi bi-award me-2"></i>
                                Course Completion
                            </span>

                            <a href="{{ url('/courses') }}"
                               aria-label="Explore HR analytics courses">
                                <i class="bi bi-arrow-up-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- HR Development --}}
            <div class="col-md-6 col-lg-4">
                <div class="certificate-program-card h-100">
                    <div class="program-card-top bg-soft-pink">
                        <div class="program-icon text-danger">
                            <i class="bi bi-person-up"></i>
                        </div>
                        <span class="program-tag">DEVELOPMENT</span>
                    </div>

                    <div class="program-card-body">
                        <h5>HR Training &amp; Development</h5>

                        <p>
                            Explore employee learning, training planning,
                            development activities and evaluation basics.
                        </p>

                        <div class="program-card-footer">
                            <span>
                                <i class="bi bi-award me-2"></i>
                                Course Completion
                            </span>

                            <a href="{{ url('/courses') }}"
                               aria-label="Explore HR development courses">
                                <i class="bi bi-arrow-up-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ================= CERTIFICATE PROCESS ================= --}}
<section class="py-5 certificate-process">
    <div class="container py-lg-3">

        <div class="text-center mb-5">
            <span class="section-eyebrow">YOUR LEARNING JOURNEY</span>
            <h2 class="section-heading mt-3">
                How to Earn Your <span>Certificate</span>
            </h2>
        </div>

        <div class="row g-4">

            <div class="col-6 col-lg-3">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <h6>Choose a Course</h6>
                    <p>Select a suitable training program.</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="process-card">
                    <div class="process-number">02</div>
                    <i class="bi bi-book-half"></i>
                    <h6>Complete Training</h6>
                    <p>Participate in learning and practical activities.</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="process-card">
                    <div class="process-number">03</div>
                    <i class="bi bi-clipboard2-check-fill"></i>
                    <h6>Meet Requirements</h6>
                    <p>Fulfil applicable course completion criteria.</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <i class="bi bi-award-fill"></i>
                    <h6>Receive Certificate</h6>
                    <p>Receive your certificate when eligible.</p>
                </div>
            </div>

        </div>

    </div>
</section>


{{-- ================= BOTTOM CTA ================= --}}
<section class="certificate-cta py-5">
    <div class="container">
        <div class="cta-inner text-center">

            <div class="cta-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <h2>Ready to Begin Your Learning Journey?</h2>

            <p>
                Explore our training programs and work towards
                your next professional learning achievement.
            </p>

            <a href="{{ url('/courses') }}"
               class="btn btn-warning btn-lg fw-bold px-4">
                View All Courses
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </div>
</section>
@endsection