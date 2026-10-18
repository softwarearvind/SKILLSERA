@extends('layouts.frontend')

@section('title', 'Career Support | ' . ($websiteSetting->site_name ?? 'SKILLS ERA'))

@section('meta_description', 'Get career guidance, interview preparation, resume support and professional development assistance from SKILLS ERA.')

@section('content')

{{-- Career Support Hero --}}
<section class="career-support-section py-5">
    <div class="container py-lg-4">

        <div class="row align-items-center g-5">

            {{-- LEFT CONTENT --}}
            <div class="col-lg-6">

                <span class="career-badge">
                    <i class="bi bi-stars me-2"></i>
                    CAREER SUPPORT
                </span>

                <h1 class="career-title mt-4">
                    Take the Next Step in Your
                    <span>Professional Career</span>
                </h1>

                <p class="career-description mt-3">
                    Get the guidance you need to prepare for your next
                    career opportunity. We help learners build confidence,
                    improve interview readiness and understand workplace
                    expectations.
                </p>

                {{-- Benefits --}}
                <div class="career-benefits mt-4">

                    <div class="career-benefit">
                        <div class="benefit-icon">
                            <i class="bi bi-file-earmark-person-fill"></i>
                        </div>
                        <div>
                            <h6>Resume & CV Guidance</h6>
                            <p>Learn how to present your skills and experience professionally.</p>
                        </div>
                    </div>

                    <div class="career-benefit">
                        <div class="benefit-icon">
                            <i class="bi bi-chat-square-text-fill"></i>
                        </div>
                        <div>
                            <h6>Interview Preparation</h6>
                            <p>Practice common interview questions and improve communication.</p>
                        </div>
                    </div>

                    <div class="career-benefit">
                        <div class="benefit-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <div>
                            <h6>Career Guidance</h6>
                            <p>Explore relevant skills, career paths and professional development options.</p>
                        </div>
                    </div>

                    <div class="career-benefit">
                        <div class="benefit-icon">
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>
                        <div>
                            <h6>Industry Readiness</h6>
                            <p>Understand workplace expectations through practical learning.</p>
                        </div>
                    </div>

                </div>

                {{-- Support Note --}}
                <div class="career-note mt-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Career guidance and support depend on your learning needs
                    and the services available through our training program.
                </div>

            </div>

            {{-- RIGHT FORM --}}
            <div class="col-lg-6">

                <div class="career-form-card">

                    <div class="form-heading">
                        <div class="form-heading-icon">
                            <i class="bi bi-send-fill"></i>
                        </div>

                        <div>
                            <h3>Get Career Support</h3>
                            <p>Share your details and tell us how we can help.</p>
                        </div>
                    </div>

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('career.enquiry.send') }}"  method="POST">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="name" class="form-label">
                                    Full Name <span>*</span>
                                </label>
                                <input type="text"
                                       class="form-control career-input"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Enter your full name"
                                       maxlength="255"
                                       autocomplete="name"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    Mobile Number <span>*</span>
                                </label>
                                <input type="tel"
                                       class="form-control career-input"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       placeholder="Enter mobile number"
                                       maxlength="20"
                                       autocomplete="tel"
                                       required>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">
                                    Email Address <span>*</span>
                                </label>
                                <input type="email"
                                       class="form-control career-input"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email address"
                                       maxlength="255"
                                       autocomplete="email"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label for="qualification" class="form-label">
                                    Qualification
                                </label>
                                <select class="form-select career-input"
                                        id="qualification"
                                        name="qualification">
                                    <option value="">Select qualification</option>
                                    <option value="12th"
                                        @selected(old('qualification') == '12th')>12th Pass</option>
                                    <option value="Diploma"
                                        @selected(old('qualification') == 'Diploma')>Diploma</option>
                                    <option value="Graduate"
                                        @selected(old('qualification') == 'Graduate')>Graduate</option>
                                    <option value="Post Graduate"
                                        @selected(old('qualification') == 'Post Graduate')>Post Graduate</option>
                                    <option value="Other"
                                        @selected(old('qualification') == 'Other')>Other</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="support_type" class="form-label">
                                    Support Required <span>*</span>
                                </label>
                                <select class="form-select career-input"
                                        id="support_type"
                                        name="support_type"
                                        required>
                                    <option value="">Choose support</option>
                                    <option value="Resume Guidance"
                                        @selected(old('support_type') == 'Resume Guidance')>Resume Guidance</option>
                                    <option value="Interview Preparation"
                                        @selected(old('support_type') == 'Interview Preparation')>Interview Preparation</option>
                                    <option value="Career Guidance"
                                        @selected(old('support_type') == 'Career Guidance')>Career Guidance</option>
                                    <option value="HR Training"
                                        @selected(old('support_type') == 'HR Training')>HR Training</option>
                                    <option value="Other"
                                        @selected(old('support_type') == 'Other')>Other</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label">
                                    Tell Us About Your Requirement
                                </label>
                                <textarea class="form-control career-input"
                                          id="message"
                                          name="message"
                                          rows="4"
                                          maxlength="2000"
                                          placeholder="Describe your career goals or questions...">{{ old('message') }}</textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit"
                                        class="btn career-submit-btn w-100">
                                    Submit Enquiry
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>

                        </div>
                    </form>

                    <div class="form-footer">
                        <i class="bi bi-shield-lock-fill me-2"></i>
                        Your information will be handled responsibly.
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

{{-- Career Support Steps --}}
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
