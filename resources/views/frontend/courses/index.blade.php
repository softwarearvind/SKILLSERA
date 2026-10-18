@extends('layouts.frontend')

@section('title', 'Courses | ' . ($websiteSetting->site_name ?? 'Institute'))

@section('content')

{{-- Page Header --}}
<section
    class="py-5 text-white"
    style="
        background:
        linear-gradient(
            100deg,
            rgba(8,47,107,.96),
            rgba(13,71,161,.85)
        ),
        url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1800&q=85')
        center/cover;
    "
>

    <div class="container py-4">

        <span class="badge bg-warning text-dark px-3 py-2 mb-3">
            <i class="bi bi-book me-1"></i>
            Our Courses
        </span>

        <h1 class="display-5 fw-bold">
            Professional Training Courses
        </h1>

        <p class="lead text-white-50 mb-0">
            Choose a course, explore its modules and start
            your learning journey.
        </p>

    </div>

</section>


{{-- Courses --}}
<section class="section-padding bg-light">
<div class="container my-5">
    <div class="row g-4">

        <!-- LEFT SIDE: RELATED COURSES -->
        <div class="col-lg-8">

            <div class="section-header mb-4">
                <h2 class="section-title">RELATED COURSES</h2>
            </div>
       
<div class="row g-3">

    @forelse($courses as $course)

        <div class="col-12 col-md-6 col-lg-4">

            <a href="{{ route('courses.show', $course->id) }}" class="course-card">

               
                <div class="card-icon-box bg-grad-1">

                    <img
                        src="{{ $course->thumbnail
                            ? asset('storage/' . $course->thumbnail)
                            : asset('images/course.jpg') }}"
                        alt="{{ $course->name }}"
                        style="width: 100%; height: 100%; object-fit: cover;"
                    >

                </div>


                <div class="card-content">

                    <div class="course-title">
                        {{ $course->name }}
                    </div>

                 
<div class="border-top pt-3 mb-3">

    <h6 class="fw-bold text-dark mb-2">
        Course Modules
    </h6>

    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill text-success me-2"></i>

        <span class="small">
            {{ $course->modules->count() }} Modules
        </span>
    </div>

</div>


                    <div class="rating-box">
                        <div class="stars-group">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>

                        <span class="rating-text">4.9</span>
                    </div>

                </div>

            </a>

        </div>

    @empty

        <div class="col-12">
            <p class="text-center text-muted">
                No courses available right now.
            </p>
        </div>

    @endforelse

</div>


           
        </div>

        <!-- RIGHT SIDE: ENQUIRY FORM -->
        <div class="col-lg-4">

            <div class="enquiry-card">

                <div class="enquiry-header">
                    <span class="enquiry-icon">
                        <i class="fa-solid fa-headset"></i>
                    </span>
                    <h3>Enquire Now</h3>
                    <p>Get expert guidance for your career.</p>
                </div>
<form action="{{ route('offer.submit') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter your name"
                                   required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter your email"
                                   required>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="tel"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Enter phone number"
                                   maxlength="10"
                                   required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address"
                                      class="form-control"
                                      rows="2"
                                      placeholder="Enter your address"
                                      required></textarea>
                        </div>

                        <!-- Course -->
                        <div class="mb-3">
                            <label>Select Course</label>
                            <select name="course_id" class="form-select" required>
                                <option value="">Select Course</option>

                                @foreach($formdata  as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="offer-submit">
                            Free Demo 
                        </button>

                    </form>
            </div>

        </div>

    </div>
</div>

</section>

<section class="section-padding bg-light py-5">
    <div class="container-fluid px-4 px-lg-5">

        <div class="banner-container w-100">
            <div class="row align-items-center g-4">

                <!-- Left: Heading -->
                <div class="col-12 col-lg-4">
                    <h1 class="banner-heading m-0">
                        HR Generalist<br>
                        Course in India<br>
                        Professional HR<br>
                        Certification
                    </h1>
                </div>

                <!-- Center: Demo Form -->
                <div class="col-12 col-lg-4">
                    <div class="form-card shadow-sm p-4 bg-white rounded-3">

                        <div class="form-title mb-4">
                            Book A Demo Class,
                            <span class="price-original text-decoration-line-through">
                                For ₹2999
                            </span>
                            <span class="price-free text-success fw-bold">
                                Free!
                            </span>
                        </div>

                        <form id="demoForm"
                              onsubmit="event.preventDefault(); handleFormSubmit();">

                            <div class="mb-3">
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       placeholder="Email Address"
                                       required>
                            </div>

                            <div class="row g-2 mb-3">
                                <div class="col-5">
                                    <select class="form-select" id="countryCode">
                                        <option value="+91" selected>India (+91)</option>
                                        <option value="+1">USA (+1)</option>
                                        <option value="+44">UK (+44)</option>
                                        <option value="+971">UAE (+971)</option>
                                        <option value="+65">Singapore (+65)</option>
                                    </select>
                                </div>

                                <div class="col-7">
                                    <input type="tel"
                                           class="form-control"
                                           id="phone"
                                           placeholder="Phone Number"
                                           required
                                           pattern="[0-9]{10}"
                                           maxlength="10">
                                </div>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary w-100 py-2">
                                SUBMIT
                                <i class="fa-solid fa-angles-right ms-2"></i>
                            </button>

                        </form>
                    </div>
                </div>

                <!-- Right: Certificate Image -->
                <div class="col-12 col-lg-4">
                    <div class="certificate-image-card bg-white p-3 rounded-3 shadow-sm">

                        <h5 class="text-center fw-bold mb-3">
                             Certificate
                        </h5>

                        <!-- Apni certificate image ka path yahan dein -->
                        <img
                            src="{{ asset('images/2.jpg') }}"
                            alt="HR Generalist Course Certificate"
                            class="img-fluid w-100 certificate-image"
                            loading="lazy"
                        >

                        <div class="text-center mt-3">
                            <span class="badge bg-success">
                                HR Generalist Certification
                            </span>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Toast Notification -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100;">
        <div id="liveToast"
             class="toast align-items-center text-bg-success border-0"
             role="alert"
             aria-live="assertive"
             aria-atomic="true">

            <div class="d-flex">
                <div class="toast-body" id="toastText">
                    Demo Class booked successfully!
                </div>

                <button type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                </button>
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



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function handleFormSubmit() {
            const email = document.getElementById('email').value;
            const countryCode = document.getElementById('countryCode').value;
            const phone = document.getElementById('phone').value;

            if (email && phone) {
                const toastText = document.getElementById('toastText');
                toastText.innerText = `Thank you! Demo Class booked for ${countryCode} ${phone}`;
                
                const toastElement = document.getElementById('liveToast');
                const toast = new bootstrap.Toast(toastElement);
                toast.show();

                // Reset form
                document.getElementById('demoForm').reset();
            }
        }
    </script>

@endsection

