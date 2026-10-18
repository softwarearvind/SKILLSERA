@extends('layouts.frontend')

@section('title', 'Contact Us | ' . ($websiteSetting->site_name ?? 'SKILLS ERA'))

@section('meta_description', 'Contact SKILLS ERA for HR practical training, course enquiries, admissions and career guidance.')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="contact-hero">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">

                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white"
                            aria-current="page">
                            Contact Us
                        </li>
                    </ol>
                </nav>

                <span class="contact-badge">
                    <i class="bi bi-chat-dots-fill me-2"></i>
                    WE ARE HERE TO HELP
                </span>

                <h1 class="contact-hero-title mt-4">
                    Let's Start a
                    <span>Conversation</span>
                </h1>

                <p class="contact-hero-description mt-3">
                    Have questions about our HR training programs,
                    admissions or practical learning? Contact our team
                    and tell us how we can help you.
                </p>

                <div class="hero-contact-points mt-4">
                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Course Enquiries
                    </span>
                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Admission Assistance
                    </span>
                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Career Guidance
                    </span>
                </div>

            </div>
        </div>
    </div>
</section>





{{-- ================= CONTACT CONTENT ================= --}}
<section class="contact-main-section py-5">
    <div class="container py-lg-4">

        <div class="row g-4 align-items-stretch">

            {{-- LEFT CONTACT INFORMATION --}}
            <div class="col-lg-5">

                <div class="contact-info-panel h-100">

                    <span class="contact-small-label">
                        CONTACT INFORMATION
                    </span>

                    <h2 class="contact-info-title mt-3">
                        We'd Love to Hear From You
                    </h2>

                    <p class="contact-info-description">
                        Reach out to us for information about courses,
                        training schedules, enrolment and other enquiries.
                    </p>

                    {{-- Address --}}
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>

                        <div>
                            <h6>Our Location</h6>
                            <p>
                                Laxmi Nagar,<br>
                                New Delhi, India
                            </p>

                            <a href="https://www.google.com/maps/search/?api=1&query=Laxmi+Nagar+New+Delhi"
                               target="_blank"
                               rel="noopener noreferrer">
                                View on Google Maps
                                <i class="bi bi-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>

                        <div>
                            <h6>Email Us</h6>
                            <p>Send us your course or admission enquiry.</p>
                            <a href="mailto:YOUR_EMAIL@example.com">
                                YOUR_EMAIL@example.com
                            </a>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>

                        <div>
                            <h6>Call Us</h6>
                            <p>Speak with our team about your requirements.</p>
                            <a href="tel:+910000000000">
                                +91 XXXXX XXXXX
                            </a>
                        </div>
                    </div>

                    {{-- WhatsApp --}}
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-whatsapp"></i>
                        </div>

                        <div>
                            <h6>WhatsApp Enquiry</h6>
                            <p>Contact us for course-related information.</p>
                            <a href="https://wa.me/91XXXXXXXXXX"
                               target="_blank"
                               rel="noopener noreferrer">
                                Chat on WhatsApp
                                <i class="bi bi-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Working hours --}}
                    <div class="contact-hours">
                        <i class="bi bi-clock-fill me-2"></i>
                        <div>
                            <strong>Working Hours</strong>
                            <p>Contact us to confirm our available hours.</p>
                        </div>
                    </div>

                    <div class="contact-social-note">
                        <i class="bi bi-heart-fill me-2"></i>
                        Helping you take the next step in your learning journey.
                    </div>

                </div>
            </div>


            {{-- RIGHT CONTACT FORM --}}
            <div class="col-lg-7">

                <div class="contact-form-card h-100">

                    <div class="form-header">
                        <div>
                            <span class="contact-small-label">
                                SEND US A MESSAGE
                            </span>

                            <h2 class="contact-form-title mt-2">
                                How Can We Help You?
                            </h2>

                            <p class="text-secondary">
                                Fill out the form below and share your enquiry.
                            </p>
                        </div>

                        <div class="form-header-icon">
                            <i class="bi bi-send-fill"></i>
                        </div>
                    </div>

                    {{-- Success Message --}}

{{-- Success Toast --}}
@if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3"
         style="z-index: 1090;">

        <div id="successToast"
             class="toast border-0 text-bg-success"
             role="alert"
             aria-live="assertive"
             aria-atomic="true">

            <div class="d-flex align-items-center">

                <div class="toast-body">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>

                <button type="button"
                        class="btn-close btn-close-white me-2"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                </button>

            </div>
        </div>
    </div>
@endif

{{-- Validation Error Toast --}}
@if($errors->any())
    <div class="toast-container position-fixed top-0 end-0 p-3"
         style="z-index: 1090;">

        <div id="errorToast"
             class="toast border-0 text-bg-danger"
             role="alert"
             aria-live="assertive"
             aria-atomic="true">

            <div class="d-flex align-items-center">

                <div class="toast-body">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>

                    <strong>Please correct the following:</strong>

                    <ul class="mb-0 mt-2 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <button type="button"
                        class="btn-close btn-close-white me-2"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                </button>

            </div>
        </div>
    </div>
@endif

                    {{-- Contact Form --}}
                    <form  action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label for="name" class="contact-label">
                                    Full Name <span>*</span>
                                </label>

                                <div class="contact-input-wrap">
                                    <i class="bi bi-person"></i>

                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control contact-input"
                                           value="{{ old('name') }}"
                                           placeholder="Enter your name"
                                           maxlength="255"
                                           autocomplete="name"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="contact-label">
                                    Phone Number <span>*</span>
                                </label>

                                <div class="contact-input-wrap">
                                    <i class="bi bi-telephone"></i>

                                    <input type="tel"
                                           name="phone"
                                           id="phone"
                                           class="form-control contact-input"
                                           value="{{ old('phone') }}"
                                           placeholder="Enter phone number"
                                           maxlength="20"
                                           autocomplete="tel"
                                           required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="contact-label">
                                    Email Address <span>*</span>
                                </label>

                                <div class="contact-input-wrap">
                                    <i class="bi bi-envelope"></i>

                                    <input type="email"
                                           name="email"
                                           id="email"
                                           class="form-control contact-input"
                                           value="{{ old('email') }}"
                                           placeholder="Enter your email address"
                                           maxlength="255"
                                           autocomplete="email"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="course" class="contact-label">
                                    Interested Course
                                </label>

                                <div class="contact-input-wrap select-wrap">
                                    <i class="bi bi-book"></i>

                                    <select name="course"
                                            id="course"
                                            class="form-select contact-input">
                                        <option value="">Select a course</option>

                                        <option value="HR Generalist Training"
                                            @selected(old('course') == 'HR Generalist Training')>
                                            HR Generalist Training
                                        </option>

                                        <option value="HR Payroll"
                                            @selected(old('course') == 'HR Payroll')>
                                            HR Payroll &amp; Compliance
                                        </option>

                                        <option value="Recruitment"
                                            @selected(old('course') == 'Recruitment')>
                                            HR Recruitment
                                        </option>

                                        <option value="Industrial Relations"
                                            @selected(old('course') == 'Industrial Relations')>
                                            Industrial Relations
                                        </option>

                                        <option value="HR MIS and Excel"
                                            @selected(old('course') == 'HR MIS and Excel')>
                                            HR MIS &amp; Excel Analytics
                                        </option>

                                        <option value="Other"
                                            @selected(old('course') == 'Other')>
                                            Other
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="subject" class="contact-label">
                                    Enquiry Type <span>*</span>
                                </label>

                                <div class="contact-input-wrap select-wrap">
                                    <i class="bi bi-chat-square-text"></i>

                                    <select name="subject"
                                            id="subject"
                                            class="form-select contact-input"
                                            required>
                                        <option value="">Select enquiry type</option>

                                        <option value="Course Information"
                                            @selected(old('subject') == 'Course Information')>
                                            Course Information
                                        </option>

                                        <option value="Admission"
                                            @selected(old('subject') == 'Admission')>
                                            Admission
                                        </option>

                                        <option value="Fees and Schedule"
                                            @selected(old('subject') == 'Fees and Schedule')>
                                            Fees &amp; Schedule
                                        </option>

                                        <option value="Career Guidance"
                                            @selected(old('subject') == 'Career Guidance')>
                                            Career Guidance
                                        </option>

                                        <option value="Other"
                                            @selected(old('subject') == 'Other')>
                                            Other Enquiry
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="message" class="contact-label">
                                    Your Message <span>*</span>
                                </label>

                                <div class="contact-input-wrap textarea-wrap">
                                    <i class="bi bi-pencil-square"></i>

                                    <textarea name="message"
                                              id="message"
                                              class="form-control contact-input"
                                              rows="5"
                                              maxlength="3000"
                                              placeholder="Write your enquiry here..."
                                              required>{{ old('message') }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="contact-privacy">
                                    <i class="bi bi-shield-lock-fill"></i>
                                    <span>
                                        Please provide accurate contact details
                                        so our team can respond to your enquiry.
                                    </span>
                                </div>

                                <button type="submit"
                                        class="btn contact-submit-btn w-100 mt-3">
                                    Send Your Enquiry
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>

                        </div>
                    </form>

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


{{-- ================= BOTTOM CTA ================= --}}
<section class="contact-bottom-section py-5">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-lg-8">
                <span class="bottom-label">
                    LET'S CONNECT
                </span>

                <h2 class="bottom-title mt-2">
                    Have Questions About Our HR Courses?
                </h2>

                <p class="mb-0">
                    Send us your enquiry to learn more about our training programs.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <a href="{{ url('/courses') }}"
                   class="btn btn-warning btn-lg fw-bold px-4">
                    Explore Courses
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const successToast = document.getElementById('successToast');
        const errorToast = document.getElementById('errorToast');

        if (successToast) {
            const toast = new bootstrap.Toast(successToast, {
                autohide: true,
                delay: 4000
            });

            toast.show();
        }

        if (errorToast) {
            const toast = new bootstrap.Toast(errorToast, {
                autohide: false
            });

            toast.show();
        }

    });
</script>





@endsection
