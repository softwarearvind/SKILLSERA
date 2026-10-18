@extends('layouts.frontend')

@section('title', 'About Us | ' . ($websiteSetting->site_name ?? 'Institute'))

@section('meta_description', 'Learn more about our institute, training programs, trainers and career-focused education.')

@section('content')

{{-- =========================================================
     PAGE BANNER
========================================================= --}}


<section
    class="py-5 text-white"
    style="
        background:
        linear-gradient(
            100deg,
            rgba(8, 47, 107, .95),
            rgba(13, 71, 161, .85)
        ),
        url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1800&q=85')
        center/cover;
    "
>

    <div class="container py-5">

        <div class="row">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    About Our Institute
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Empowering Students With
                    Practical Skills
                </h1>

                <p class="lead mb-0 text-white-50">
                    We provide professional, practical and
                    career-focused training designed to help
                    students build real-world skills.
                </p>

            </div>

        </div>

    </div>

</section>





{{-- =========================================================
     ABOUT CONTENT
========================================================= --}}

<section class="section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="position-relative">

                    <img
                        src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1000&q=85"
                        class="img-fluid rounded-4 shadow"
                        alt="Students learning"
                    >

                    <div
                        class="position-absolute bg-primary text-white rounded-4 shadow p-4"
                        style="
                            bottom: -25px;
                            right: -20px;
                            max-width: 220px;
                        "
                    >

                        <h3 class="fw-bold mb-1">
                            5+
                        </h3>

                        <small>
                            Years of Training Experience
                        </small>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <span class="text-primary fw-semibold">
                    WHO WE ARE
                </span>

                <h2 class="section-title mt-2 mb-4">
                    A Training Institute Focused On Your Career
                </h2>

                @if($page && $page->content)

                    <div class="mb-4">
                        {!! $page->content !!}
                    </div>

                @else

                    <p class="mb-3">
                        {{ $websiteSetting->site_name ?? 'Our Institute' }}
                        is a professional training institute
                        focused on helping students develop
                        practical and industry-relevant skills.
                    </p>

                    <p class="mb-3">
                        Our training programs combine
                        classroom learning, practical
                        assignments, projects, assessments
                        and expert guidance.
                    </p>

                    <p>
                        Whether you are a beginner looking
                        to start your career or a professional
                        looking to upgrade your skills, our
                        courses are designed to provide a
                        structured learning experience.
                    </p>

                @endif


                <div class="row g-3 mt-3">

                    <div class="col-sm-6">

                        <div class="d-flex">

                            <div class="feature-icon me-3 mb-0">
                                <i class="bi bi-check-lg"></i>
                            </div>

                            <div>

                                <h6 class="fw-bold text-dark mb-1">
                                    Practical Training
                                </h6>

                                <small class="text-muted">
                                    Learn through real projects
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="d-flex">

                            <div class="feature-icon me-3 mb-0">
                                <i class="bi bi-person-check"></i>
                            </div>

                            <div>

                                <h6 class="fw-bold text-dark mb-1">
                                    Expert Guidance
                                </h6>

                                <small class="text-muted">
                                    Learn from experienced trainers
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="d-flex">

                            <div class="feature-icon me-3 mb-0">
                                <i class="bi bi-award"></i>
                            </div>

                            <div>

                                <h6 class="fw-bold text-dark mb-1">
                                    Certification
                                </h6>

                                <small class="text-muted">
                                    Certificate after completion
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col-sm-6">

                        <div class="d-flex">

                            <div class="feature-icon me-3 mb-0">
                                <i class="bi bi-headset"></i>
                            </div>

                            <div>

                                <h6 class="fw-bold text-dark mb-1">
                                    Student Support
                                </h6>

                                <small class="text-muted">
                                    Support throughout your journey
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


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


{{-- =========================================================
     MISSION / VISION
========================================================= --}}

<section class="section-padding bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                OUR PURPOSE
            </span>

            <h2 class="section-title mt-2">
                What We Stand For
            </h2>

            <p class="section-subtitle mt-3">
                Our goal is to make professional education
                practical, accessible and career-focused.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h4 class="fw-bold text-dark">
                        Our Mission
                    </h4>

                    <p>
                        To provide high-quality practical
                        training that helps students develop
                        the skills required to succeed in
                        today's competitive job market.
                    </p>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-eye"></i>
                    </div>

                    <h4 class="fw-bold text-dark">
                        Our Vision
                    </h4>

                    <p>
                        To become a trusted learning destination
                        where students can build technical,
                        professional and career-ready skills.
                    </p>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-heart"></i>
                    </div>

                    <h4 class="fw-bold text-dark">
                        Our Values
                    </h4>

                    <p>
                        Quality education, practical learning,
                        student support, transparency and
                        continuous improvement.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     WHY US
========================================================= --}}

<section class="section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <span class="text-primary fw-semibold">
                    WHY STUDENTS CHOOSE US
                </span>

                <h2 class="section-title mt-2">
                    More Than Just Classroom Training
                </h2>

                <p class="mt-3">
                    We focus on creating a complete learning
                    journey from enrollment to course completion.
                </p>

                <a
                    href="{{ url('/courses') }}"
                    class="btn btn-primary-custom mt-3"
                >
                    Explore Our Courses
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

            </div>


            <div class="col-lg-7">

                <div class="row g-4">

                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <i class="bi bi-journal-code fs-1 text-primary"></i>

                            <h5 class="fw-bold text-dark mt-3">
                                Project-Based Learning
                            </h5>

                            <p class="small mb-0">
                                Practice concepts through
                                assignments and real-world projects.
                            </p>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <i class="bi bi-clipboard-check fs-1 text-primary"></i>

                            <h5 class="fw-bold text-dark mt-3">
                                Regular Assessments
                            </h5>

                            <p class="small mb-0">
                                Tests and assignments help students
                                measure their learning progress.
                            </p>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <i class="bi bi-people fs-1 text-primary"></i>

                            <h5 class="fw-bold text-dark mt-3">
                                Personal Guidance
                            </h5>

                            <p class="small mb-0">
                                Trainers provide guidance and support
                                throughout the course.
                            </p>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 h-100">

                            <i class="bi bi-file-earmark-check fs-1 text-primary"></i>

                            <h5 class="fw-bold text-dark mt-3">
                                Completion Certificate
                            </h5>

                            <p class="small mb-0">
                                Students receive a certificate after
                                successfully completing their course.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>




{{-- =========================================================
     CTA
========================================================= --}}

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

@endsection
