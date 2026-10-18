@extends('layouts.frontend')

@section('title', ($websiteSetting->site_name ?? 'Institute') . ' | Professional Training Institute')

@section(
    'meta_description',
    $websiteSetting->meta_description ?? 'Professional training institute offering career-focused courses and practical training.'
)

@section('content')

{{-- =========================================================
     HERO SLIDER
========================================================= --}}



<section class="se-hero">
    <div class="container-fluid px-3 px-lg-4">
        <div class="se-frame">

           <div id="heroSlider"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="5000"
     data-bs-pause="hover">

                @if($heroSlides->isNotEmpty())

                    {{-- Dynamic Indicators --}}
                    <div class="carousel-indicators">
                        @foreach($heroSlides as $index => $slide)
                            <button type="button"
                                data-bs-target="#heroSlider"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}"
                                @if($index === 0) aria-current="true" @endif
                                aria-label="Slide {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>

                    <div class="carousel-inner">

                        @foreach($heroSlides as $index => $slide)

                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="se-frame-inner">

                                    <div class="row align-items-center w-100 g-4">

                                        {{-- Logo --}}
                                        <div class="col-lg-4 text-center">
                                            <img
                                                src="{{ $slide->logo ? asset('storage/'.$slide->logo) : asset('images/logo.png') }}"
                                                alt="{{ $slide->title }}"
                                                class="se-logo">
                                        </div>

                                        {{-- Main Content --}}
                                        <div class="col-lg-8">

                                            @if($index === 0)
                                                <h1 class="se-title">{{ $slide->title }}</h1>
                                            @else
                                                <h2 class="se-title">{{ $slide->title }}</h2>
                                            @endif

                                            @if($slide->subtitle)
                                                <div class="se-sub">
                                                    {{ $slide->subtitle }}
                                                </div>
                                            @endif

                                            <div class="se-line"></div>

                                            @if($slide->description)
                                                <div class="se-topics">
                                                    {{ $slide->description }}
                                                </div>
                                            @endif

                                            {{-- Dynamic Tags --}}
                                            @if($slide->tags)
                                                <div class="se-tags">
                                                    @foreach(explode('|', $slide->tags) as $tagIndex => $tag)
                                                        @if(trim($tag) !== '')
                                                            @if($tagIndex > 0)
                                                                &nbsp;•&nbsp;
                                                            @endif
                                                            {{ trim($tag) }}
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif

                                            {{-- Three Dynamic Cards --}}
                                            <div class="row g-3 mb-4">

                                                @for($i = 1; $i <= 3; $i++)

                                                    @php
                                                        $icon = $slide->{'card'.$i.'_icon'};
                                                        $cardTitle = $slide->{'card'.$i.'_title'};
                                                        $cardText = $slide->{'card'.$i.'_text'};
                                                    @endphp

                                                    @if($cardTitle || $cardText)
                                                        <div class="col-4">
                                                            <div class="se-card text-center d-flex flex-column align-items-center">

                                                                @if($icon)
                                                                    <i class="bi {{ $icon }} fs-3 mb-2 text-warning"></i>
                                                                @endif

                                                                @if($cardTitle)
                                                                    <b>{{ $cardTitle }}</b>
                                                                @endif

                                                                @if($cardText)
                                                                    <span>{{ $cardText }}</span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endif

                                                @endfor

                                            </div>

                                            {{-- Dynamic Buttons --}}
                                            <div class="d-flex flex-wrap gap-3">

                                                @if($slide->button1_text && $slide->button1_url)
                                                    <a href="{{ $slide->button1_url }}"
                                                       class="btn se-btn-gold px-4">
                                                        {{ $slide->button1_text }}
                                                        <i class="bi bi-arrow-right ms-2"></i>
                                                    </a>
                                                @endif

                                                @if($slide->button2_text && $slide->button2_url)
                                                    <a href="{{ $slide->button2_url }}"
                                                       class="btn se-btn-line px-4">
                                                        {{ $slide->button2_text }}
                                                    </a>
                                                @endif

                                            </div>

                                            <div class="se-brand">
                                                {{ $websiteSetting->site_name ?? 'SKILLS ERA' }}
                                                &nbsp;|&nbsp;
                                                Learn Practical. Become Job Ready.
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                    {{-- Previous --}}
                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#heroSlider"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    {{-- Next --}}
                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#heroSlider"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                @else

                    <div class="se-frame-inner text-center">
                        <h1 class="se-title">Welcome to {{ $websiteSetting->site_name ?? 'Skills Era' }}</h1>
                        <p class="se-sub">Our training programs will be available soon.</p>
                        <a href="{{ url('/courses') }}" class="btn se-btn-gold px-4">
                            Explore Courses
                        </a>
                    </div>

                @endif

            </div>

        </div>
    </div>
</section>


{{-- test --}}

<section class="py-5 about-batches-section">
    <div class="container">
        <div class="row g-4 g-xl-5 align-items-start">

            <!-- LEFT: ABOUT SKILLS ERA -->
            <div class="col-lg-6">
                <div class="about-content h-100">

                    <span class="about-label">
                        ABOUT SKILLS ERA
                    </span>

                    <h2 class="about-heading mt-3 mb-3">
                        Empowering Skills.
                        <span>Transforming Careers.</span>
                    </h2>

                    <h5 class="fw-bold mb-3 text-dark">
                        Where Learning Meets Real-World Opportunities
                    </h5>

                    <p class="about-text">
                        Welcome to <strong>Skills Era</strong>, a career-focused
                        training academy dedicated to helping students, freshers,
                        graduates, and working professionals develop industry-relevant
                        skills, gain practical knowledge, and build confidence for
                        today's competitive job market.
                    </p>

                    <p class="about-text">
                        Our mission is to bridge the gap between education and
                        industry expectations through practical, affordable, and
                        career-oriented training.
                    </p>

                    <!-- KEY HIGHLIGHTS -->
                    <h5 class="about-subheading mt-4 mb-3">
                        <i class="bi bi-stars me-2"></i>
                        What Makes Skills Era Different?
                    </h5>

                    <p class="about-text">
                        We believe in learning by doing. Our training includes
                        real-world projects, practical assignments, industry-based
                        case studies, and hands-on learning experiences.
                    </p>

                    <div class="row g-3 mb-4">

                        <div class="col-sm-6">
                            <div class="highlight-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>100% Practical-Focused Learning</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="highlight-item">
                                <i class="bi bi-person-workspace"></i>
                                <span>Industry-Experienced Trainers</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="highlight-item">
                                <i class="bi bi-kanban-fill"></i>
                                <span>Live Projects & Case Studies</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="highlight-item">
                                <i class="bi bi-laptop-fill"></i>
                                <span>Online & Offline Training</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="highlight-item">
                                <i class="bi bi-person-video3"></i>
                                <span>Interview & Resume Preparation</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="highlight-item">
                                <i class="bi bi-graph-up-arrow"></i>
                                <span>Career Guidance & Placement Assistance</span>
                            </div>
                        </div>

                    </div>

                    <!-- TRAINING PROGRAMS -->
                    <h5 class="about-subheading mb-3">
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        Our Training Programs
                    </h5>

                    <p class="about-text mb-2">
                        Explore career-oriented training across multiple domains:
                    </p>

                    <div class="training-tags mb-4">
                        <span>HR Generalist</span>
                        <span>HR Payroll</span>
                        <span>Advanced Excel & MIS</span>
                        <span>Data Analytics</span>
                        <span>AI Tools</span>
                        <span>HRMS & Compliance</span>
                        <span>IT & Professional Skills</span>
                    </div>

                    <!-- VISION & MISSION -->


                    <!-- CTA -->
                    <div class="about-cta">
                        <h5 class="fw-bold mb-2">
                            Your Career. Your Skills. Your Era.
                        </h5>

                        <p class="about-text mb-3">
                            Learn today, lead tomorrow. Join Skills Era and prepare
                            yourself for real-world professional challenges.
                        </p>

                        <button type="button"
                                class="btn btn-success px-4 py-2 fw-bold"
                                data-bs-toggle="modal"
                                data-bs-target="#demoModal">
                            <i class="bi bi-calendar-check me-2"></i>
                            Book Free Demo
                        </button>
                    </div>

                </div>
            </div>


            <!-- RIGHT: UPCOMING HR BATCHES -->
            <div class="col-lg-6">
                <div class="batches-wrapper">

                    <div class="batch-header-box mb-4">
                        <div>
                            <span class="batch-eyebrow">START YOUR JOURNEY</span>
                            <h2 class="mb-0 mt-2">
                                <i class="bi bi-calendar-event me-2"></i>
                                Upcoming HR Batches
                            </h2>
                        </div>
                    </div>

                    <!-- BATCH 1 -->
                    <div class="batch-card mb-4">
                        <div class="d-flex align-items-start gap-3">

                            <div class="batch-icon">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>

                            <div class="flex-grow-1">
                                <span class="batch-category">
                                    HR TRAINING
                                </span>

                                <h3 class="batch-title mt-2">
                                    HR Generalist Training Course
                                </h3>

                                <p class="batch-description">
                                    Build practical HR skills, from recruitment
                                    and onboarding to employee engagement and
                                    HR operations.
                                </p>

                                <div class="batch-info">
                                    <div>
                                        <i class="bi bi-calendar3"></i>
                                        <strong>Batch Start:</strong>
                                        <span class="highlight-date">
                                            Contact for upcoming date
                                        </span>
                                    </div>

                                    <div>
                                        <i class="bi bi-clock"></i>
                                        <strong>Class Timings:</strong>
                                        <span>Confirm the latest schedule</span>
                                    </div>

                                    <div>
                                        <i class="bi bi-laptop"></i>
                                        <strong>Mode:</strong>
                                        <span>Contact us for details</span>
                                    </div>
                                </div>

                                <button type="button"
                                        class="btn btn-success px-4 py-2 fw-bold mt-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#demoModal">
                                    <i class="bi bi-camera-video me-2"></i>
                                    Book Free Demo Class
                                </button>
                            </div>

                        </div>
                    </div>


                    <!-- BATCH 2 -->
                    <div class="batch-card mb-4">
                        <div class="d-flex align-items-start gap-3">

                            <div class="batch-icon payroll-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <div class="flex-grow-1">
                                <span class="batch-category">
                                    PAYROLL TRAINING
                                </span>

                                <h3 class="batch-title mt-2">
                                    HR Payroll & Statutory Compliances
                                </h3>

                                <p class="batch-description">
                                    Learn payroll processing, salary calculations,
                                    statutory compliance, and practical payroll
                                    management.
                                </p>

                                <div class="batch-info">
                                    <div>
                                        <i class="bi bi-calendar3"></i>
                                        <strong>Batch Start:</strong>
                                        <span class="highlight-date">
                                            Contact for upcoming date
                                        </span>
                                    </div>

                                    <div>
                                        <i class="bi bi-clock"></i>
                                        <strong>Class Timings:</strong>
                                        <span>Confirm the latest schedule</span>
                                    </div>

                                    <div>
                                        <i class="bi bi-laptop"></i>
                                        <strong>Mode:</strong>
                                        <span>Contact us for details</span>
                                    </div>
                                </div>

                                <button type="button"
                                        class="btn btn-success px-4 py-2 fw-bold mt-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#demoModal">
                                    <i class="bi bi-camera-video me-2"></i>
                                    Book Free Demo Class
                                </button>
                            </div>

                        </div>
                    </div>


                    <!-- BOTTOM CTA -->
                    <div class="batch-contact-box">
                        <div class="batch-contact-icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>

                        <div>
                            <h5 class="mb-1 fw-bold">
                                Looking for the Right Batch?
                            </h5>
                            <p class="mb-0">
                                Contact our team to learn about upcoming batches
                                and available schedules.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>





{{-- close --}}

{{-- our vision --}}
<section class="py-5 my-lg-4 skills-section">
    <div class="container py-lg-3">
        <div class="row align-items-center gy-5 gx-lg-5">

            <!-- LEFT CONTENT -->
            <div class="col-lg-6">
                <div class="skills-content pe-lg-3">

                    <!-- Section Tag -->
                    <span class="section-tag d-inline-block mb-3">
                        <i class="bi bi-stars me-1"></i>
                        About Skills Era
                    </span>

                    <!-- Vision -->
                    <div class="mb-4">
                        <h2 class="section-heading mb-3">
                            Our <span class="text-amber">Vision</span>
                        </h2>

                        <p class="section-subtitle mb-0">
                            To become a trusted skill-development academy that
                            empowers individuals with practical knowledge,
                            professional confidence, and meaningful career
                            opportunities.
                        </p>
                    </div>

                    <!-- Mission -->
                    <div class="mb-4">
                        <h2 class="section-heading mb-3">
                            Our <span class="text-amber">Mission</span>
                        </h2>

                        <p class="section-subtitle mb-0">
                            To make quality, industry-relevant education
                            accessible and affordable through hands-on training,
                            expert mentorship, and continuous skill development.
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="features-list mt-4">

                        <!-- Feature 1 -->
                        <div class="feature-item mb-4">
                            <div class="icon-badge">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>

                            <div class="feature-content">
                                <h3 class="feature-title">Learn</h3>
                                <p class="feature-desc mb-0">
                                    Understand real-world HR concepts through
                                    practical business examples, workflows,
                                    and process maps.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="feature-item mb-4">
                            <div class="icon-badge">
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            </div>

                            <div class="feature-content">
                                <h3 class="feature-title">Practice</h3>
                                <p class="feature-desc mb-0">
                                    Build payroll sheets, compliance reports,
                                    HR trackers, professional documents,
                                    and interactive dashboards.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="feature-item mb-4">
                            <div class="icon-badge">
                                <i class="bi bi-rocket-takeoff-fill"></i>
                            </div>

                            <div class="feature-content">
                                <h3 class="feature-title">Grow</h3>
                                <p class="feature-desc mb-0">
                                    Prepare an ATS-friendly resume, strengthen
                                    interview skills, and build a practical
                                    portfolio for HR career opportunities.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- Program Promise -->
                    <div class="promise-box mb-4">
                        <div class="promise-icon">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>

                        <div class="promise-content">
                            <h3 class="feature-title text-uppercase mb-2">
                                Our Program Promise
                            </h3>

                            <p class="feature-desc mb-0">
                                We go beyond theory. Our goal is to help learners
                                demonstrate their work, understand business
                                processes, perform accurate calculations, and
                                confidently explain their skills in interviews.
                            </p>
                        </div>
                    </div>

                    <!-- Footer Text -->
                    <div class="footer-text mb-4">
                        <i class="bi bi-lightning-charge-fill me-1"></i>
                        SKILLS ERA <span class="mx-1">&bull;</span>
                        LEARN PRACTICALLY. BECOME JOB-READY.
                    </div>

                    <!-- CTA Button -->
                    <button
                        type="button"
                        class="btn btn-amber"
                        data-bs-toggle="modal"
                        data-bs-target="#demoModal">

                        <i class="bi bi-person-plus-fill me-2"></i>
                        Book a Free Demo Class
                    </button>

                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-lg-6">
                <div class="skills-image-column ps-lg-2">

                    <div class="image-wrapper">
                        <img
                            src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop"
                            alt="Students collaborating and learning practical skills"
                            class="main-course-img"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://placehold.co/800x600/f3f4f6/374151?text=Skills+Era';">

                        <!-- Floating Badge -->
                        <div class="image-floating-badge">
                            <div class="floating-icon">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>

                            <div>
                                <h4 class="mb-1">Learn by Doing</h4>
                                <p class="mb-0">
                                    Practical Skills. Real Growth.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Image Caption -->
                    <div class="image-caption mt-3">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Practical learning designed for career growth
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- Training Section --}}


{{-- owner  --}}

<section class="founder-section py-5">
    <div class="container py-lg-4">

        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="founder-badge">
                <i class="fa-solid fa-award me-2"></i> MEET OUR FOUNDER
            </span>
            <h2 class="founder-main-title mt-3">
                Learn From <span>Industry Experts</span>
            </h2>
            <p class="founder-subtitle mx-auto">
                Practical knowledge, real industry experience and career-focused learning
                to help you become job-ready.
            </p>
        </div>

        <!-- Founder Content -->
        <div class="row align-items-center g-5">

            <!-- Left Content -->
            <div class="col-lg-7">
                <div class="founder-content">

                    <span class="founder-role">
                        FOUNDER & CORPORATE TRAINER
                    </span>

                    <h3 class="founder-name mt-3">
                        Aadarsh Tomar
                    </h3>

                    <p class="founder-designation">
                        HR Professional <span>•</span> Corporate Trainer
                        <span>•</span> Practical Skills Educator
                    </p>

                    <div class="experience-highlight mb-4">
                        <i class="fa-solid fa-briefcase"></i>
                        <div>
                            <strong>8+ Years</strong>
                            <span>Real Industry Experience</span>
                        </div>
                    </div>

                    <p class="founder-description">
                        I am Aadarsh Tomar, Founder of Skills Era, a practical
                        skills training institute focused on building job-ready
                        professionals. With 8+ years of industry experience in
                        Human Resources, I specialize in HR Payroll, HR Operations,
                        Compliance and Advanced Excel.
                    </p>

                    <p class="founder-description">
                        My goal is to make professional learning simple, practical
                        and effective, enabling learners to apply their knowledge
                        in real-world work environments and grow in their careers.
                    </p>

                    <!-- Skills -->
                    <h5 class="skills-heading mt-4 mb-3">
                        <i class="fa-solid fa-layer-group me-2"></i>
                        Areas of Expertise
                    </h5>

                    <div class="founder-skills">
                        <span><i class="fa-solid fa-users"></i> HR Generalist</span>
                        <span><i class="fa-solid fa-money-check-dollar"></i> Payroll Process</span>
                        <span><i class="fa-solid fa-file-excel"></i> Advanced Excel</span>
                        <span><i class="fa-solid fa-desktop"></i> HRMS Software</span>
                        <span><i class="fa-solid fa-calendar-check"></i> Attendance Management</span>
                        <span><i class="fa-solid fa-scale-balanced"></i> PF & ESIC Compliance</span>
                        <span><i class="fa-solid fa-calculator"></i> Bonus & Gratuity</span>
                        <span><i class="fa-solid fa-chart-line"></i> MIS & Dashboard</span>
                    </div>

                    <!-- Mission Quote -->
                    <div class="founder-quote mt-4">
                        <i class="fa-solid fa-quote-left quote-icon"></i>
                        <p>
                            My mission is to bridge the gap between theory and
                            real industry practice and help professionals build
                            a successful career.
                        </p>
                        <span>— Aadarsh Tomar, Founder of Skills Era</span>
                    </div>

                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-5">
                <div class="founder-visual">
                    <div class="founder-image-frame">
                        <img
                            src="{{ asset('images/owner.png') }}"
                            alt="Aadarsh Tomar - Founder and Trainer at Skills Era"
                            class="founder-image"
                            loading="lazy"
                        >

                        <div class="founder-image-overlay"></div>

                        <div class="founder-image-caption">
                            <span class="caption-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <div>
                                <h5>Aadarsh Tomar</h5>
                                <p>Founder & Trainer, Skills Era</p>
                            </div>
                        </div>
                    </div>

                    <div class="floating-experience">
                        <i class="fa-solid fa-star"></i>
                        <div>
                            <strong>Practical Learning</strong>
                            <span>Industry-focused training</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Benefits -->
        <div class="founder-benefits mt-5">
            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h5>Practical Learning</h5>
                        <p>Real-time examples and hands-on projects.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h5>Industry Experience</h5>
                        <p>Learn through real-world work scenarios.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <h5>Career Guidance</h5>
                        <p>Interview preparation and career guidance.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h5>Learning Support</h5>
                        <p>Guidance and support throughout your learning journey.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>




{{-- owner --}}

<section class="py-5">

     <div class="container py-5 my-md-4">

        <!-- Header Section -->
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-10">
                <h1 class="main-heading mb-2">
                    Ready to Start Your <span class="highlight-text">Career Transformation?</span>
                </h1>
                <p class="sub-heading mb-0">
                    Talk to our experts and take the first step towards your dream job
                </p>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="row g-4 justify-content-center">

            <!-- Card 1: Call Us -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card text-center h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-badge badge-blue">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h5 class="card-title-text">Call us</h5>
                        <p class="card-sub-text">Speak to our career counsellor</p>
                        <div class="card-main-action">70-70-90-50-90</div>
                    </div>
                    <div>
                        <a href="tel:7070905090" class="btn btn-custom-orange w-full w-100">Call Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: WhatsApp -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card text-center h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-badge badge-green">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h5 class="card-title-text">WhatsApp</h5>
                        <p class="card-sub-text">Get instant support via chat</p>
                        <div class="card-main-action">Chat Now</div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-custom-green w-full w-100">Start Chat</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Request Callback -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card text-center h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-badge badge-orange">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                        <h5 class="card-title-text">Request Callback</h5>
                        <p class="card-sub-text">We will call you back at your time</p>
                        <div class="card-main-action">Contact Us</div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-custom-orange w-full w-100" data-bs-toggle="modal" data-bs-target="#callbackModal">Request Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Right Floating Sidebar -->
    <div class="floating-sidebar">
        <a href="tel:7070905090" class="floating-btn btn-call-sidebar" title="Call Us">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a href="#" class="floating-btn btn-whatsapp-sidebar" title="WhatsApp Chat">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="#" class="floating-btn btn-email-sidebar" title="Email Us">
            <i class="fa-solid fa-envelope"></i>
        </a>
    </div>

    <!-- Bottom Right Floating Avatar Widget -->
    <div class="floating-avatar-widget" title="Talk to Counsellor">
        <div class="avatar-container">
            <span class="online-status"></span>
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop" alt="Support Agent" class="avatar-img">
        </div>
    </div>

</section>

{{-- related course --}}


{{-- close --}}





{{-- learing --}}

{{-- staps  --}}

<section class="container py-5">

        <!-- Header Section -->
        <div class="text-center mb-5">
            <h2 class="section-title fw-bold mb-2">
                Learning <span class="gradient-text">Experience</span>
            </h2>
            <p class="subtitle text-muted mb-0">A believable process that students can understand before paying</p>
        </div>

        <!-- 6 Steps Timeline Grid -->
        <div class="timeline-container">
            <!-- Connecting Gradient Line behind icons for Desktop -->
            <div class="timeline-line d-none d-lg-block"></div>

            <div class="row g-4 justify-content-center">

                <!-- Step 01 -->
                <div class="col-12 col-md-6 col-lg-2 step-item step-1">
                    <div class="icon-wrapper">
                        <div class="icon-inner">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="step-number">01</div>
                    <h3 class="step-title">FREE DEMO</h3>
                    <p class="step-desc">See the teaching style and sample practical work..</p>
                </div>

                <!-- Step 02 -->
                <div class="col-12 col-md-6 col-lg-2 step-item step-2">
                    <div class="icon-wrapper">
                        <div class="icon-inner">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                    </div>
                    <div class="step-number">02</div>
                    <h3 class="step-title">ENROLMENT</h3>
                    <p class="step-desc">Choose course and batch; receive clear terms and conditions.</p>
                </div>

                <!-- Step 03 -->
                <div class="col-12 col-md-6 col-lg-2 step-item step-3">
                    <div class="icon-wrapper">
                        <div class="icon-inner">
                            <i class="fa-solid fa-code"></i>
                        </div>
                    </div>
                    <div class="step-number">03</div>
                    <h3 class="step-title">LIVE CLASSES</h3>
                    <p class="step-desc">Learn from working professionals with guided practice.</p>
                </div>

                <!-- Step 04 -->
                <div class="col-12 col-md-6 col-lg-2 step-item step-4">
                    <div class="icon-wrapper">
                        <div class="icon-inner">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                    </div>
                    <div class="step-number">04</div>
                    <h3 class="step-title">ASSIGNMENTS</h3>
                    <p class="step-desc">Submit worksheets, reports and case exercises.</p>
                </div>

                <!-- Step 05 -->
                <div class="col-12 col-md-6 col-lg-2 step-item step-5">
                    <div class="icon-wrapper">
                        <div class="icon-inner">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                    </div>
                    <div class="step-number">05</div>
                    <h3 class="step-title">ASSESSMENT</h3>
                    <p class="step-desc">Complete project review and final evaluation.</p>
                </div>

                <!-- Step 06 -->
                <div class="col-12 col-md-6 col-lg-2 step-item step-6">
                    <div class="icon-wrapper">
                        <div class="icon-inner">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                    </div>
                    <div class="step-number">06</div>
                    <h3 class="step-title">CERTIFICATE</h3>
                    <p class="step-desc">Receive Skills Era certificate after requirements are met.</p>
                </div>

            </div>
        </div>

        <!-- CTA Button -->
       <div class="text-center mt-5 pt-3">
    <a href="javascript:void(0)" class="btn-cta" onclick="openOfferPopup()">
        Book Free Demo <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>

    </section>
{{-- staps close --}}


{{-- update --}}

<main class="container py-5">
    <!-- Header Section -->
<div class="text-center mb-5">


    <h2 class="section-title mb-3 mt-3">
        Positioning, Audience &amp;
        <span class="title-highlight">Honest Promises</span>
    </h2>

    <p class="section-subtitle">
        Practical learning, real-world skills and transparent career guidance
        to help you build a brighter future.
    </p>

    <div class="title-divider mx-auto"></div>
</div>


    <!-- Cards Section -->
    <div class="row g-4 justify-content-center">

      <!-- Card 1 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="project-card">
          <div class="icon-box">
            <i class="bi bi-award-fill text-warning"></i>
          </div>
          <h3 class="card-title-custom">Brand Promise</h3>
          <p class="card-text-custom mb-0">
            Learn from experienced working professionals through live instruction, real workplace exercises, guided projects and career preparation.
          </p>
        </div>
      </div>

      <!-- Card 2 (Highlighted) -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="project-card project-card-highlight">
          <span class="highlight-badge">Target Audience</span>
          <div class="icon-box icon-box-orange">
            <i class="bi bi-people-fill"></i>
          </div>
          <h3 class="card-title-custom">Who It Is For</h3>
          <p class="card-text-custom mb-0">
            College students, freshers, job seekers and working professionals seeking stronger practical skills.
          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="project-card">
          <div class="icon-box">
            <i class="bi bi-trophy-fill text-primary"></i>
          </div>
          <h3 class="card-title-custom">Business Goal</h3>
          <p class="card-text-custom mb-0">
            Make course discovery easy; earn trust through real trainer profiles and sample work; drive demo bookings and enquiries.
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="project-card">
          <div class="icon-box">
            <i class="bi bi-gift-fill text-danger"></i>
          </div>
          <h3 class="card-title-custom">Current Offer</h3>
          <p class="card-text-custom mb-0">
            Live online training, practical assignments, trainer-led sessions, project portfolio, interview guidance and placement assistance. Do not claim guaranteed employment.
          </p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="project-card">
          <div class="icon-box">
            <i class="bi bi-rocket-takeoff-fill text-info"></i>
          </div>
          <h3 class="card-title-custom">Future-Ready Positioning</h3>
          <p class="card-text-custom mb-0">
            Display Online: Enrolments Open. Display Offline: Coming Soon until a physical centre is operating. The website must support a later switch to active offline batches.
          </p>
        </div>
      </div>

      <!-- Card 6 (Action / CTA) -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="project-card d-flex flex-column justify-content-between align-items-start">
          <div>
            <div class="icon-box">
              <i class="bi bi-calendar2-check-fill text-success"></i>
            </div>
            <h3 class="card-title-custom">Get Started</h3>
            <p class="card-text-custom mb-4">
              Take the first step toward masterclass learning and practical skill building today.
            </p>
          </div>

           <button type="button" class="btn btn-amber w-100" data-bs-toggle="modal" data-bs-target="#demoModal">
   <i class="bi bi-person-plus-fill me-2"></i>Book Free Demo Class
</button>



        </div>
      </div>

    </div>
  </main>


{{-- =========================================================
     WHY CHOOSE US
========================================================= --}}

{{-- =========================================================
     WHY PRACTICAL HR TRAINING?
========================================================= --}}
<section class="section-padding bg-light">
    <div class="container py-5">
        <div class="row justify-content-center mb-4 mb-md-5">
            <div class="col-12 text-center">
                <h1 class="section-title fs-2 fs-md-1">Why Practical HR Training?</h1>
                <p>Modern HR roles combine people skills, compliance discipline, data handling and technology.</p>
            </div>
        </div>

        <!-- 3 Columns Layout (col-lg-4) -->
        <div class="row g-4">

            <!-- Card 1: Operations -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="program-card card-theme-1">
                    <div>
                        <div class="card-number-label">01 / OPERATIONS</div>
                        <h2 class="card-title-text">Two-way Live Training Course</h2>
                        <p class="card-desc-text">Attendance, leave, payroll and employee lifecycle</p>
                    </div>
                    <div class="illustration-badge">
                        <i class="fa-solid fa-users-gear fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2: Compliance -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="program-card card-theme-2">
                    <div>
                        <div class="card-number-label">02 / COMPLIANCE</div>
                        <h2 class="card-title-text">Statutory & Legal Norms</h2>
                        <p class="card-desc-text">PF, ESI, gratuity, PT, TDS and documentation</p>
                    </div>
                    <div class="illustration-badge">
                        <i class="fa-solid fa-file-contract fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3: Analytics -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="program-card card-theme-3">
                    <div>
                        <div class="card-number-label">03 / ANALYTICS</div>
                        <h2 class="card-title-text">HR Data & Reporting</h2>
                        <p class="card-desc-text">HR MIS, Pivot Tables, lookups and management reports</p>
                    </div>
                    <div class="illustration-badge">
                        <i class="fa-solid fa-chart-line fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Card 4: Talent -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="program-card card-theme-4">
                    <div>
                        <div class="card-number-label">04 / TALENT</div>
                        <h2 class="card-title-text">Acquisition & Hiring</h2>
                        <p class="card-desc-text">Recruitment, sourcing, screening and interviewing</p>
                    </div>
                    <div class="illustration-badge">
                        <i class="fa-solid fa-user-check fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Card 5: Tech -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="program-card card-theme-5">
                    <div>
                        <div class="card-number-label">05 / TECH</div>
                        <h2 class="card-title-text">HR Tools & Platforms</h2>
                        <p class="card-desc-text">HRMS, payroll software and job portals</p>
                    </div>
                    <div class="illustration-badge">
                        <i class="fa-solid fa-laptop-code fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Card 6: Career -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="program-card card-theme-6">
                    <div>
                        <div class="card-number-label">06 / CAREER</div>
                        <h2 class="card-title-text">Grooming & Preparation</h2>
                        <p class="card-desc-text">CV, mock interview, communication and negotiation</p>
                    </div>
                    <div class="illustration-badge">
                        <i class="fa-solid fa-briefcase fa-2x"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Text -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="footer-text text-center">
                    SKILLS ERA &bull; LEARN PRACTICAL. BECOME JOB READY.
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Dashboard --}}

<section class="py-5 bg-light">
  <main class="container">

    <!-- Title Header -->
    <div class="text-center mb-5">
      <h1 class="fw-bold text-uppercase fs-2">
        Build each block in this order to support <span class="text-danger">understanding and enquiry</span>
      </h1>
      <div class="mx-auto bg-danger mt-2" style="width: 50px; height: 3px;"></div>
    </div>

    <!-- 9 Cards Grid (3 Columns x 3 Rows) -->
    <div class="row g-4 justify-content-center">

      <!-- Card 1 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-display"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">01 HERO</h2>
          <p class="text-secondary small mb-0">
            Headline, subheading, Online Enrolments Open badge, two CTAs.
          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-pencil-square"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">02 WHY SKILLS ERA</h2>
          <p class="text-secondary small mb-0">
            Industry mentors, practical assignments, small-group learning where offered.
          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-briefcase-fill"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">03 FEATURED COURSES</h2>
          <p class="text-secondary small mb-0">
            HR Generalist, Payroll, Advanced Excel, HR Analytics; more categories later.
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-gear-wide-connected"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">04 HOW TRAINING WORKS</h2>
          <p class="text-secondary small mb-0">
            Demo → enrolment → live learning → projects → assessment → certificate.
          </p>
        </div>
      </div>

      <!-- Card 5: Highlighted Blue Card -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 bg-primary text-white border-0 shadow-sm rounded-3">
          <div class="text-white fs-1 mb-3">
            <i class="bi bi-clock-history"></i>
          </div>
          <h2 class="h5 fw-bold text-white">05 REAL WORK SAMPLES</h2>
          <p class="text-white-50 small mb-0">
            Payroll workbook, attendance MIS, recruitment tracker, dashboards.
          </p>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-person-badge-fill"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">06 MEET THE TRAINERS</h2>
          <p class="text-secondary small mb-0">
            Verified names, roles, years of experience, session topics and portraits.
          </p>
        </div>
      </div>

      <!-- Card 7 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-award-fill"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">07 CERTIFICATE PREVIEW</h2>
          <p class="text-secondary small mb-0">
            Actual Skills Era certificate image, clear eligibility rules.
          </p>
        </div>
      </div>

      <!-- Card 8 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">08 CAREER SUPPORT</h2>
          <p class="text-secondary small mb-0">
            CV review, interview practice, job-search and placement assistance.
          </p>
        </div>
      </div>

      <!-- Card 9 -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 text-center p-4 border-danger shadow-sm rounded-3">
          <div class="text-danger fs-1 mb-3">
            <i class="bi bi-question-circle-fill"></i>
          </div>
          <h2 class="h5 fw-bold text-dark">09 ENQUIRY + FAQ</h2>
          <p class="text-secondary small mb-0">
            Short form, WhatsApp link, schedule, fees, policies, contact details.
          </p>
        </div>
      </div>

    </div>
  </main>

  <!-- Floating WhatsApp Button -->
  <a href="https://wa.me/" class="btn btn-success rounded-circle position-fixed bottom-0 start-0 m-4 d-flex align-items-center justify-content-center shadow" style="width: 50px; height: 50px; z-index: 1000;" target="_blank" aria-label="Contact on WhatsApp">
    <i class="bi bi-whatsapp fs-3"></i>
  </a>

  <!-- Floating Scroll Top Button -->
  <a href="#" class="btn btn-secondary rounded-circle position-fixed bottom-0 end-0 m-4 d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; z-index: 1000;" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" aria-label="Scroll to top">
    <i class="bi bi-chevron-up fs-5"></i>
  </a>
</section>

{{-- course name --}}

<section class="py-5 bg-light overflow-hidden">
    <main class="container py-4">

        <!-- Title Header -->
        <div class="title-wrapper">
            <h2 class="section-title">
                OUR <span class="highlight-red">COURSES</span>
            </h2>
            <div class="title-underline"></div>
        </div>

        @if($courses->isNotEmpty())

            <div id="coursesCarousel"
                 class="carousel slide"
                 data-bs-ride="carousel"
                 data-bs-interval="3500"
                 data-bs-pause="hover">

                <div class="carousel-inner">

                    @foreach($courseSlides as $slideIndex => $slide)

                        <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">
                            <div class="row g-4 justify-content-center">

                                @foreach($slide as $course)

                                    @php
                                        $colors = [
                                            'red',
                                            'green',
                                            'yellow',
                                            'blue',
                                            'cyan',
                                            'purple'
                                        ];

                                        $color = $course->color
                                            ?? $colors[($slideIndex * 3 + $loop->index) % count($colors)];

                                        $icon = $course->icon
                                            ?? 'bi-mortarboard-fill';
                                    @endphp

                                    <div class="col-12 col-md-6 col-lg-4">

                                        <div class="card-wrapper">
                                            <div class="course-card border-card-{{ $color }}">

                                                <!-- Dynamic Course Image -->
                                                <div class="avatar-circle bg-avatar-{{ $color }}">

                                                    @if(!empty($course->thumbnail))
                                                        <img
                                                            src="{{ asset('storage/' . $course->thumbnail) }}"
                                                            alt="{{ $course->name }}"
                                                            class="course-image"
                                                            loading="lazy"
                                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                        >

                                                        <i class="bi {{ $icon }} course-fallback-icon"
                                                           style="display:none;"></i>
                                                    @else
                                                        <i class="bi {{ $icon }}"></i>
                                                    @endif

                                                </div>

                                                <!-- Course Details -->
                                                <div>
                                                    <h3 class="course-title">
                                                        {{ $course->name }}
                                                    </h3>

                                                    <div class="title-accent-line"></div>

                                                    <p class="course-description">
                                                        {{ $course->description }}
                                                    </p>
                                                </div>

                                                <!-- Read More -->
                                                <a href="{{ url('/courses') }}"
                                                   class="btn-read-more">
                                                    Read More
                                                </a>

                                            </div>
                                        </div>

                                    </div>

                                @endforeach

                            </div>
                        </div>

                    @endforeach

                </div>

                <!-- Navigation Arrows -->
                @if($courseSlides->count() > 1)

                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#coursesCarousel"
                            data-bs-slide="prev"
                            aria-label="Previous courses">

                        <span class="carousel-control-prev-icon"
                              aria-hidden="true"></span>
                    </button>

                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#coursesCarousel"
                            data-bs-slide="next"
                            aria-label="Next courses">

                        <span class="carousel-control-next-icon"
                              aria-hidden="true"></span>
                    </button>

                @endif

            </div>

        @else

            <div class="text-center py-5">
                <h4>No courses available right now.</h4>
                <p>Please check back soon for upcoming courses.</p>
            </div>

        @endif

    </main>
</section>
{{-- course close --}}

{{-- owner --}}


{{-- owner --}}


{{-- palcement student --}}

<section class="py-5 bg-light overflow-hidden">
    <div class="container-fluid px-md-5">

        <div class="section-title-wrapper text-center mb-4">
            <h2 class="section-title">
                Our Student Recent Placements
                <div class="title-underline"></div>
            </h2>
        </div>

        @php
            $featuredPlacement = $placements->firstWhere('is_featured', true);
            $normalPlacements = $placements->reject(
                fn ($item) => $item->is_featured
            );
        @endphp

        @if($placements->isNotEmpty())

            <div class="row g-3 justify-content-center">

                {{-- Featured wide card --}}
                @if($featuredPlacement)
                    <div class="col-12 col-lg-4">
                        <div class="featured-card h-100">
                            <div class="featured-ribbon">
                                Congratulations!
                            </div>

                            <div class="featured-content">
                                <div class="featured-header">
                                    <div class="croma-tag fw-bold fs-6">
                                        SKILLS <span class="text-warning">ERA</span>
                                    </div>
                                    <div class="asia-leading fw-bold">
                                        Student Achievement
                                    </div>
                                </div>

                                <div class="row g-2 align-items-center">
                                    <div class="col-7">
                                        <div class="featured-title-name">
                                            <span class="font-script fs-3">
                                                Got Placed
                                            </span>

                                            <div class="student-full-name">
                                                {{ $featuredPlacement->student_name }}
                                            </div>
                                        </div>

                                        <div class="placed-at-label">
                                            PLACED AT:
                                        </div>

                                        <div class="company-brand-box">
                                            <i class="fa-solid fa-briefcase text-primary fs-4"></i>

                                            <span class="fw-bold text-primary">
                                                {{ $featuredPlacement->company_name }}
                                            </span>
                                        </div>

                                        <div class="featured-role-badge">
                                            <small class="d-block text-muted">
                                                Job Role:
                                            </small>

                                            {{ $featuredPlacement->job_role }}
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="photo-frame-featured">
                                            <img
                                                src="{{ $featuredPlacement->student_photo
                                                    ? asset('storage/'.$featuredPlacement->student_photo)
                                                    : asset('images/default-student.png') }}"
                                                alt="{{ $featuredPlacement->student_name }}"
                                                loading="lazy">

                                            @if($featuredPlacement->college_name)
                                                <div class="university-overlay-badge">
                                                    <span class="fw-bold text-dark">
                                                        {{ $featuredPlacement->college_name }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="announcement-text">
                                    @if($featuredPlacement->announcement)
                                        {{ $featuredPlacement->announcement }}
                                    @else
                                        Congratulations to
                                        {{ $featuredPlacement->student_name }}
                                        on the new role of
                                        {{ $featuredPlacement->job_role }}
                                        at {{ $featuredPlacement->company_name }}.
                                    @endif
                                </div>

                                <div class="future-wish">
                                    We wish you success in your future! 🎓🎉
                                </div>

                                <div class="footer-website-link">
                                    <i class="fa-solid fa-globe me-1"></i>
                                    SKILLS ERA
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Normal placement cards --}}
                @foreach($normalPlacements as $placement)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="placement-card h-100">

                            <div>
                                <div class="card-header-banner">
                                    GOT PLACED
                                </div>

                                <div class="card-body-content">
                                    <span class="font-script">
                                        Congratulations
                                    </span>

                                    <div class="avatar-frame">
                                        <img
                                            src="{{ $placement->student_photo
                                                ? asset('storage/'.$placement->student_photo)
                                                : asset('images/default-student.png') }}"
                                            alt="{{ $placement->student_name }}"
                                            loading="lazy">
                                    </div>

                                    <div class="student-name">
                                        {{ $placement->student_name }}
                                    </div>

                                    <div class="transition-badge">
                                        <span class="croma-tag">
                                            SKILLS<br>
                                            <small>ERA</small>
                                        </span>

                                        <span class="arrow">&gt;&gt;</span>

                                        <span class="fw-bold text-dark">
                                            <i class="fa-solid fa-briefcase me-1"></i>
                                            {{ $placement->company_name }}
                                        </span>
                                    </div>

                                    <div class="role-pill">
                                        Job Role:<br>
                                        <strong>{{ $placement->job_role }}</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2 border-top bg-white">
                                <div class="college-logo-container">
                                    <div class="text-center">
                                        <span class="fw-bold text-dark d-block">
                                            {{ $placement->college_name ?: 'SKILLS ERA' }}
                                        </span>

                                        <small class="text-muted">
                                            {{ $placement->course_name ?: 'Student Achievement' }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        @else
            <div class="text-center py-5">
                <i class="fa-solid fa-graduation-cap fs-1 text-secondary"></i>
                <h4 class="mt-3">Student Success Stories</h4>
                <p class="text-muted">
                    Our student placement updates will appear here.
                </p>
            </div>
        @endif

    </div>
</section>



{{-- placement close --}}

{{--  Syllabus --}}

<section class="py-5 bg-light overflow-hidden">
  <div class="container py-5">

    <!-- Top Main Card Section -->
    <div class="row justify-content-center mb-5">
      <div class="col-12 col-lg-10">
        <div class="syllabus-card text-center p-4 p-md-5 rounded-4 shadow-sm bg-white border">
          <h2 class="syllabus-title fw-bold text-dark mb-3">HR GENERALIST PRACTICAL TRAINING</h2>
          <p class="syllabus-subtitle text-muted mb-4 fs-5">
            Build practical capability in attendance, <br class="d-none d-md-block">
            salary processing, statutory compliance, HR documentation, recruitment and HR MIS.
          </p>

          <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 mt-2">
            <!-- Badge 1: Live Online -->
            <span class="custom-badge badge-primary">
              <i class="bi bi-camera-video-fill me-2"></i>Live Online
            </span>

            <!-- Badge 2: Project-based -->
            <span class="custom-badge badge-secondary">
              <i class="bi bi-kanban-fill me-2"></i>Project-based
            </span>

            <!-- Badge 3: Certificate -->
            <span class="custom-badge badge-success">
              <i class="bi bi-award-fill me-2"></i>Certificate on Completion
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Section Divided into 3 Columns -->
    <div class="row g-4 justify-content-center">

      <!-- Div 1: YOU WILL LEARN -->
      <div class="col-12 col-md-4">
        <div class="feature-card h-100 p-4 rounded-4 bg-white border shadow-sm">
          <div class="feature-icon-box icon-orange mb-3">
            <i class="bi bi-book-half"></i>
          </div>
          <h3 class="feature-title h5 fw-bold mb-2">YOU WILL LEARN</h3>
          <p class="feature-desc text-muted mb-0">
            Attendance and leave; payroll/CTC; PF/ESIC; HRMS workflows; recruitment; Excel dashboards.
          </p>
        </div>
      </div>

      <!-- Div 2: YOU WILL CREATE -->
      <div class="col-12 col-md-4">
        <div class="feature-card h-100 p-4 rounded-4 bg-white border shadow-sm">
          <div class="feature-icon-box icon-blue mb-3">
            <i class="bi bi-tools"></i>
          </div>
          <h3 class="feature-title h5 fw-bold mb-2">YOU WILL CREATE</h3>
          <p class="feature-desc text-muted mb-0">
            Salary workbook; attendance MIS; recruitment tracker; PF/ESI practice sheets; HR documents.
          </p>
        </div>
      </div>

      <!-- Div 3: YOU WILL GET -->
      <div class="col-12 col-md-4">
        <div class="feature-card h-100 p-4 rounded-4 bg-white border shadow-sm">
          <div class="feature-icon-box icon-green mb-3">
            <i class="bi bi-gift-fill"></i>
          </div>
          <h3 class="feature-title h5 fw-bold mb-2">YOU WILL GET</h3>
          <p class="feature-desc text-muted mb-0">
            Trainer-led practice, assignments, feedback, assessment, completion certificate and career support.
          </p>
        </div>
      </div>

    </div>

  </div>
</section>
{{--  Syllabus close --}}



{{-- chart --}}
<section class="py-5">
    <div class="container">

      <!-- Heading -->
      <div class="text-center">
        <h5 class="section-title fs-1">Practical projects</h5>
        <p>
          Use actual, permission-cleared examples as the academy grows
        </p>
      </div>

      <!-- Cards Grid -->
      <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="card offer-card text-center">
            <!-- Chart Graphic -->
            <div class="chart-box">
              <div class="chart-bar bar-1"></div>
              <div class="chart-bar bar-2"></div>
              <div class="chart-bar bar-3"></div>
              <div class="chart-bar bar-4"></div>
            </div>
            <div class="card-body p-0">
              <h3 class="card-title">PAYROLL MASTER</h3>
              <p class="card-text">
                Earnings, deductions, gross/net salary and controls.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="card offer-card text-center">
            <!-- Chart Graphic -->
            <div class="chart-box">
              <div class="chart-bar bar-1"></div>
              <div class="chart-bar bar-2"></div>
              <div class="chart-bar bar-3"></div>
              <div class="chart-bar bar-4"></div>
            </div>
            <div class="card-body p-0">
              <h3 class="card-title">ATTENDANCE MIS</h3>
              <p class="card-text">
               Present, leave, LOP, overtime and monthly summaries.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="card offer-card text-center">
            <!-- Chart Graphic -->
            <div class="chart-box">
              <div class="chart-bar bar-1"></div>
              <div class="chart-bar bar-2"></div>
              <div class="chart-bar bar-3"></div>
              <div class="chart-bar bar-4"></div>
            </div>
            <div class="card-body p-0">
              <h3 class="card-title">RECRUITMENT TRACKER</h3>
              <p class="card-text">
                Pipeline, follow-ups, interview conversion.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-4 col-md-6">
          <div class="card offer-card text-center">
            <!-- Chart Graphic -->
            <div class="chart-box">
              <div class="chart-bar bar-1"></div>
              <div class="chart-bar bar-2"></div>
              <div class="chart-bar bar-3"></div>
              <div class="chart-bar bar-4"></div>
            </div>
            <div class="card-body p-0">
              <h3 class="card-title">HR MIS DASHBOARD</h3>
              <p class="card-text">
               Headcount, joining, exits, trends and charts.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="col-lg-4 col-md-6">
          <div class="card offer-card text-center">
            <!-- Chart Graphic -->
            <div class="chart-box">
              <div class="chart-bar bar-1"></div>
              <div class="chart-bar bar-2"></div>
              <div class="chart-bar bar-3"></div>
              <div class="chart-bar bar-4"></div>
            </div>
            <div class="card-body p-0">
              <h3 class="card-title">COMPLIANCE TRACKER</h3>
              <p class="card-text">
               Due dates, reports, reconciliation and evidence.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="col-lg-4 col-md-6">
          <div class="card offer-card text-center">
            <!-- Chart Graphic -->
            <div class="chart-box">
              <div class="chart-bar bar-1"></div>
              <div class="chart-bar bar-2"></div>
              <div class="chart-bar bar-3"></div>
              <div class="chart-bar bar-4"></div>
            </div>
            <div class="card-body p-0">
              <h3 class="card-title">EXCEL ANALYTICS</h3>
              <p class="card-text">
               Lookup formulas, Pivot Tables and dashboard reporting.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
{{-- chart --}}

{{-- traneer --}}

@if($trainers->isNotEmpty())
<section class="py-5 bg-light">
    <div class="container py-4">

        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                Expert Instructors
            </span>

            <h2 class="fw-bold text-dark display-6">
                Meet Our Professional Trainers
            </h2>

            <p class="text-muted mx-auto" style="max-width:600px">
                Learn from experienced professionals with practical industry
                knowledge in HR, Payroll, Compliance and Data Analytics.
            </p>
        </div>

        <div id="trainerSlider"
             class="carousel slide"
             data-bs-ride="carousel"
             data-bs-interval="5000">

            @php
                $trainerSlides = $trainers->chunk(4);
            @endphp

            @if($trainerSlides->count() > 1)
                <div class="carousel-indicators position-relative mt-4">
                    @foreach($trainerSlides as $index => $slide)
                        <button type="button"
                                data-bs-target="#trainerSlider"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active bg-dark' : 'bg-secondary' }}"
                                aria-label="Slide {{ $index + 1 }}"
                                @if($index === 0) aria-current="true" @endif>
                        </button>
                    @endforeach
                </div>
            @endif

            <div class="carousel-inner">
                @foreach($trainerSlides as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">

                            @foreach($slide as $trainer)
                                <div class="col-lg-3 col-md-6">
                                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden trainer-card">

                                        <div class="position-relative">
                                            @if($trainer->photo)
                                                <img
                                                    src="{{ asset('storage/'.$trainer->photo) }}"
                                                    class="card-img-top trainer-img"
                                                    alt="{{ $trainer->name }}"
                                                    loading="lazy"
                                                    style="height:250px;object-fit:cover;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center bg-secondary-subtle"
                                                     style="height:250px">
                                                    <i class="bi bi-person-circle text-secondary"
                                                       style="font-size:5rem"></i>
                                                </div>
                                            @endif

                                            @if($trainer->experience)
                                                <span class="badge bg-dark position-absolute bottom-0 start-0 m-3 px-3 py-2 rounded-3">
                                                    <i class="bi bi-award text-warning me-1"></i>
                                                    {{ $trainer->experience }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="card-body p-4 text-center">
                                            <h5 class="fw-bold text-dark mb-1">
                                                {{ $trainer->name }}
                                            </h5>

                                            {{-- <p class="text-warning fw-semibold small mb-2">
                                                {{ $trainer->designation }}
                                            </p> --}}

                                           <p class="text-muted small mb-3">
                                            {{ \Illuminate\Support\Str::limit($trainer->description, 200) }}
                                              </p>

                                            {{-- @if(!empty($trainer->skills))
                                                <div class="d-flex flex-wrap justify-content-center gap-1 mb-3">
                                                    @foreach($trainer->skills as $skill)
                                                        <span class="badge bg-light text-secondary border">
                                                            {{ $skill }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif --}}

                                            <div class="d-flex justify-content-center gap-2">
                                                @if($trainer->linkedin_url)
                                                    <a href="{{ $trainer->linkedin_url }}"
                                                       target="_blank"
                                                       rel="noopener noreferrer"
                                                       class="btn btn-outline-secondary btn-sm rounded-circle social-icon"
                                                       aria-label="LinkedIn profile">
                                                        <i class="bi bi-linkedin"></i>
                                                    </a>
                                                @endif

                                                @if($trainer->email)
                                                    <a href="mailto:{{ $trainer->email }}"
                                                       class="btn btn-outline-secondary btn-sm rounded-circle social-icon"
                                                       aria-label="Email trainer">
                                                        <i class="bi bi-envelope"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>

            @if($trainerSlides->count() > 1)
                <button class="carousel-control-prev" type="button"
                        data-bs-target="#trainerSlider" data-bs-slide="prev"
                        aria-label="Previous trainers">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"
                          aria-hidden="true"></span>
                </button>

                <button class="carousel-control-next" type="button"
                        data-bs-target="#trainerSlider" data-bs-slide="next"
                        aria-label="Next trainers">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3"
                          aria-hidden="true"></span>
                </button>
            @endif

        </div>
    </div>
</section>
@endif

{{-- close tranner --}}

{{-- catificate --}}
<section class="py-5 bg-light">
    <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Expert Instructors</span>
            <h2 class="fw-bold text-dark display-6">Certificate</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                Use the supplied certificate artwork as a visual preview

            </p>
        </div>
    <div class="container-fluid px-3 px-lg-5">
        <div class="row g-4">

            <!-- LEFT COLUMN: Certificate Preview (8 Columns on desktop) -->
            <div class="col-lg-8">
                <div class="cert-card-container position-relative">

                    <!-- Certificate Base Image -->
                    <!-- Note: replace 'certificate-bg.jpg' with your uploaded image path -->
                    <img src="{{ asset('images/2.jpg') }}" alt="Skills Era Certificate" class="cert-bg-image img-fluid w-100">

                    <!-- Overlay Layer for Live Form Inputs (Optional Absolute Overlay structure) -->
                </div>
            </div>

            <!-- RIGHT COLUMN: Side Policy Cards (4 Columns on desktop) -->
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4">

                    <!-- Policy Card 1: CERTIFICATE POLICY -->
                    <div class="card policy-card card-amber">
                        <div class="card-body p-4">
                            <h5 class="card-title text-uppercase fw-bold text-dark mb-3">
                                CERTIFICATE POLICY
                            </h5>
                            <p class="card-text text-secondary">
                                Use the real Skills Era certificate preview. Leave student name, course, start/end training dates, grade, certificate ID and issue date blank in the template.
                            </p>
                            <div class="mt-3 pt-3 border-top d-flex align-items-center gap-2 text-muted small">
                                <i class="fa-solid fa-circle-info text-warning fs-5"></i>
                                <span>Official template guidelines for Skills Era candidates.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Policy Card 2: NO FALSE CLAIMS -->
                    <div class="card policy-card card-teal">
                        <div class="card-body p-4">
                            <h5 class="card-title text-uppercase fw-bold text-dark mb-3">
                                NO FALSE CLAIMS
                            </h5>
                            <p class="card-text text-secondary">
                                No ISO, MSME or government accreditation claims without evidence. No live verification QR until a working verification page exists.
                            </p>
                            <div class="mt-3 pt-3 border-top d-flex align-items-center gap-2 text-muted small">
                                <i class="fa-solid fa-shield-halved text-teal fs-5" style="color: #20c997;"></i>
                                <span>Ensures compliance with legal accreditation norms.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Helper Info Box -->
                    <div class="card border-0 bg-white p-3 rounded-3 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 bg-light rounded-circle text-primary fs-4">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-bold">Live Editing Enabled</h6>
                                <p class="mb-0 text-muted small">Click any input field on the certificate template to customize details directly!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- close catificate --}}

{{-- form enqury --}}






{{-- close --}}

{{-- carrer --}}
<section class="py-5 bg-light">
  <div class="container">
    <!-- Modern Career Note & Enrollment Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
      <div class="card-body p-4 p-md-5">
        <div class="row g-4 align-items-center">

          <!-- Column 1: Career Note -->
          <div class="col-lg-5 col-md-12 border-end-lg">
            <div class="d-flex align-items-start gap-3">
              <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-briefcase-fill fs-5"></i>
              </div>
              <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                  <span class="badge bg-primary-subtle text-primary fw-semibold px-2 py-1 rounded-pill text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                    Important Notice
                  </span>
                  <h6 class="fw-bold text-dark mb-0">CAREER NOTE</h6>
                </div>
                <p class="text-muted small mb-0 lh-sm">
                  <span class="fw-medium text-dark">Placement assistance</span> supports your job search; employment is not guaranteed.
                </p>
              </div>
            </div>
          </div>

          <!-- Column 2: Batch Status -->
          <div class="col-lg-4 col-md-7">
            <div class="d-flex align-items-center gap-3">
              <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-calendar-check-fill fs-5"></i>
              </div>
              <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                  <span class="badge bg-success text-white fw-semibold px-2 py-1 rounded-pill" style="font-size: 0.7rem;">
                    ● Live Admissions
                  </span>
                </div>
                <p class="fw-bold text-dark mb-0 fs-6 lh-sm">
                  Online Enrolments Open
                  <span class="text-muted fw-normal d-block fs-7 mt-1">
                    <i class="bi bi-clock-history me-1"></i>Offline Batches Coming Soon
                  </span>
                </p>
              </div>
            </div>
          </div>

          <!-- Column 3: Action Button -->
          <div class="col-lg-3 col-md-5 text-lg-end text-start">
             <button type="button" class="btn btn-primary btn-lg rounded-pill px-4 py-2.5 fw-semibold shadow-sm w-100 w-lg-auto d-inline-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#demoModal">
              <span>Free Demo</span>
              <i class="bi bi-arrow-right-short fs-4"></i>
              </button>
          </div>

        </div>
      </div>
      <!-- Bottom Accent Line -->
      <div class="bg-primary" style="height: 4px;"></div>
    </div>
  </div>
</section>

{{-- close --}}














<!-- ================= GET OFFER POPUP ================= -->
@include('layouts.model')


<!-- ================= CSS ================= -->


<!-- ================= JAVASCRIPT ================= -->
<script>

document.addEventListener("DOMContentLoaded", function () {

    // Open popup after 1 minute
   setTimeout(function () {

    document.getElementById("offerPopup").style.display = "flex";
    document.body.style.overflow = "hidden";

}, 1000);

});

function closeOfferPopup() {

    document.getElementById("offerPopup").style.display = "none";

    document.body.style.overflow = "auto";

}

</script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function handleFormSubmit(event) {
            event.preventDefault();

            // Get Form Data
            const name = document.getElementById('fullName').value;
            const programSelect = document.getElementById('program');
            const programText = programSelect.options[programSelect.selectedIndex].text;

            // Trigger Bootstrap Toast Notification
            const toastEl = document.getElementById('statusToast');
            const toastMessage = document.getElementById('toastMessage');
            toastMessage.innerHTML = `<i class="fa-solid fa-circle-check me-2"></i> Thank you <strong>${name}</strong>! Your application for <em>${programText}</em> has been submitted.`;

            const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
            toast.show();

            // Reset Form
            document.getElementById('placementForm').reset();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    var heroSliderElement = document.getElementById('heroSlider');
    if (heroSliderElement) {
        var carousel = new bootstrap.Carousel(heroSliderElement, {
            interval: 5000,
            touch: true,
            pause: 'hover',
            ride: 'carousel'
        });
        carousel.cycle(); // Isse auto-play force start ho jata hai
    }
});
    </script>






@endsection
