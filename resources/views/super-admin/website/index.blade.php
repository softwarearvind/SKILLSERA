@extends('layouts.admin')

@section('title', 'Website Management')

@section('content')



<div class="website-page">

    {{-- HEADER --}}
    <div class="website-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h3>
                    <i class="bi bi-window me-2 text-primary"></i>
                    Website Management
                </h3>

                <p>
                    Manage your institute website settings, branding,
                    social media and SEO.
                </p>
            </div>

            <a href="{{ route('super-admin.dashboard') }}"
               class="back-btn">

                <i class="bi bi-arrow-left me-1"></i>
                Dashboard

            </a>

        </div>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success d-flex align-items-center mb-3">

            <i class="bi bi-check-circle-fill me-2"></i>

            <span>{{ session('success') }}</span>

        </div>

    @endif


    {{-- ERRORS --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-semibold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Please fix the following errors:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="management-card">

        {{-- TABS --}}
        <div class="website-tabs">

            <ul class="nav">

                <li class="nav-item">
                    <a href="#general"
                       class="nav-link active">

                        <i class="bi bi-gear me-1"></i>
                        General

                    </a>
                </li>

                <li class="nav-item">
                    <a href="#homepage"
                       class="nav-link">

                        <i class="bi bi-house me-1"></i>
                        Homepage

                    </a>
                </li>

                <li class="nav-item">
                    <a href="#pages"
                       class="nav-link">

                        <i class="bi bi-file-earmark-text me-1"></i>
                        Pages

                    </a>
                </li>

                <li class="nav-item">
                    <a href="#social"
                       class="nav-link">

                        <i class="bi bi-share me-1"></i>
                        Social Media

                    </a>
                </li>

                <li class="nav-item">
                    <a href="#seo"
                       class="nav-link">

                        <i class="bi bi-search me-1"></i>
                        SEO

                    </a>
                </li>

            </ul>

        </div>


        {{-- CONTENT --}}
        <div class="website-content">

            <form
                method="POST"
                action="{{ route('super-admin.website.settings.update') }}"
                enctype="multipart/form-data">

                @csrf


                {{-- GENERAL --}}
                <div id="general" class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-building me-2 text-primary"></i>
                            General Website Settings
                        </h5>

                        <p>
                            Configure basic institute and website information.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="row g-4">

                            {{-- SITE NAME --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Institute / Website Name
                                    <span class="required">*</span>
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-building"></i>

                                    <input
                                        type="text"
                                        name="site_name"
                                        class="form-control"
                                        value="{{ old('site_name', $settings->site_name ?? '') }}"
                                        placeholder="Institute Training Center">

                                </div>

                            </div>


                            {{-- PHONE --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-telephone"></i>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        value="{{ old('phone', $settings->phone ?? '') }}"
                                        placeholder="+91 9876543210">

                                </div>

                            </div>


                            {{-- EMAIL --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-envelope"></i>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email', $settings->email ?? '') }}"
                                        placeholder="info@institute.com">

                                </div>

                            </div>


                            {{-- ADDRESS --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Institute Address
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Institute complete address">{{ old('address', $settings->address ?? '') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- GST --}}
                <div class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-receipt-cutoff me-2 text-primary"></i>
                            GST / Tax Details
                        </h5>

                        <p>
                            Institute billing and GST information.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label">
                                    GST Number
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-upc-scan"></i>

                                    <input
                                        type="text"
                                        name="gst_number"
                                        class="form-control"
                                        value="{{ old('gst_number', $settings->gst_number ?? '') }}"
                                        placeholder="22AAAAA0000A1Z5">

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    GST Registered Name
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-building-check"></i>

                                    <input
                                        type="text"
                                        name="gst_registered_name"
                                        class="form-control"
                                        value="{{ old('gst_registered_name', $settings->gst_registered_name ?? '') }}"
                                        placeholder="Registered Business Name">

                                </div>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    GST Registered Address
                                </label>

                                <textarea
                                    name="gst_address"
                                    class="form-control"
                                    rows="3"
                                    placeholder="GST registered address">{{ old('gst_address', $settings->gst_address ?? '') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- BRANDING --}}
                <div class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-palette me-2 text-primary"></i>
                            Website Branding
                        </h5>

                        <p>
                            Upload your institute logo and favicon.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="row g-4">

                            {{-- LOGO --}}
                            <div class="col-md-6">

                                <div class="logo-upload">

                                    <label class="form-label">
                                        Website Logo
                                    </label>

                                    <div class="logo-preview">

                                        @if(!empty($settings?->logo))

                                            <img
                                                src="{{ asset('storage/' . $settings->logo) }}"
                                                alt="Website Logo">

                                        @else

                                            <i class="bi bi-image fs-2 text-secondary"></i>

                                        @endif

                                    </div>

                                    <input
                                        type="file"
                                        name="logo"
                                        class="form-control">

                                    <small class="text-muted">
                                        JPG, PNG or WEBP. Maximum 2MB.
                                    </small>

                                </div>

                            </div>


                            {{-- FAVICON --}}
                            <div class="col-md-6">

                                <div class="logo-upload">

                                    <label class="form-label">
                                        Website Favicon
                                    </label>

                                    <div class="logo-preview"
                                         style="width:90px;height:90px;">

                                        @if(!empty($settings?->favicon))

                                            <img
                                                src="{{ asset('storage/' . $settings->favicon) }}"
                                                alt="Favicon">

                                        @else

                                            <i class="bi bi-image fs-2 text-secondary"></i>

                                        @endif

                                    </div>

                                    <input
                                        type="file"
                                        name="favicon"
                                        class="form-control">

                                    <small class="text-muted">
                                        JPG, PNG, ICO or WEBP. Maximum 1MB.
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- SOCIAL --}}
                <div id="social" class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-share me-2 text-primary"></i>
                            Social Media
                        </h5>

                        <p>
                            Add official institute social media profiles.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Facebook
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-facebook"></i>

                                    <input
                                        type="url"
                                        name="facebook"
                                        class="form-control"
                                        value="{{ old('facebook', $settings->facebook ?? '') }}"
                                        placeholder="https://facebook.com/yourpage">

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Instagram
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-instagram"></i>

                                    <input
                                        type="url"
                                        name="instagram"
                                        class="form-control"
                                        value="{{ old('instagram', $settings->instagram ?? '') }}"
                                        placeholder="https://instagram.com/yourpage">

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    YouTube
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-youtube"></i>

                                    <input
                                        type="url"
                                        name="youtube"
                                        class="form-control"
                                        value="{{ old('youtube', $settings->youtube ?? '') }}"
                                        placeholder="https://youtube.com/@channel">

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    LinkedIn
                                </label>

                                <div class="input-icon">

                                    <i class="bi bi-linkedin"></i>

                                    <input
                                        type="url"
                                        name="linkedin"
                                        class="form-control"
                                        value="{{ old('linkedin', $settings->linkedin ?? '') }}"
                                        placeholder="https://linkedin.com/company/...">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- SEO --}}
                <div id="seo" class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-search me-2 text-primary"></i>
                            SEO Settings
                        </h5>

                        <p>
                            Configure basic search engine optimization information.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="mb-4">

                            <label class="form-label">
                                Meta Title
                            </label>

                            <input
                                type="text"
                                name="meta_title"
                                class="form-control"
                                value="{{ old('meta_title', $settings->meta_title ?? '') }}"
                                placeholder="Best Training Institute">

                        </div>


                        <div class="mb-4">

                            <label class="form-label">
                                Meta Description
                            </label>

                            <textarea
                                name="meta_description"
                                class="form-control"
                                rows="4"
                                placeholder="Describe your institute...">{{ old('meta_description', $settings->meta_description ?? '') }}</textarea>

                        </div>


                        <div>

                            <label class="form-label">
                                Meta Keywords
                            </label>

                            <input
                                type="text"
                                name="meta_keywords"
                                class="form-control"
                                value="{{ old('meta_keywords', $settings->meta_keywords ?? '') }}"
                                placeholder="training, institute, courses, education">

                        </div>

                    </div>

                </div>


                {{-- PLACEHOLDER SECTIONS --}}
                <div id="homepage" class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-house me-2 text-primary"></i>
                            Homepage Management
                        </h5>

                        <p>
                            Homepage sections will be managed here.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="alert alert-info mb-0">

                            <i class="bi bi-info-circle me-2"></i>

                            Homepage section management will be connected
                            to your homepage sections module.

                        </div>

                    </div>

                </div>


                <div id="pages" class="section-box">

                    <div class="section-box-header">

                        <h5>
                            <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                            Website Pages
                        </h5>

                        <p>
                            Manage About, Contact, Privacy Policy and other pages.
                        </p>

                    </div>

                    <div class="section-box-body">

                        <div class="alert alert-info mb-0">

                            <i class="bi bi-info-circle me-2"></i>

                            Website page management will be connected here.

                        </div>

                    </div>

                </div>


                {{-- ACTION --}}
                <div class="bottom-actions">

                    <a href="{{ route('super-admin.dashboard') }}"
                       class="back-btn">

                        Cancel

                    </a>

                    <button type="submit"
                            class="save-btn">

                        <i class="bi bi-check-lg me-1"></i>

                        Save Website Settings

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const links = document.querySelectorAll('.website-tabs .nav-link');

    links.forEach(link => {

        link.addEventListener('click', function (e) {

            e.preventDefault();

            links.forEach(item => {
                item.classList.remove('active');
            });

            this.classList.add('active');

            const target = this.getAttribute('href');

            if (target && target !== '#') {

                const element = document.querySelector(target);

                if (element) {

                    const offset = 100;

                    const position =
                        element.getBoundingClientRect().top +
                        window.pageYOffset -
                        offset;

                    window.scrollTo({
                        top: position,
                        behavior: 'smooth'
                    });

                }

            }

        });

    });

});

</script>

@endsection
