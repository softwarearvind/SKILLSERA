
@extends('layouts.frontend')

@section('title', 'Practical Projects | ' . ($websiteSetting->site_name ?? 'SKILLS ERA'))

@section('meta_description', 'Gain practical industry experience through real-world projects, hands-on training and job-oriented learning.')
<style>
    body {
    max-width: 100%;
    overflow-x: hidden;
}

.practical-projects-page {
    width: 100%;
    max-width: 100%;
    overflow-x: clip;
}

.practical-projects-page .container {
    max-width: 100%;
}

.practical-projects-page img {
    max-width: 100%;
    height: auto;
}
</style>

@section('content')

{{-- Practical Projects Banner --}}
<section
    class="py-5 text-white"
    style="
        background:
        linear-gradient(
            100deg,
            rgba(8,47,107,.96),
            rgba(13,71,161,.82)
        ),
        url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1800&q=85')
        center/cover no-repeat;
    "
>
    <div class="container py-lg-5">
        <div class="row align-items-center">
            
            <div class="col-lg-8">
                
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"
                               class="text-white text-decoration-none">
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white"
                            aria-current="page">
                            Practical Projects
                        </li>
                    </ol>
                </nav>

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    Hands-on Learning
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    Practical Projects
                </h1>

                <p class="fs-5 text-white-50 mb-4"
                   style="max-width: 700px;">
                    Build practical knowledge through real-world projects,
                    industry case studies and hands-on assignments.
                    Develop valuable skills and prepare for professional
                    opportunities.
                </p>

                <a href="{{ url('/courses') }}"
                   class="btn btn-warning btn-lg fw-semibold px-4">
                    Explore Courses
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>
    </div>
</section>


<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <div class="row align-items-center g-4">

            <div class="col-lg-7">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    Learn By Doing
                </span>

                <h1 class="display-5 fw-bold text-dark mb-3">
                    Turn Your Knowledge Into
                    <span class="text-warning">Practical Skills</span>
                </h1>

                <p class="text-secondary fs-5 mb-4">
                    Work on practical assignments, real-world case studies
                    and industry-oriented projects designed to help you
                    build confidence and job-ready skills.
                </p>

                <a href="{{ url('/courses') }}"
                   class="btn btn-dark btn-lg px-4 me-2 mb-2">
                    Explore Courses
                </a>

                <a href="{{ url('/contact') }}"
                   class="btn btn-outline-dark btn-lg px-4 mb-2">
                    Contact Us
                </a>
            </div>

            <div class="col-lg-5">
                <div class="bg-white rounded-4 shadow-sm p-4 p-lg-5 text-center">
                    <i class="bi bi-laptop display-1 text-warning"></i>
                    <h3 class="fw-bold mt-3">Practical Learning</h3>
                    <p class="text-secondary mb-0">
                        Learn concepts, practise your skills and build
                        confidence through guided project work.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="practical-projects py-5">
    <div class="container">

        <!-- Section Heading -->
        <div class="text-center mb-5">
            <span class="project-badge">
                <i class="bi bi-laptop-fill me-2"></i>
                HANDS-ON LEARNING
            </span>

            <h2 class="project-heading mt-3">
                Practical <span>Projects</span>
            </h2>

            <p class="project-subtitle mx-auto">
                Build real-world HR skills through practical projects,
                industry-based assignments and professional reporting tools.
            </p>

            <div class="heading-line mx-auto"></div>
        </div>

        <!-- Project Cards -->
        <div class="row g-4">

            <!-- 1 Payroll -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-blue">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <span class="project-number">PROJECT 01</span>
                    <h5>Payroll Master</h5>
                    <p>
                        Manage salary structures, earnings, deductions,
                        gross salary, net salary and payroll processing.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Practical Payroll Training
                    </div>
                </div>
            </div>

            <!-- 2 Attendance -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-green">
                        <i class="bi bi-calendar2-check-fill"></i>
                    </div>
                    <span class="project-number">PROJECT 02</span>
                    <h5>Attendance MIS</h5>
                    <p>
                        Track attendance, leaves, loss of pay, overtime
                        and monthly attendance summaries.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Attendance Reporting
                    </div>
                </div>
            </div>

            <!-- 3 Recruitment -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-orange">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <span class="project-number">PROJECT 03</span>
                    <h5>Recruitment Tracker</h5>
                    <p>
                        Manage candidate pipelines, interview schedules,
                        follow-ups and hiring conversion reports.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Recruitment Workflow
                    </div>
                </div>
            </div>

            <!-- 4 HR Dashboard -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-purple">
                        <i class="bi bi-bar-chart-line-fill"></i>
                    </div>
                    <span class="project-number">PROJECT 04</span>
                    <h5>HR MIS Dashboard</h5>
                    <p>
                        Analyze employee headcount, new joiners, exits,
                        workforce trends and HR performance indicators.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        HR Data Analytics
                    </div>
                </div>
            </div>

            <!-- 5 Compliance -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-red">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <span class="project-number">PROJECT 05</span>
                    <h5>Compliance Tracker</h5>
                    <p>
                        Organize compliance deadlines, statutory records,
                        reports, reconciliations and supporting documents.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Compliance Management
                    </div>
                </div>
            </div>

            <!-- 6 Excel -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-teal">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    </div>
                    <span class="project-number">PROJECT 06</span>
                    <h5>Excel Analytics</h5>
                    <p>
                        Use lookup formulas, PivotTables, data analysis
                        and interactive dashboards for HR reporting.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Advanced Excel Practice
                    </div>
                </div>
            </div>

            <!-- 7 HR Audit -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-indigo">
                        <i class="bi bi-clipboard2-check-fill"></i>
                    </div>
                    <span class="project-number">PROJECT 07</span>
                    <h5>HR Audit &amp; Quality</h5>
                    <p>
                        Review HR documentation, employee records,
                        process accuracy and audit observations.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Audit Documentation
                    </div>
                </div>
            </div>

            <!-- 8 Career Growth -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="project-card h-100">
                    <div class="project-icon icon-yellow">
                        <i class="bi bi-rocket-takeoff-fill"></i>
                    </div>
                    <span class="project-number">PROJECT 08</span>
                    <h5>Career Development</h5>
                    <p>
                        Practice HR interview scenarios, professional
                        reporting, communication and workplace skills.
                    </p>
                    <div class="project-footer">
                        <i class="bi bi-check-circle-fill"></i>
                        Career Readiness
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-5">
            <p class="cta-text">
                Ready to build your practical HR skills?
            </p>
            <a href="{{ url('/courses') }}" class="btn project-btn">
                Explore HR Courses
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

    </div>
</section>



{{-- Hero Section --}}



{{-- Benefits Section --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <span class="text-warning fw-bold text-uppercase">
                Our Approach
            </span>

            <h2 class="fw-bold mt-2">Learn Through Practical Experience</h2>

            <p class="text-secondary mx-auto" style="max-width: 700px;">
                We focus on applying knowledge to practical situations
                so learners can better understand concepts and workplace tasks.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="h-100 border rounded-4 p-4">
                    <i class="bi bi-journal-check fs-1 text-warning"></i>
                    <h4 class="fw-bold mt-3">Practical Assignments</h4>
                    <p class="text-secondary mb-0">
                        Practise important concepts with structured tasks
                        and exercises related to your training.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="h-100 border rounded-4 p-4">
                    <i class="bi bi-briefcase fs-1 text-warning"></i>
                    <h4 class="fw-bold mt-3">Industry Case Studies</h4>
                    <p class="text-secondary mb-0">
                        Understand common workplace situations and learn
                        how to approach practical business challenges.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="h-100 border rounded-4 p-4">
                    <i class="bi bi-people fs-1 text-warning"></i>
                    <h4 class="fw-bold mt-3">Trainer Guidance</h4>
                    <p class="text-secondary mb-0">
                        Strengthen your understanding through guidance,
                        feedback and step-by-step learning.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- Project Learning Process --}}
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">How Practical Learning Works</h2>
            <p class="text-secondary">
                A structured approach to developing useful professional skills.
            </p>
        </div>

        <div class="row g-4 text-center">

            <div class="col-6 col-lg-3">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="display-6 fw-bold text-warning">01</div>
                    <h5 class="fw-bold mt-3">Learn</h5>
                    <p class="text-secondary small mb-0">
                        Understand the concepts and fundamentals.
                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="display-6 fw-bold text-warning">02</div>
                    <h5 class="fw-bold mt-3">Practise</h5>
                    <p class="text-secondary small mb-0">
                        Apply your knowledge to guided exercises.
                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="display-6 fw-bold text-warning">03</div>
                    <h5 class="fw-bold mt-3">Build</h5>
                    <p class="text-secondary small mb-0">
                        Complete relevant practical tasks and projects.
                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="display-6 fw-bold text-warning">04</div>
                    <h5 class="fw-bold mt-3">Improve</h5>
                    <p class="text-secondary small mb-0">
                        Review feedback and improve your skills.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- CTA Section --}}
<section class="py-5">
    <div class="container">
        <div class="bg-dark text-white rounded-4 p-4 p-lg-5 text-center">

            <h2 class="fw-bold mb-3">
                Ready to Develop Practical Skills?
            </h2>

            <p class="text-light mb-4 mx-auto" style="max-width: 650px;">
                Explore our training programs and discover learning
                opportunities that match your professional goals.
            </p>

            <a href="{{ url('/courses') }}"
               class="btn btn-warning btn-lg px-4 fw-semibold">
                View Our Courses
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </div>
</section>

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
