<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Institute Training')
    </title>

    <meta
        name="description"
        content="@yield('meta_description', 'Professional training institute offering career-focused courses and practical training.')"
    >

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


 <style>
    /* Top Bar Custom Styling */
    .top-bar {
      background-color: #38b449; /* Green header background */
      color: #ffffff;
      font-size: 14px;
      padding: 8px 0;
    }

    .top-bar a {
      color: #ffffff;
      text-decoration: none;
      transition: opacity 0.2s ease;
    }

    .top-bar a:hover {
      color: #f8f9fa;
      opacity: 0.85;
    }

    /* Social Icons Styling */
    .social-icons a {
      font-size: 15px;
      margin-left: 10px;
    }

    /* Custom Button Styles */
    .btn-book-demo {
      background-color: #0f2b48; /* Dark Navy Blue */
      color: #ffffff;
      font-weight: 600;
      font-size: 13px;
      padding: 7px 16px;
      border: none;
      border-radius: 4px;
    }

    .btn-book-demo:hover {
      background-color: #0b1f35;
      color: #ffffff;
    }

    .btn-pay-online {
      background-color: #f3e008; /* Yellow */
      color: #333333;
      font-weight: 700;
      font-size: 13px;
      padding: 7px 16px;
      border: none;
      border-radius: 4px;
    }

    .btn-pay-online:hover {
      background-color: #d9c700;
      color: #000000;
    }
  </style>
<style>
    ```

### CSS — isko apni stylesheet mein add karein

```css
/* ==============================
   SKILLS ERA SECTION
============================== */

.skills-section {
    background: #ffffff;
    overflow: hidden;
}

.skills-section .section-tag {
    padding: 9px 16px;
    border-radius: 50px;
    background: #fff4df;
    color: #a86b00;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.skills-section .section-heading {
    color: #172033;
    font-size: clamp(27px, 3vw, 36px);
    font-weight: 800;
    line-height: 1.25;
    letter-spacing: -0.7px;
}

.skills-section .text-amber {
    color: #e5a11a !important;
}

.skills-section .section-subtitle {
    color: #647084;
    font-size: 15px;
    line-height: 1.9;
}

/* Feature Items */

.skills-section .feature-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.skills-section .icon-badge {
    flex: 0 0 50px;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: #fff5df;
    color: #d99108;
    font-size: 22px;
}

.skills-section .feature-content {
    flex: 1;
    min-width: 0;
}

.skills-section .feature-title {
    color: #172033;
    font-size: 18px;
    font-weight: 750;
    line-height: 1.4;
}

.skills-section .feature-desc {
    color: #647084;
    font-size: 14px;
    line-height: 1.8;
}

/* Program Promise */

.skills-section .promise-box {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 22px;
    border: 1px solid #f0dfb9;
    border-left: 4px solid #e5a11a;
    border-radius: 14px;
    background: #fffbf3;
}

.skills-section .promise-icon {
    flex: 0 0 40px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #fff0ca;
    color: #bd810c;
    font-size: 21px;
}

.skills-section .promise-content {
    flex: 1;
    min-width: 0;
}

.skills-section .promise-box .feature-title {
    font-size: 14px;
    letter-spacing: 0.6px;
}

/* Footer Text */

.skills-section .footer-text {
    color: #5b6475;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.8px;
    line-height: 1.8;
}

.skills-section .footer-text i {
    color: #e5a11a;
    font-size: 15px;
}

/* Button */

.skills-section .btn-amber {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 13px 23px;
    border: 1px solid #e5a11a;
    border-radius: 8px;
    background: #e5a11a;
    color: #172033;
    font-size: 14px;
    font-weight: 700;
    transition: all 0.25s ease;
}

.skills-section .btn-amber:hover {
    border-color: #c4860c;
    background: #c4860c;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(197, 134, 12, 0.2);
}

/* Image */

.skills-section .image-wrapper {
    position: relative;
    padding: 10px 10px 35px;
    border-radius: 22px;
    background: #fff8e9;
}

.skills-section .main-course-img {
    display: block;
    width: 100%;
    height: 490px;
    object-fit: cover;
    object-position: center;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(23, 32, 51, 0.12);
}

/* Floating Image Badge */

.skills-section .image-floating-badge {
    position: absolute;
    left: -18px;
    bottom: 0;
    display: flex;
    align-items: center;
    gap: 12px;
    max-width: calc(100% - 20px);
    padding: 16px 20px;
    border: 1px solid #f0e5d0;
    border-radius: 14px;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(23, 32, 51, 0.12);
}

.skills-section .floating-icon {
    flex: 0 0 42px;
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #fff3d6;
    color: #c4860c;
    font-size: 20px;
}

.skills-section .image-floating-badge h4 {
    color: #172033;
    font-size: 14px;
    font-weight: 800;
}

.skills-section .image-floating-badge p {
    color: #647084;
    font-size: 12px;
}

.skills-section .image-caption {
    color: #647084;
    font-size: 13px;
    line-height: 1.7;
}

.skills-section .image-caption i {
    color: #d99a18;
}

/* Tablet & Mobile */

@media (max-width: 991.98px) {
    .skills-section .main-course-img {
        height: 420px;
    }

    .skills-section .image-floating-badge {
        left: 8px;
    }
}

@media (max-width: 575.98px) {
    .skills-section {
        padding-top: 35px !important;
        padding-bottom: 35px !important;
    }

    .skills-section .section-heading {
        font-size: 28px;
    }

    .skills-section .section-subtitle {
        font-size: 14px;
        line-height: 1.8;
    }

    .skills-section .feature-item {
        gap: 12px;
    }

    .skills-section .icon-badge {
        flex-basis: 44px;
        width: 44px;
        height: 44px;
        font-size: 19px;
    }

    .skills-section .feature-title {
        font-size: 16px;
    }

    .skills-section .feature-desc {
        font-size: 13px;
    }

    .skills-section .promise-box {
        padding: 16px;
        gap: 11px;
    }

    .skills-section .promise-icon {
        flex-basis: 34px;
        width: 34px;
        height: 34px;
        font-size: 18px;
    }

    .skills-section .footer-text {
        font-size: 10px;
    }

    .skills-section .btn-amber {
        width: 100%;
        padding: 13px 15px;
    }

    .skills-section .main-course-img {
        height: 320px;
    }

    .skills-section .image-wrapper {
        padding: 7px 7px 28px;
        border-radius: 16px;
    }

    .skills-section .image-floating-badge {
        padding: 12px;
    }
}
</style>
  <style>

.section-badge {
    display: inline-block;
    padding: 8px 18px;
    border: 1px solid #f3dfba;
    border-radius: 50px;
    background: #fff8e9;
    color: #a96d13;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
}

.section-title {
    color: #172033;
    font-size: clamp(28px, 4vw, 44px);
    font-weight: 800;
    line-height: 1.3;
    letter-spacing: -1px;
}

.title-highlight {
    color: #e99a24;
}

.section-subtitle {
    max-width: 650px;
    margin: 0 auto;
    color: #687386;
    font-size: 16px;
    line-height: 1.8;
}

.title-divider {
    width: 65px;
    height: 4px;
    margin-top: 22px;
    border-radius: 10px;
    background: linear-gradient(90deg, #f7ca71, #e99a24);
}

@media (max-width: 576px) {
    .section-title {
        font-size: 29px;
        letter-spacing: -.5px;
    }

    .section-subtitle {
        font-size: 14px;
        padding: 0 10px;
    }
}
  </style>

    <style>

        :root {
            --primary: #0d47a1;
            --primary-dark: #082f6b;
            --secondary: #f59e0b;
            --dark: #111827;
            --light: #f8fafc;
            --text: #475569;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: #ffffff;
        }

        a {
            text-decoration: none;
        }



        .main-navbar {
            background: #fff;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.07);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 22px;
            font-weight: 800;
            color: var(--primary) !important;
        }

        .navbar-brand span {
            color: var(--secondary);
        }

        .nav-link {
            color: #334155 !important;
            font-weight: 600;
            font-size: 14px;
            padding: 22px 12px !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
        }

        .btn-primary-custom {
            background: var(--primary);
            color: #fff;
            border-radius: 7px;
            padding: 11px 22px;
            font-weight: 600;
            border: none;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: #fff;
        }

        .btn-outline-custom {
            border: 1px solid var(--primary);
            color: var(--primary);
            border-radius: 7px;
            padding: 10px 21px;
            font-weight: 600;
        }

        .btn-outline-custom:hover {
            background: var(--primary);
            color: #fff;
        }

        .frontend-footer {
            background: #0b1220;
            color: #cbd5e1;
        }

        .frontend-footer h5 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .frontend-footer a {
            color: #cbd5e1;
            display: block;
            margin-bottom: 10px;
        }

        .frontend-footer a:hover {
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.1);
        }

        .section-padding {
            padding: 80px 0;
        }

        .section-title {
            font-weight: 800;
            color: var(--dark);
        }

        .section-subtitle {
            max-width: 650px;
            margin: 0 auto;
            color: #64748b;
        }

        .course-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            transition: .3s;
            height: 100%;
        }

        .course-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .10);
        }

        .course-image {
            height: 210px;
            object-fit: cover;
            width: 100%;
        }

        .feature-card {
            border: 0;
            border-radius: 15px;
            padding: 30px;
            background: #fff;
            height: 100%;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .06);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            border-radius: 12px;
            background: #e8f0ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin-bottom: 20px;
        }

        .batch-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: #fff;
            padding: 24px;
            height: 100%;
        }

        .stat-box {
            padding: 25px;
            text-align: center;
        }

        .stat-box h2 {
            color: var(--primary);
            font-weight: 800;
        }

        @media (max-width: 991px) {

            .nav-link {
                padding: 10px 0 !important;
            }

        }

        :root {
            --bg-color: #070e17;
            --card-bg: #102131;
            --text-heading: #ffffff;
            --text-muted: #8e9fae;
            --yellow-accent: #e5a93c;
            --teal-accent: #10b981;
            --blue-accent: #3b82f6;
        }


        .page-wrapper {
            padding: 3rem 4rem;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                padding: 1.5rem 1.5rem;
            }
        }

        .header-title-container {
            position: relative;
            display: inline-block;
        }



        .yellow-line {
            width: 55px;
            height: 4px;
            background-color: var(--yellow-accent);
            border-radius: 2px;
            margin-top: 6px;
            margin-bottom: 1.2rem;
        }

        .sub-heading {
            font-size: 0.95rem;
            color: var(--text-muted);
            font-weight: 400;
        }

        .page-number {
            color: var(--yellow-accent);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .custom-card {
            background-color: var(--card-bg);
            border-radius: 18px;
            padding: 2.2rem 2rem;
            height: 100%;
            position: relative;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-card-left-border {
            border-left-width: 4px;
            border-left-style: solid;
        }

        .border-teal {
            border-left-color: var(--teal-accent);
        }

        .border-yellow {
            border-left-color: var(--yellow-accent);
        }

        .border-blue {
            border-left-color: var(--blue-accent);
        }

        .card-title-custom {
            color: var(--text-heading);
            font-weight: 700;
            font-size: 1.35rem;
            margin-bottom: 1.5rem;
        }

        .card-text-custom {
            color: #9cb1c3;
            font-size: 0.92rem;
            line-height: 1.6;
            font-weight: 400;
        }

        .promise-card {
            background-color: var(--card-bg);
            border-radius: 20px;
            padding: 2.5rem 2.2rem;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .promise-title {
            color: var(--text-heading);
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 1.2rem;
        }

        .promise-text {
            color: #9cb1c3;
            font-size: 0.95rem;
            line-height: 1.65;
            max-width: 95%;
        }

        .footer-text {
            font-size: 0.72rem;
            color: #5c7285;
            letter-spacing: 0.8px;
            font-weight: 600;
            margin-top: 3rem;
            padding-left: 0.5rem;
        }


          :root {
            --bg-color: #070e17;
            --card-bg: #102131;
            --text-heading: #ffffff;
            --text-muted: #8e9fae;
            --yellow-accent: #e5a93c;
            --teal-accent: #10b981;
            --blue-accent: #3b82f6;
        }



        .page-wrapper {
            padding: 3rem 4rem;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                padding: 1.5rem 1.25rem;
            }
        }

        .main-heading {
            color: var(--text-heading);
            font-weight: 700;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .yellow-line {
            width: 55px;
            height: 4px;
            background-color: var(--yellow-accent);
            border-radius: 2px;
            margin-top: 6px;
            margin-bottom: 1.2rem;
        }

        .sub-heading {
            font-size: 0.95rem;
            color: var(--text-muted);
            font-weight: 400;
        }

        .page-number {
            color: var(--yellow-accent);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .custom-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 2rem 1.8rem;
            height: 100%;
            position: relative;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.45);
        }

        .custom-card-left-border {
            border-left-width: 4px;
            border-left-style: solid;
        }

        .border-teal {
            border-left-color: var(--teal-accent);
        }

        .border-yellow {
            border-left-color: var(--yellow-accent);
        }

        .border-blue {
            border-left-color: var(--blue-accent);
        }

        .card-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
        }

        .card-title-custom {
            color: var(--text-heading);
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: 0.5px;
            margin: 0;
            text-transform: uppercase;
        }

        .card-num {
            color: var(--yellow-accent);
            font-weight: 700;
            font-size: 0.95rem;
        }

        .card-text-custom {
            color: #9cb1c3;
            font-size: 0.9rem;
            line-height: 1.6;
            font-weight: 400;
            margin: 0;
        }

        .footer-text {
            font-size: 0.72rem;
            color: #5c7285;
            letter-spacing: 0.8px;
            font-weight: 600;
            margin-top: 3.5rem;
            padding-left: 0.25rem;
        }

        /* Color Palette & Dark Theme Rules */
:root {
    --dash-bg: #050e18;
    --card-bg: #102438;
    --card-track: #1c354d;
    --yellow-accent: #eab308;
    --teal-accent: #2dd4bf;
    --blue-accent: #3b82f6;
    --green-accent: #10b981;
    --text-heading: #ffffff;
    --text-muted: #8ca2b5;
}

.dark-section {
    background-color: var(--dash-bg);
    color: var(--text-muted);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

/* Page Header & Slide Marker */
.main-heading {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 2.2rem;
    margin-bottom: 0.2rem;
}
.yellow-line {
    width: 60px;
    height: 4px;
    background-color: var(--yellow-accent);
    border-radius: 2px;
    margin-bottom: 1rem;
}
.sub-heading {
    color: var(--text-muted);
    font-size: 0.95rem;
}
.slide-number {
    color: var(--yellow-accent);
    font-weight: 700;
    font-size: 1.1rem;
}

/* Metric Cards */
.metric-card {
    background-color: var(--card-bg);
    border-radius: 12px;
    padding: 1.8rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    height: 100%;
    border-left: 5px solid transparent;
}
.metric-yellow { border-left-color: var(--yellow-accent); }
.metric-teal { border-left-color: var(--teal-accent); }
.metric-blue { border-left-color: var(--blue-accent); }
.metric-green { border-left-color: var(--green-accent); }

.metric-num {
    font-weight: 800;
    font-size: 2.4rem;
    line-height: 1;
    min-width: 65px;
}
.yellow-text { color: var(--yellow-accent); }
.teal-text { color: var(--teal-accent); }
.blue-text { color: var(--blue-accent); }
.green-text { color: var(--green-accent); }

.metric-label {
    color: #ffffff;
    font-weight: 700;
    font-size: 0.78rem;
    letter-spacing: 0.8px;
    line-height: 1.35;
}

/* Curriculum Section */
.section-sub-title {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 0.95rem;
    letter-spacing: 0.8px;
}
.progress-label {
    color: #c0d1e0;
    font-size: 0.9rem;
    font-weight: 500;
}
.progress-val {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 0.85rem;
}
.custom-progress {
    height: 14px;
    background-color: var(--card-track);
    border-radius: 7px;
    overflow: hidden;
}
.custom-progress .progress-bar {
    height: 100%;
    border-radius: 7px;
}

/* Progress Bar Colors */
.bg-yellow { background-color: var(--yellow-accent) !important; }
.bg-teal { background-color: var(--teal-accent) !important; }
.bg-blue { background-color: var(--blue-accent) !important; }
.bg-green { background-color: var(--green-accent) !important; }

/* Portfolio Card */
.portfolio-output-card {
    background-color: var(--card-bg);
    border-radius: 28px;
    padding: 2.5rem 2.2rem;
    height: 100%;
}
.portfolio-title {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 1.1rem;
    letter-spacing: 0.8px;
}
.portfolio-list li {
    color: #a8becf;
    font-size: 0.92rem;
    margin-bottom: 0.85rem;
    position: relative;
    padding-left: 1.25rem;
}
.portfolio-list li::before {
    content: "•";
    color: #a8becf;
    font-size: 1.2rem;
    position: absolute;
    left: 0;
    top: -2px;
}

/* Color Variables & Dark Theme */
:root {
    --dash-bg: #050e18;
    --yellow-accent: #eab308;
    --teal-accent: #2dd4bf;
    --text-heading: #ffffff;
    --text-muted: #8ca2b5;
}

.dark-section {
    background-color: var(--dash-bg);
    color: var(--text-muted);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    padding: 60px 0;
}

.page-wrapper {
    padding: 0 3rem;
}

/* Page Header & Slide Marker */
.main-heading {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 2.2rem;
    margin-bottom: 0.2rem;
}

.yellow-line {
    width: 60px;
    height: 4px;
    background-color: var(--yellow-accent);
    border-radius: 2px;
    margin-bottom: 1rem;
}

.sub-heading {
    color: var(--text-muted);
    font-size: 0.95rem;
}

.slide-number {
    color: var(--yellow-accent);
    font-weight: 700;
    font-size: 1.1rem;
}

/* Rounded Number Square Cards */
.step-card {
    width: 70px;
    height: 70px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.2rem auto;
    font-size: 1.25rem;
    font-weight: 800;
    color: #050e18; /* Dark text inside colored box */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
    transition: transform 0.2s ease;
}

.step-card:hover {
    transform: translateY(-4px);
}

/* Background Colors for Cards */
.bg-yellow {
    background-color: var(--yellow-accent);
}

.bg-teal {
    background-color: var(--teal-accent);
}

/* Text Titles Below Cards */
.step-title {
    color: #ffffff;
    font-size: 0.88rem;
    font-weight: 500;
    line-height: 1.35;
}

/* Mobile Responsive adjustment */
@media (max-width: 768px) {
    .page-wrapper {
        padding: 0 1.25rem;
    }
    .step-card {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        font-size: 1.1rem;
    }
    .step-title {
        font-size: 0.8rem;
    }
}
/* Color Scheme Variables */
:root {
    --bg-dark: #070e17;
    --card-bg: #102131;
    --text-heading: #ffffff;
    --text-muted: #8e9fae;
    --yellow-accent: #e5a93c;
    --teal-accent: #10b981;
    --blue-accent: #3b82f6;
}

.dark-section {
    background-color: var(--bg-dark);
    color: var(--text-muted);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.page-wrapper {
    padding: 3rem 2.5rem;
}

/* Headings & Slide Markers */
.main-heading {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 1.5rem;
    letter-spacing: -0.3px;
    margin-bottom: 0.25rem;
}

.yellow-line {
    width: 45px;
    height: 3px;
    background-color: var(--yellow-accent);
    border-radius: 2px;
    margin-top: 4px;
    margin-bottom: 0.8rem;
}

.sub-heading {
    font-size: 0.82rem;
    color: var(--text-muted);
    margin-bottom: 0;
}

.slide-number {
    color: var(--yellow-accent);
    font-weight: 700;
    font-size: 0.95rem;
}

/* Module Feature Cards */
.module-card {
    background-color: var(--card-bg);
    border-radius: 12px;
    padding: 1.25rem 1rem;
    height: 100%;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
}

.border-left-yellow { border-left: 4px solid var(--yellow-accent); }
.border-left-teal { border-left: 4px solid var(--teal-accent); }
.border-left-blue { border-left: 4px solid var(--blue-accent); }

.card-title-custom {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 0.95rem;
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.card-text-custom {
    color: #8fa2b3;
    font-size: 0.78rem;
    line-height: 1.5;
    margin: 0;
}

/* Practical Output Box */
.output-card {
    background-color: var(--card-bg);
    border-radius: 14px;
    padding: 1.5rem 1.25rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
}

.output-title {
    color: var(--yellow-accent);
    font-weight: 700;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    margin: 0;
}

.output-text {
    color: #8fa2b3;
    font-size: 0.82rem;
    line-height: 1.5;
}

/* Footer Tagline */
.footer-text {
    font-size: 0.65rem;
    color: #4a5c6d;
    letter-spacing: 0.8px;
    font-weight: 600;
    margin-top: 1.5rem;
}

/* Responsive adjustment for Mobile screens */
@media (max-width: 991px) {
    .page-wrapper {
        padding: 1.5rem 1rem;
    }
}

:root {
    --bg-dark: #070e17;
    --card-bg: #102131;
    --text-heading: #ffffff;
    --text-muted: #8e9fae;
    --yellow-accent: #e5a93c;
    --teal-accent: #10b981;
    --blue-accent: #3b82f6;
    --red-accent: #ef4444;
}

.dark-section {
    background-color: var(--bg-dark);
    color: var(--text-muted);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.section-padding {
    padding: 2.5rem 0;
}

.page-wrapper {
    padding: 0 1.5rem;
}

/* Card Container Wrapper */
.module-card-wrapper {
    background-color: rgba(16, 33, 49, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 1.25rem;
}

/* Headings */
.main-heading {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 1.15rem;
    line-height: 1.3;
    margin-bottom: 0.25rem;
}

.yellow-line {
    width: 35px;
    height: 3px;
    background-color: var(--yellow-accent);
    border-radius: 2px;
    margin: 6px 0;
}

.sub-heading {
    font-size: 0.75rem;
    color: var(--text-muted);
    margin-bottom: 0;
    line-height: 1.4;
}

.slide-number {
    color: var(--yellow-accent);
    font-weight: 700;
    font-size: 0.85rem;
}

/* Mini Feature Cards */
.mini-card {
    background-color: var(--card-bg);
    border-radius: 8px;
    padding: 0.75rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.border-left-yellow { border-left: 3px solid var(--yellow-accent); }
.border-left-teal { border-left: 3px solid var(--teal-accent); }
.border-left-blue { border-left: 3px solid var(--blue-accent); }
.border-left-red { border-left: 3px solid var(--red-accent); }

.card-title-custom {
    color: var(--text-heading);
    font-weight: 700;
    font-size: 0.8rem;
    margin-bottom: 0.35rem;
}

.card-text-custom {
    color: #8fa2b3;
    font-size: 0.7rem;
    line-height: 1.35;
    margin: 0;
}

/* KPI Numbers */
.kpi-num {
    font-weight: 800;
    font-size: 1.1rem;
    line-height: 1;
    margin-bottom: 0.25rem;
}
.text-yellow { color: var(--yellow-accent); }
.text-teal { color: var(--teal-accent); }
.text-blue { color: var(--blue-accent); }
.text-red { color: var(--red-accent); }

.kpi-label {
    font-size: 0.6rem;
    font-weight: 600;
    color: #8fa2b3;
}

/* Output Cards & Lists */
.output-card {
    background-color: var(--card-bg);
    border-radius: 10px;
    padding: 0.85rem;
}

.output-title {
    color: var(--yellow-accent);
    font-weight: 700;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.output-text {
    color: #8fa2b3;
    font-size: 0.72rem;
    line-height: 1.4;
}

.skills-list {
    color: #8fa2b3;
    font-size: 0.72rem;
    line-height: 1.6;
}

/* Progress Bars */
.progress-label {
    font-size: 0.68rem;
    color: #8fa2b3;
}

.progress {
    height: 5px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
}

.bg-yellow { background-color: var(--yellow-accent); }
.bg-teal { background-color: var(--teal-accent); }
.bg-blue { background-color: var(--blue-accent); }

/* Footer */
.footer-text {
    font-size: 0.58rem;
    color: #4a5c6d;
    letter-spacing: 0.5px;
    font-weight: 600;
}


.offer-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .6);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    overflow-y: auto;          /* overlay scroll ho sake */
    padding: 15px;
}

.offer-modal {
    position: relative;
    background: #fff;
    max-width: 900px;
    width: 100%;
    max-height: 95vh;          /* screen se bada na ho */
    overflow-y: auto;          /* andar scroll aaye */
    border-radius: 12px;
}

.offer-image {
    min-height: 430px;
}

.offer-image img {
    min-height: 430px;
}

.offer-form {
    padding: 25px;
}

.offer-form h2 {
    font-size: 24px;
    margin-bottom: 3px;
}

.offer-form > p {
    font-size: 14px;
    margin-bottom: 15px;
}

.offer-form .mb-3 {
    margin-bottom: 10px !important;
}

.offer-form label {
    font-size: 14px;
    margin-bottom: 4px;
}

.offer-form .form-control,
.offer-form .form-select {
    height: 40px;
    font-size: 14px;
    padding: 7px 10px;
}

.offer-form textarea.form-control {
    height: 60px;
}

.offer-submit {
    padding: 10px;
    font-size: 14px;
}

@keyframes offerPopup {
    from {
        opacity: 0;
        transform: scale(0.85);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.offer-close {
    position: sticky;          /* scroll karne par bhi upar rahe */
    top: 10px;
    float: right;
    margin: 10px 15px 0 0;
    z-index: 10001;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #ddd;
    font-size: 24px;
    line-height: 1;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,.2);
}

.offer-image {
    position: relative;
    overflow: hidden;
    min-height: 300px;
}

.offer-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.offer-image::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.8),
        rgba(0,0,0,0.05)
    );
}

.offer-image-content {
    position: absolute;
    bottom: 35px;
    left: 30px;
    right: 20px;
    color: #fff;
    z-index: 2;
}

.offer-image-content span {
    background: #dc3545;
    padding: 7px 12px;
    border-radius: 5px;
    font-size: 12px;
    font-weight: 700;
}

.offer-image-content h2 {
    margin-top: 15px;
    font-size: 30px;
    font-weight: 700;
}

.offer-image-content p {
    margin-bottom: 0;
}

.offer-form {
    padding: 35px;
}

.offer-form h2 {
    font-weight: 700;
    margin-bottom: 5px;
}

.offer-form > p {
    color: #777;
    margin-bottom: 25px;
}

.offer-form label {
    font-weight: 600;
    margin-bottom: 6px;
}

.offer-form .form-control,
.offer-form .form-select {
    height: 46px;
    border-radius: 7px;
}

.offer-form textarea.form-control {
    height: auto;
}

.offer-submit {
    width: 100%;
    border: 0;
    background: #111827;
    color: #fff;
    padding: 13px;
    border-radius: 7px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
}

.offer-submit:hover {
    background: #000;
}


/* MOBILE */
@media(max-width: 767px) {

    .offer-overlay {
        padding: 10px;
        overflow-y: auto;
    }

    .offer-modal {
        margin: 20px 0;
    }

    .offer-image {
        min-height: 220px;
    }

    .offer-image img {
        min-height: 220px;
    }

    .offer-image-content {
        bottom: 20px;
        left: 20px;
    }

    .offer-image-content h2 {
        font-size: 22px;
    }

    .offer-form {
        padding: 25px 20px;
    }
}

 .card-dark {
      background-color: #132238;
      border: 1px solid #1e2f47;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
    }

    .kpi-card {
      border-left: 4px solid transparent;
      transition: transform 0.2s;
    }
    .kpi-card:hover {
      transform: translateY(-3px);
    }
    .border-yellow { border-left-color: #f59e0b !important; }
    .border-teal { border-left-color: #14b8a6 !important; }
    .border-blue { border-left-color: #3b82f6 !important; }
    .border-green { border-left-color: #22c55e !important; }

    .text-yellow { color: #f59e0b; }
    .text-teal { color: #14b8a6; }
    .text-blue { color: #3b82f6; }
    .text-green { color: #22c55e; }
    .text-red { color: #ef4444; }

    .nav-pills .nav-link {
      color: #94a3b8;
      background-color: #132238;
      border: 1px solid #1e2f47;
      margin-right: 8px;
      border-radius: 8px;
      font-weight: 500;
    }
    .nav-pills .nav-link.active {
      background-color: #2563eb;
      color: #fff;
    }

    /* Custom Progress Bar Styling */
    .progress-bg {
      background-color: #1e2f47;
      height: 10px;
      border-radius: 5px;
      overflow: hidden;
    }
    .progress-bar-yellow { background-color: #f59e0b; }
    .progress-bar-teal { background-color: #14b8a6; }
    .progress-bar-blue { background-color: #3b82f6; }
    .progress-bar-green { background-color: #22c55e; }
    .progress-bar-red { background-color: #ef4444; }

    .checklist-item {
      padding: 8px 0;
      border-bottom: 1px solid #1e2f47;
      font-size: 0.95rem;
    }
    .checklist-item:last-child {
      border-bottom: none;
    }

    .card-dark {
      background-color: #132238;
      border: 1px solid #1e2f47;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
      color: #ffffff;
    }

    /* KPI Cards Top Border Colors */
    .kpi-card {
      border-left: 4px solid transparent;
      transition: transform 0.2s;
    }
    .kpi-card:hover {
      transform: translateY(-3px);
    }
    .border-yellow { border-left-color: #f59e0b !important; }
    .border-teal { border-left-color: #14b8a6 !important; }
    .border-red { border-left-color: #ef4444 !important; }
    .border-blue { border-left-color: #3b82f6 !important; }
    .border-green { border-left-color: #22c55e !important; }

    /* Accent Text Colors */
    .text-yellow { color: #f59e0b; }
    .text-teal { color: #14b8a6; }
    .text-red { color: #ef4444; }
    .text-blue { color: #3b82f6; }
    .text-green { color: #22c55e; }
    .text-light-muted { color: #cbd5e1 !important; }

    /* Navigation Tabs */
    .nav-pills .nav-link {
      color: #ffffff;
      background-color: #132238;
      border: 1px solid #1e2f47;
      margin-right: 8px;
      border-radius: 8px;
      font-weight: 500;
    }
    .nav-pills .nav-link.active {
      background-color: #2563eb;
      color: #ffffff;
    }

    /* Custom Progress Bar Styling */
    .progress-bg {
      background-color: #1e2f47;
      height: 10px;
      border-radius: 5px;
      overflow: hidden;
    }
    .progress-bar-yellow { background-color: #f59e0b; }
    .progress-bar-teal { background-color: #14b8a6; }
    .progress-bar-blue { background-color: #3b82f6; }
    .progress-bar-green { background-color: #22c55e; }

    /* Flow Step Pills for Control Flow */
    .flow-step {
      background-color: #1e2f47;
      border: 1px solid #2d4363;
      border-radius: 8px;
      padding: 12px 16px;
      font-weight: 600;
      color: #ffffff;
      text-align: center;
      min-width: 140px;
    }

    /* Checklist Item Rows */
    .checklist-item {
      padding: 10px 0;
      border-bottom: 1px solid #1e2f47;
      font-size: 0.95rem;
      color: #ffffff;
    }
    .checklist-item:last-child {
      border-bottom: none;
    }

    </style>

    <style>
    .dark-section {
        overflow-x: hidden;
    }

    .dashboard-wrapper {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
    }

    .nav-pills {
        flex-wrap: wrap;
        gap: 5px;
    }

    .nav-pills .nav-link {
        white-space: nowrap;
    }

    .card-dark {
        overflow: hidden;
    }

    .progress-bg {
        width: 100%;
        overflow: hidden;
    }

    @media (max-width: 991px) {
        .d-flex.justify-content-between.align-items-center {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 15px;
        }

        .nav-pills {
            width: 100%;
            overflow-x: auto;
            flex-wrap: nowrap;
            padding-bottom: 5px;
        }

        .nav-pills .nav-link {
            flex-shrink: 0;
        }
    }
</style>

  <style>
        :root {
            --bg-dark: #070d18;
            --card-bg: #112239;
            --card-hover-bg: #172c47;
            --accent-yellow: #f59e0b;
            --accent-teal: #10b981;
            --accent-blue: #3b82f6;
            --accent-green: #22c55e;
            --text-title: #ffffff;
            --text-subtitle: #94a3b8;
            --text-muted: #cbd5e1;
        }


        .slide-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        .section-header {
            margin-bottom: 35px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 20px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.5px;

            position: relative;
            text-align: center;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -21px;
            width: 70px;
            height: 4px;
            background-color: var(--accent-yellow);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-subtitle);
            margin-top: 12px;
            font-weight: 400;
        }

        .custom-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 28px 24px;
            height: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .custom-card:hover {
            transform: translateY(-4px);
            background-color: var(--card-hover-bg);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.5);
            border-color: rgba(255, 255, 255, 0.15);
        }

        /* Left accent borders */
        .border-accent-yellow {
            border-left: 6px solid var(--accent-yellow) !important;
        }

        .border-accent-teal {
            border-left: 6px solid var(--accent-teal) !important;
        }

        .border-accent-blue {
            border-left: 6px solid var(--accent-blue) !important;
        }

        .border-accent-green {
            border-left: 6px solid var(--accent-green) !important;
        }

        .card-title-lg {
            font-size: 1.45rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .card-desc-lg {
            font-size: 1.05rem;
            color: var(--text-subtitle);
            line-height: 1.5;
            margin-bottom: 0;
        }

        .career-staircase {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-end;
            justify-content: space-between;
            padding: 30px 0;
        }

        .stair-step {
            flex: 1 1 18%;
            min-width: 220px;
        }

        .stair-step-1 { transform: translateY(0px); }
        .stair-step-2 { transform: translateY(-15px); }
        .stair-step-3 { transform: translateY(-30px); }
        .stair-step-4 { transform: translateY(-45px); }
        .stair-step-5 { transform: translateY(-60px); }

        @media (max-width: 991px) {
            .stair-step-1, .stair-step-2, .stair-step-3, .stair-step-4, .stair-step-5 {
                transform: translateY(0);
            }
        }

        .career-support-banner {
            background: linear-gradient(90deg, #0d2342 0%, #13325c 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 16px;
            padding: 24px 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .support-label {
            color: var(--accent-yellow);
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .support-items {
            color: #e2e8f0;
            font-size: 1.15rem;
            font-weight: 500;
        }

        .support-bullet {
            color: var(--accent-blue);
            margin: 0 12px;
        }

        /* Slide Number Badge */
        .slide-badge {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--accent-yellow);
            background: rgba(245, 158, 11, 0.1);
            padding: 6px 16px;
            border-radius: 20px;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
    </style>
  <style>
    /* Toast Alert Container */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fafbfc;
            color: #2b2f38;
            -webkit-font-smoothing: antialiased;
        }

        .section-heading {
            color: #111827;
            font-weight: 700;
            font-size: 2.25rem;
            letter-spacing: -0.02em;
        }

        .section-subtitle {
            color: #4b5563;
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
        }

        .icon-badge {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 10px;
            background-color: #fff9eb;
            border: 1px solid #fce7f300;
            color: #d97706;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 1px 2px rgba(217, 119, 6, 0.08);
        }

        .feature-title {
            font-weight: 700;
            font-size: 1.125rem;
            color: #111827;
            margin-bottom: 0.35rem;
        }

        .feature-desc {
            color: #4b5563;
            font-size: 0.95rem;
            line-height: 1.55;
            margin-bottom: 0;
        }

        .btn-amber {
            background-color: #f59e0b;
            color: #ffffff;
            font-weight: 700;
            font-size: 1rem;
            padding: 0.85rem 1.75rem;
            border-radius: 8px;
            border: none;
            transition: all 0.25s ease-in-out;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.25);
        }

        .btn-amber:hover {
            background-color: #d97706;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.35);
        }

        .btn-amber:active {
            transform: translateY(0);
        }

        /* Hero Image Container Styling */
        .image-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .main-course-img {
            border-radius: 20px;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.07), 0 0 2px rgba(0, 0, 0, 0.05);
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Floating Stat Card Badge */
        .floating-badge {
            position: absolute;
            bottom: -20px;
            left: -20px;
            background: #ffffff;
            border-radius: 14px;
            padding: 0.85rem 1.35rem;
            box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.12), 0 4px 10px -2px rgba(0, 0, 0, 0.04);
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 10;
            border: 1px solid rgba(0, 0, 0, 0.03);
            animation: floatSlow 4s ease-in-out infinite alternate;
        }

        @keyframes floatSlow {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-6px); }
        }

        .badge-icon-circle {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background-color: #d1fae5;
            color: #059669;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .badge-label {
            font-size: 0.825rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 0.15rem;
        }

        .badge-value {
            font-size: 1.2rem;
            font-weight: 800;
            color: #f59e0b;
            line-height: 1.1;
        }

        @media (max-width: 991.98px) {
            .floating-badge {
                bottom: 15px;
                left: 15px;
            }
            .section-heading {
                font-size: 1.85rem;
            }
        }
    </style>
      <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fafbfc;
            color: #1f2937;
            padding-bottom: 3rem;
        }

        .section-title {
            font-weight: 700;
            color: #1a202c;
            letter-spacing: -0.5px;
        }

        /* Card Custom Styling */
        .program-card {
            border: none;
            border-radius: 18px;
            position: relative;
            overflow: hidden;
            min-height: 230px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            cursor: pointer;
        }

        .program-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        .card-number-label {
            font-size: 0.85rem;
            font-weight: 500;
            opacity: 0.8;
            margin-bottom: 0.25rem;
            text-transform: lowercase;
        }

        .card-title-text {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }

        .card-desc-text {
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.45;
            padding-right: 25%; /* Space for bottom right graphic on wide screens */
            z-index: 2;
            position: relative;
        }

        /* Circular Illustration Container at Bottom Right */
        .illustration-badge {
            position: absolute;
            bottom: -8px;
            right: -8px;
            width: 110px;
            height: 110px;
            background-color: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            box-shadow: -2px -2px 10px rgba(0, 0, 0, 0.03);
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .program-card:hover .illustration-badge {
            transform: scale(1.08);
        }

        .illustration-badge svg {
            width: 100%;
            height: 100%;
        }

        /* Specific Card Color Schemes */
        /* Card 1: Peach / Soft Pink */
        .card-theme-1 {
            background-color: #FCE4DB;
            color: #8A3B22;
        }
        .card-theme-1 .card-number-label { color: #a24b30; }

        /* Card 2: Soft Slate Grey */
        .card-theme-2 {
            background-color: #A3A8A9;
            color: #222829;
        }
        .card-theme-2 .card-number-label { color: #3d4344; }

        /* Card 3: Soft Light Blue / Cyan */
        .card-theme-3 {
            background-color: #B4ECF8;
            color: #0F525E;
        }
        .card-theme-3 .card-number-label { color: #166a7a; }

        /* Card 4: Light Lime / Olive */
        .card-theme-4 {
            background-color: #E2EB98;
            color: #4A580D;
        }
        .card-theme-4 .card-number-label { color: #5f7013; }

        /* Card 5: Soft Purple */
        .card-theme-5 {
            background-color: #B692DB;
            color: #3C1961;
        }
        .card-theme-5 .card-number-label { color: #522780; }

        /* Card 6: Peach Coral */
        .card-theme-6 {
            background-color: #FCDCD3;
            color: #8A3A25;
        }
        .card-theme-6 .card-number-label { color: #a34830; }

        /* Card 7: Blue Grey */
        .card-theme-7 {
            background-color: #83B2C9;
            color: #123345;
        }
        .card-theme-7 .card-number-label { color: #1c4961; }

        /* Card 8: Vibrant Lime Green */
        .card-theme-8 {
            background-color: #BFD858;
            color: #3F5007;
        }
        .card-theme-8 .card-number-label { color: #52690a; }

        /* Card 9: Soft Amber Gold */
        .card-theme-9 {
            background-color: #FEE199;
            color: #694800;
        }
        .card-theme-9 .card-number-label { color: #875e02; }

        /* Card 10: Soft Mint Teal */
        .card-theme-10 {
            background-color: #A4E5D9;
            color: #094C41;
        }
        .card-theme-10 .card-number-label { color: #0d6355; }
    </style>


    <style>
        /*  new update */
    body {
      background-color: #f8f9fa;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      color: #212529;
    }

    .section-title {
      font-weight: 800;
      letter-spacing: -0.5px;
      color: #111827;
    }

    .section-subtitle {
      color: #6b7280;
      font-size: 1.05rem;
      max-width: 650px;
      margin: 0 auto;
    }

    .project-card {
      background: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 16px;
      padding: 1.75rem;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
    }

    .project-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.08);
      border-color: #d1d5db;
    }

    .project-card-highlight {
      border: 2px solid #f59e0b;
      background: linear-gradient(180deg, #fffbeb 0%, #ffffff 100%);
      box-shadow: 0 10px 25px -5px rgba(245, 158, 11, 0.12);
    }

    .icon-box {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 1.35rem;
      margin-bottom: 1.25rem;
      background-color: #f3f4f6;
      color: #374151;
      transition: all 0.3s ease;
    }

    .project-card-highlight .icon-box-orange {
      background: #f59e0b;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }

    .card-title-custom {
      font-size: 1.05rem;
      font-weight: 700;
      letter-spacing: 0.5px;
      color: #111827;
      margin-bottom: 0.75rem;
      text-transform: uppercase;
    }

    .card-text-custom {
      font-size: 0.935rem;
      line-height: 1.6;
      color: #4b5563;
    }

    .highlight-badge {
      position: absolute;
      top: -12px;
      right: 20px;
      background: #f59e0b;
      color: #ffffff;
      font-size: 0.7rem;
      font-weight: 700;
      text-transform: uppercase;
      padding: 3px 10px;
      border-radius: 20px;
      letter-spacing: 0.8px;
    }

    .btn-amber {
      background-color: #f59e0b;
      color: #ffffff;
      border: none;
      font-weight: 600;
      padding: 0.6rem 1.25rem;
      border-radius: 10px;
      transition: all 0.2s ease;
    }

    .btn-amber:hover {
      background-color: #d97706;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }
  </style>



     <style>
    :root {
      --brand-red: #e53935;
      --brand-blue: #026aa7;
      --card-border-radius: 8px;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #fbfbfb;
      color: #4a4a4a;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* Heading Styling */
    .title-wrapper {
      text-align: center;
      margin-bottom: 3.5rem;
    }

    .main-title {
      font-family: 'Montserrat', sans-serif;
      font-weight: 800;
      font-size: 2.25rem;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: #111111;
      display: inline-block;
      margin-bottom: 0.5rem;
    }

    .main-title span.highlight-red {
      color: var(--brand-red);
    }

    /* Title Decorative Underline */
    .title-underline {
      width: 50px;
      height: 2px;
      background-color: var(--brand-red);
      margin: 0 auto;
      position: relative;
    }

    .title-underline::after {
      content: '';
      position: absolute;
      top: -3px;
      left: 50%;
      transform: translateX(-50%);
      width: 25px;
      height: 2px;
      background-color: var(--brand-red);
    }

    /* Card Styles */
    .solution-card {
      background-color: #ffffff;
      border: 1px solid var(--brand-red);
      border-radius: var(--card-border-radius);
      padding: 2.25rem 1.75rem;
      text-align: center;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .solution-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 20px rgba(229, 57, 53, 0.1);
    }

    .solution-card .card-icon {
      font-size: 2.5rem;
      color: var(--brand-red);
      margin-bottom: 1.25rem;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .solution-card .card-title {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 1.15rem;
      color: #111111;
      margin-bottom: 0.85rem;
    }

    .solution-card .card-text {
      font-size: 0.92rem;
      line-height: 1.6;
      color: #555555;
      font-weight: 400;
    }

    /* Highlighted Blue Card */
    .solution-card.card-highlight-blue {
      background-color: var(--brand-blue);
      border-color: var(--brand-blue);
      color: #ffffff;
    }

    .solution-card.card-highlight-blue:hover {
      box-shadow: 0 10px 25px rgba(2, 106, 167, 0.3);
    }

    .solution-card.card-highlight-blue .card-icon,
    .solution-card.card-highlight-blue .card-title,
    .solution-card.card-highlight-blue .card-text {
      color: #ffffff;
    }

    .solution-card.card-highlight-blue .card-icon {
      font-size: 2.2rem;
      border: 2px solid #ffffff;
      border-radius: 50%;
      width: 52px;
      height: 52px;
      line-height: 52px;
      padding: 0;
    }

    /* Floating Buttons */
    .whatsapp-btn {
      position: fixed;
      bottom: 25px;
      left: 25px;
      width: 54px;
      height: 54px;
      background-color: #25d366;
      color: #ffffff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.85rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
      z-index: 1000;
      text-decoration: none;
      transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .whatsapp-btn:hover {
      background-color: #20ba5a;
      color: #ffffff;
      transform: scale(1.08);
    }

    .scroll-btn {
      position: fixed;
      bottom: 25px;
      right: 25px;
      width: 44px;
      height: 44px;
      background-color: #e0e0e0;
      color: #888888;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      z-index: 1000;
      text-decoration: none;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .scroll-btn:hover {
      background-color: var(--brand-red);
      color: #ffffff;
    }

    @media (max-width: 768px) {
      .main-title {
        font-size: 1.75rem;
      }
      .title-wrapper {
        margin-bottom: 2.25rem;
      }
      .solution-card {
        padding: 1.75rem 1.25rem;
      }
    }
  </style>
  <style>
       /*  new abi */
    /* Section & Title Styling */
    .title-wrapper {
      text-align: center;
      margin-bottom: 2rem;
    }
    .section-title {
      font-weight: 800;
      letter-spacing: 1px;
      color: #111;
    }
    .highlight-red {
      color: #e63946;
    }
    .title-underline {
      width: 50px;
      height: 3px;
      background-color: #e63946;
      margin: 8px auto 0;
    }

    /* CAROUSEL OVERFLOW & CUT-OFF FIX */
    #coursesCarousel,
    #coursesCarousel .carousel-inner,
    #coursesCarousel .carousel-item {
      overflow: visible !important; /* Top Cut-off fix */
    }

    #coursesCarousel {
      padding-top: 60px; /* Floating Icon ke liye upar ekstra space */
      padding-bottom: 40px;
    }

    /* CARD CONTAINER */
    .card-wrapper {
      position: relative;
      height: 100%;
    }

    .course-card {
      background: #ffffff;
      border-radius: 8px;
      padding: 65px 20px 25px 20px; /* Top padding 65px taaki content icon ke niche aaye */
      text-align: center;
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-width: 2px;
      border-style: solid;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: visible !important;
    }

    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* CIRCULAR AVATAR OVERLAPPING FIX */
    .avatar-circle {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      position: absolute;
      top: -45px; /* Half floating outside top border */
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      font-size: 2.2rem;
      font-weight: bold;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      z-index: 100;
    }

    /* COLOR BORDERS & BG COLORS */
    .border-card-red { border-color: #d32f2f; }
    .bg-avatar-red { background-color: #8b0000; }

    .border-card-green { border-color: #2e7d32; }
    .bg-avatar-green { background-color: #388e3c; }

    .border-card-yellow { border-color: #fbc02d; }
    .bg-avatar-yellow { background-color: #fbc02d; color: #222; }

    .border-card-blue { border-color: #1976d2; }
    .bg-avatar-blue { background-color: #1976d2; }

    .border-card-cyan { border-color: #00acc1; }
    .bg-avatar-cyan { background-color: #00acc1; }

    .border-card-purple { border-color: #7b1fa2; }
    .bg-avatar-purple { background-color: #7b1fa2; }

    /* CARD CONTENT STYLING */
    .course-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 8px;
    }

    .title-accent-line {
      width: 30px;
      height: 3px;
      background-color: #e63946;
      margin: 0 auto 15px auto;
    }

    .course-description {
      font-size: 0.9rem;
      color: #666;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    /* BUTTON STYLING */
    .btn-read-more {
      display: inline-block;
      background-color: #e63946;
      color: #ffffff;
      padding: 8px 22px;
      border-radius: 4px;
      font-size: 0.88rem;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.2s ease;
      align-self: center;
    }

    .btn-read-more:hover {
      background-color: #c92a37;
      color: #ffffff;
    }

    /* NAVIGATION ARROWS FIX */
    .carousel-control-prev,
    .carousel-control-next {
      width: 40px;
      height: 40px;
      background-color: #e63946;
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      opacity: 0.85;
      z-index: 105;
    }

    .carousel-control-prev { left: -50px; }
    .carousel-control-next { right: -50px; }

    @media (max-width: 992px) {
      .carousel-control-prev { left: -15px; }
      .carousel-control-next { right: -15px; }
    }
  </style>
   <style>
/* Section & Title Styling */
    /* Main Syllabus Card Styling */
    .syllabus-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 3rem 2rem;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.07);
      border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .syllabus-title {
      font-size: 2.25rem;
      font-weight: 800;
      color: #111827;
      letter-spacing: -0.5px;
    }

    .syllabus-subtitle {
      color: #374151;
      font-size: 1.05rem;
      max-width: 650px;
      margin: 0 auto;
      line-height: 1.6;
      font-weight: 500;
    }

    /* Orange Gradient CTA Button */
    .btn-download {
      background: linear-gradient(180deg, #f97316 0%, #ea580c 100%);
      color: #ffffff;
      font-weight: 700;
      font-size: 1.05rem;
      padding: 0.85rem 2rem;
      border-radius: 10px;
      border: none;
      box-shadow: 0 6px 18px rgba(234, 88, 12, 0.3);
      transition: all 0.25s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
    }

    .btn-download:hover {
      background: linear-gradient(180deg, #ea580c 0%, #c2410c 100%);
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 8px 22px rgba(234, 88, 12, 0.4);
    }

    /* Badge Text */
    .badge-learners {
      color: #d97706;
      font-weight: 600;
      font-size: 0.95rem;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
    }

    /* Bottom 3 Feature Cards */
    .feature-card {
      background: #ffffff;
      border-radius: 14px;
      padding: 1.75rem;
      height: 100%;
      border: 1px solid #e5e7eb;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
      border-color: #cbd5e1;
    }

    .feature-icon-box {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 1.35rem;
      margin-bottom: 1rem;
    }

    .icon-orange { background: #fff7ed; color: #ea580c; }
    .icon-blue   { background: #eff6ff; color: #2563eb; }
    .icon-green  { background: #f0fdf4; color: #16a34a; }

    .feature-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #111827;
      margin-bottom: 0.5rem;
    }

    .feature-desc {
      font-size: 0.925rem;
      color: #6b7280;
      line-height: 1.5;
      margin-bottom: 0;
    }
  </style>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Timeline Container Position Setup */
        .timeline-container {
            position: relative;
        }

        /* Connecting Line - Icons ke exact center mein set hai */
        .timeline-line {
            position: absolute;
            top: 40px; /* 80px icon wrapper ka half height */
            left: 8%;
            right: 8%;
            height: 3px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            z-index: 1;
            transform: translateY(-50%);
        }

        /* Step Item Base Alignment */
        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        /* Outer Icon Circle Wrapper */
        .icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #ffffff; /* Solid white tabhi piche ki line chhup sake */
            border: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .step-item:hover .icon-wrapper {
            border-color: #6366f1;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.2);
        }

        /* Inner Icon Alignment */
        .icon-inner {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-inner i {
            font-size: 26px;
            color: #4f46e5;
        }

        /* Step Typography */
        .step-number {
            font-size: 0.9rem;
            font-weight: 700;
            color: #6366f1;
            margin-bottom: 4px;
        }

        .step-title {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            color: #1e293b;
        }

        .step-desc {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.4;
            max-width: 200px;
            margin: 0 auto;
        }

        /* CTA Button Styling */
        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #4f46e5, #06b6d4);
            color: #ffffff;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
        }

        .btn-cta:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }
    </style>


     <style>
    /* Card Custom Styling */
    .offer-card {
      border: 1px solid #333333; /* Dark border[cite: 1] */
      border-radius: 16px;       /* Smooth rounded corners[cite: 1] */
      padding: 24px 20px;       /* Inner padding[cite: 1] */
      background-color: #ffffff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); /* Soft shadow[cite: 1] */
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .offer-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .offer-card .card-title {
      font-weight: 600;
      color: #111827;
      margin-bottom: 12px;
      font-size: 1.25rem;
    }

    .offer-card .card-text {
      color: #374151;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    .section-title {
      font-weight: 700;
      color: #0d233a; /* Dark blueish tone[cite: 1] */
      margin-bottom: 45px;
    }

    /* Custom Chart Icon Box */
    .chart-box {
      background-color: #0b1b33; /* Dark navy background from image */
      border-radius: 12px;
      width: 100%;
      max-width: 180px;
      height: 75px;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding: 12px 14px;
      gap: 8px;
      margin-bottom: 20px;
    }

    /* Individual Custom Bars */
    .chart-bar {
      border-radius: 6px;
      width: 20%;
    }

    .bar-1 {
      height: 30%;
      background-color: #e5b048; /* Yellow/Gold */
    }

    .bar-2 {
      height: 50%;
      background-color: #0b8b9b; /* Teal/Cyan[cite: 2] */
    }

    .bar-3 {
      height: 70%;
      background-color: #5b9bd5; /* Blue[cite: 2] */
    }

    .bar-4 {
      height: 95%;
      background-color: #e5b048; /* Yellow/Gold[cite: 2] */
    }
  </style>
<style>
    /* Trainer Card Custom Styles */
.trainer-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.trainer-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12) !important;
}

.trainer-img {
    height: 240px;
    object-fit: cover;
    object-position: top;
}

.social-icon {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.social-icon:hover {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #000;
}

.trainer-img {
    height: 250px; /* Ya jo height aapko sahi lage */
    object-fit: cover;
    width: 100%;
}


</style>



<style>
        /* Certificate Box Styling */
        .cert-card-container {
            position: relative;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        /* Certificate Background Image Overlay */
        .cert-bg-image {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Policy Cards Styling */
        .policy-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .policy-card:hover {
            transform: translateY(-3px);
        }

        .card-amber {
            border-top: 5px solid #ffc107;
            background: #fffdf5;
        }

        .card-teal {
            border-top: 5px solid #20c997;
            background: #f4fbf9;
        }

        /* Editable Input Fields Over Image */
        .editable-field {
            background: rgba(255, 255, 255, 0.7);
            border: 1px dashed #0d6efd;
            border-radius: 4px;
            padding: 2px 6px;
            transition: all 0.2s ease-in-out;
        }

        .editable-field:focus {
            background: #ffffff;
            outline: none;
            border-style: solid;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
        }
    </style>




 <style>
        :root {
            --header-bg: #071D33;
            --page-bg: #F4F6F8;
            --accent-gold: #D8A552;
            --accent-gold-hover: #C59341;
            --accent-teal: #0D828A;
            --card-border-radius: 16px;
            --text-dark: #1E293B;
            --text-muted: #64748B;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--page-bg);
            color: var(--text-dark);
        }

        /* Header Section */
        .header-banner {
            background-color: var(--header-bg);
            color: #ffffff;
            padding: 2.5rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .header-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: clamp(1.6rem, 3vw, 2.3rem);
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .header-title span.number {
            color: #ffffff;
            opacity: 0.9;
        }

        .header-subtitle {
            color: var(--accent-gold);
            font-size: 0.95rem;
            font-weight: 500;
            margin: 0;
        }

        /* Card Styles */
        .custom-card {
            background: #ffffff;
            border-radius: var(--card-border-radius);
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            padding: 2.25rem;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        /* Hover animation and extra shadow removed from cards */
        .custom-card:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
        }

        /* Top Accent Bars for Right Cards */
        .accent-top-gold {
            border-top: 6px solid var(--accent-gold);
        }

        .accent-top-teal {
            border-top: 6px solid var(--accent-teal);
        }

        /* Card Titles */
        .card-heading {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.25rem;
            color: #0A192F;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        /* Custom Form Inputs */
        .form-floating > .form-control,
        .form-floating > .form-select {
            border: none;
            border-bottom: 1.5px solid #CBD5E1;
            border-radius: 0;
            background-color: transparent;
            padding-left: 2rem;
            font-size: 0.95rem;
            color: #334155;
            transition: border-color 0.25s ease;
        }

        .form-floating > label {
            padding-left: 2rem;
            color: #64748B;
            font-size: 0.9rem;
        }

        .form-floating > .form-control:focus,
        .form-floating > .form-select:focus {
            border-bottom-color: var(--accent-gold);
            box-shadow: none;
            background-color: transparent;
        }

        .input-icon {
            position: absolute;
            left: 0.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 1rem;
            z-index: 5;
            transition: color 0.25s ease;
        }

        .form-floating:focus-within .input-icon {
            color: var(--accent-gold);
        }

        /* Submit Button */
        .btn-submit {
            background-color: var(--accent-gold);
            color: #1E293B;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 0.95rem;
            padding: 0.85rem 1.5rem;
            border-radius: 12px;
            border: none;
            width: 100%;
            box-shadow: 0 4px 12px rgba(216, 165, 82, 0.3);
        }

        /* Hover animation/transform removed from submit button */
        .btn-submit:hover {
            background-color: var(--accent-gold-hover);
            color: #000;
            box-shadow: 0 4px 12px rgba(216, 165, 82, 0.3);
        }

        /* Information Text */
        .info-text {
            color: #64748B;
            font-size: 0.95rem;
            line-height: 1.65;
            margin: 0;
        }

        /* Floating Sticky WhatsApp Quick Button */
        .floating-whatsapp {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: #FFF;
            border-radius: 50px;
            padding: 12px 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            z-index: 1000;
        }

        /* Hover animation/transform removed from floating whatsapp button */
        .floating-whatsapp:hover {
            background-color: #20ba5a;
            color: #FFF;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
        }

        .floating-whatsapp i {
            font-size: 1.4rem;
        }

        /* Success Alert Toast Animation */
        .alert-success-custom {
            display: none;
            background-color: #ECFDF5;
            border: 1px solid #A7F3D0;
            color: #065F46;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>



    <style>
        :root {
            --bs-body-font-family: 'Inter', sans-serif;
            --bs-primary: #0d6efd;
            --bs-primary-rgb: 13, 110, 253;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Poppins', sans-serif;
        }

        /* Card Enhancements */
        .feature-card {
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: box-shadow 0.25s ease;
        }

        .feature-icon-box {
            width: 44px;
            height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            flex-shrink: 0;
        }

        /* Responsive typography adjustments */
        .fs-7 {
            font-size: 0.825rem;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }
    </style>
<style>
    .se-hero {
        background: radial-gradient(circle at 20% 10%, #0a2748 0%, #001428 55%, #000d1c 100%);
        padding: 36px 0;
    }

    .se-frame {
        position: relative;
        margin: 0 auto;
        max-width: 1320px;
    }

    .se-frame-inner {
        padding: 48px 56px 80px;
        min-height: 520px;
        display: flex;
        align-items: center;
    }

    .se-logo {
        width: 100%;
        max-width: 320px;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        background: #001a33;
        display: block;
    }

    .se-title {
        color: #fff;
        font-weight: 800;
        letter-spacing: .5px;
        font-size: clamp(1.8rem, 3.6vw, 2.8rem);
        margin-bottom: 8px;
    }

    .se-sub {
        color: #c9a227;
        font-size: clamp(1.05rem, 1.8vw, 1.35rem);
        margin-bottom: 14px;
    }

    .se-line {
        width: 90px;
        height: 3px;
        background: #c9a227;
        margin-bottom: 28px;
    }

    .se-topics {
        color: #9cc3e6;
        font-weight: 700;
        font-size: clamp(1.1rem, 2vw, 1.5rem);
        line-height: 1.45;
        margin-bottom: 22px;
    }

    .se-tags {
        color: #c9a227;
        font-weight: 700;
        font-size: .72rem;
        letter-spacing: .6px;
        margin-bottom: 30px;
    }

    .se-card {
        background: #0a2b4a;
        border: 1px solid #c9a227;
        border-radius: 18px;
        padding: 16px 10px;
        text-align: center;
        height: 100%;
    }

    .se-card b {
        display: block;
        color: #c9a227;
        font-size: .95rem;
        margin-bottom: 8px;
    }

    .se-card span {
        color: #fff;
        font-size: .75rem;
    }

    .se-brand {
        color: #fff;
        font-weight: 700;
        font-size: .85rem;
        margin-top: 28px;
    }

    .se-btn-gold {
        background: #c9a227;
        border: 0;
        color: #001428;
        font-weight: 700;
    }

    .se-btn-gold:hover { background: #e0b933; color: #001428; }

    .se-btn-line {
        border: 1px solid #c9a227;
        color: #c9a227;
    }

    .se-btn-line:hover { background: #c9a227; color: #001428; }

    .se-hero .carousel-indicators { margin-bottom: 22px; }

    .se-hero .carousel-indicators [data-bs-target] {
        width: 34px;
        height: 4px;
        border: 0;
        background-color: #c9a227;
        opacity: .35;
    }

    .se-hero .carousel-indicators .active { opacity: 1; }

    .se-hero .carousel-control-prev,
    .se-hero .carousel-control-next {
        width: 48px;
        height: 48px;
        top: 50%;
        bottom: auto;
        transform: translateY(-50%);
        background: rgba(201, 162, 39, .15);
        border: 1px solid #c9a227;
        border-radius: 50%;
        opacity: 1;
    }

    .se-hero .carousel-control-prev { left: 14px; }

    .se-hero .carousel-control-next { right: 14px; }

    .se-hero .carousel-control-prev-icon,
    .se-hero .carousel-control-next-icon { width: 1rem; height: 1rem; }

    @media (max-width: 575px) {
        .se-card { border-radius: 12px; padding: 12px 4px; }
        .se-card b { font-size: .75rem; letter-spacing: 0; }
        .se-card span { font-size: .65rem; }
    }

    @media (max-width: 991px) {
        .se-frame-inner { padding: 32px 22px 72px; }
        .se-logo { max-width: 220px; margin: 0 auto 24px; }
        .se-hero .carousel-control-prev,
        .se-hero .carousel-control-next { display: none; }
    }
</style>
<style>
    .avatar-circle {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.course-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.course-fallback-icon {
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    font-size: 35px;
}
</style>
<style>
.about-batches-section {
    background: #f8fafc;
    color: #1f2937;
}

.about-content {
    padding: 10px 5px;
}

.about-label,
.batch-eyebrow {
    display: inline-block;
    color: #198754;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
}

.about-heading {
    font-size: clamp(30px, 3vw, 40px);
    line-height: 1.25;
    font-weight: 800;
    color: #172033;
}

.about-heading span {
    display: block;
    color: #198754;
}

.about-subheading {
    color: #172033;
    font-weight: 750;
    font-size: 19px;
}

.about-subheading i {
    color: #198754;
}

.about-text {
    color: #64748b;
    font-size: 15px;
    line-height: 1.85;
}

.highlight-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    height: 100%;
    padding: 13px;
    background: #ffffff;
    border: 1px solid #e5eee8;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    line-height: 1.6;
    transition: all 0.25s ease;
}

.highlight-item i {
    color: #198754;
    font-size: 17px;
    flex-shrink: 0;
}

.highlight-item:hover {
    border-color: #198754;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(25, 135, 84, 0.08);
}

.training-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
}

.training-tags span {
    padding: 8px 12px;
    background: #e8f5ed;
    color: #146c43;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
}

.vision-box {
    padding: 22px;
    background: #ffffff;
    border: 1px solid #e5eee8;
    border-left: 4px solid #198754;
    border-radius: 10px;
}

.vision-box h6 {
    color: #198754;
    font-size: 15px;
    font-weight: 800;
}

.vision-box p {
    color: #64748b;
    font-size: 14px;
    line-height: 1.8;
}

.about-cta {
    padding: 22px;
    border-radius: 12px;
    background: #eaf6ee;
}

.about-cta h5 {
    color: #14532d;
}


/* UPCOMING BATCHES */
.batches-wrapper {
    padding: 24px;
    background: #ffffff;
    border: 1px solid #e8edf0;
    border-radius: 18px;
    box-shadow: 0 12px 40px rgba(15, 23, 42, 0.05);
}

.batch-header-box {
    padding-bottom: 20px;
    border-bottom: 1px solid #e5e7eb;
}

.batch-header-box h2 {
    color: #172033;
    font-size: clamp(23px, 2.5vw, 29px);
    font-weight: 800;
    line-height: 1.35;
}

.batch-header-box h2 i {
    color: #198754;
}

.batch-card {
    padding: 22px;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    background: #ffffff;
    transition: all 0.3s ease;
}

.batch-card:hover {
    border-color: #198754;
    box-shadow: 0 12px 28px rgba(15, 23, 42, 0.07);
    transform: translateY(-3px);
}

.batch-icon {
    width: 56px;
    height: 56px;
    min-width: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #198754;
    background: #e8f5ed;
    border-radius: 12px;
    font-size: 25px;
}

.payroll-icon {
    color: #0d6efd;
    background: #eaf2ff;
}

.batch-category {
    color: #198754;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.4px;
}

.batch-title {
    color: #172033;
    font-size: 19px;
    font-weight: 800;
    line-height: 1.5;
}

.batch-description {
    margin-bottom: 18px;
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
}

.batch-info {
    display: flex;
    flex-direction: column;
    gap: 12px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 9px;
}

.batch-info > div {
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 5px;
    font-size: 13px;
    line-height: 1.6;
}

.batch-info i {
    margin-right: 5px;
    color: #198754;
    font-size: 16px;
}

.batch-info strong {
    color: #334155;
}

.batch-info span {
    color: #64748b;
}

.batch-info .highlight-date {
    color: #198754;
    font-weight: 700;
}

.batch-contact-box {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: #f0fdf4;
    border: 1px solid #dcfce7;
    border-radius: 12px;
}

.batch-contact-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 46px;
    height: 46px;
    min-width: 46px;
    border-radius: 50%;
    background: #198754;
    color: #ffffff;
    font-size: 20px;
}

.batch-contact-box h5 {
    color: #14532d;
    font-size: 16px;
}

.batch-contact-box p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
}


/* RESPONSIVE */
@media (max-width: 991.98px) {
    .about-content {
        padding: 0;
    }

    .batches-wrapper {
        padding: 20px;
    }
}

@media (max-width: 575.98px) {
    .about-heading {
        font-size: 30px;
    }

    .batches-wrapper {
        padding: 14px;
        border-radius: 12px;
    }

    .batch-card {
        padding: 15px;
    }

    .batch-icon {
        width: 43px;
        height: 43px;
        min-width: 43px;
        font-size: 20px;
    }

    .batch-title {
        font-size: 16px;
    }

    .batch-info {
        padding: 12px;
    }

    .batch-contact-box {
        align-items: flex-start;
        padding: 15px;
    }
}
</style>

<style>
    /* Custom Styles for Header/Navbar */
.main-navbar {
    border-bottom: 1px solid #f0f0f0;
}

/* Nav Link Fonts & Colors */
.custom-nav-link {
    color: #0d2847 !important; /* Dark Navy Color */
    font-weight: 600;
    font-size: 17px;
    padding-left: 12px !important;
    padding-right: 12px !important;
    transition: color 0.2s ease-in-out;

}

/* Active Class for Home (Bright Green Color as in Image) */
.custom-nav-link.active-green {
    color: #38c847 !important;
}

/* Hover State */
.custom-nav-link:hover {
    color: #38c847 !important;
}

/* Hide Default Bootstrap Caret Icon */
.dropdown-toggle::after {
    display: none !important;
}

/* Dropdown Chevron Icon Size & Alignment */
.style-chevron {
    font-size: 12px;
    font-weight: bold;
    vertical-align: middle;
}

/* Dropdown Menu Styling */
.dropdown-menu {
    border-radius: 6px;
    border: 1px solid #eee;
    padding: 8px 0;
}

.dropdown-item {
    font-size: 15px;
    color: #333;
    font-weight: 500;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #38c847;
}
</style>

<style>
        :root {
            --primary-orange: #f36c21;
            --gradient-orange: linear-gradient(135deg, #ff7a18 0%, #af002d 100%);
            --header-orange: linear-gradient(180deg, #f36c21 0%, #e05509 100%);
            --card-bg: #fffbf8;
            --text-dark: #2b2b2b;
            --border-light: #f1e4db;
        }



        /* Title styling */
        .section-title-wrapper {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-weight: 700;
            font-size: 2rem;
            color: #2c3e50;
            display: inline-block;
            position: relative;
        }

        .title-underline {
            width: 100px;
            height: 4px;
            background-color: var(--primary-orange);
            margin: 6px auto 0;
            border-radius: 2px;
        }

        /* Script Font */
        .font-script {
            font-family: 'Dancing Script', cursive;
            color: #e05509;
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* Standard Placement Card */
        .placement-card {
            background-color: var(--card-bg);
            border: 2px solid var(--border-light);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .placement-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(243, 108, 33, 0.2);
            border-color: #f7a278;
        }

        .card-header-banner {
            background: var(--header-orange);
            color: #ffffff;
            text-align: center;
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 1px;
            padding: 8px 0;
            text-transform: uppercase;
        }

        .card-body-content {
            padding: 15px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-grow: 1;
        }

        .avatar-frame {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            margin: 8px 0 12px;
        }

        .avatar-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .student-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1a1a1a;
            margin-bottom: 12px;
        }

        /* Transition badge Croma Campus >> Company */
        .transition-badge {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            margin-bottom: 12px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .transition-badge .arrow {
            color: var(--primary-orange);
            font-weight: 900;
        }

        .role-pill {
            background-color: var(--primary-orange);
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 6px;
            width: 100%;
            margin-bottom: 15px;
            text-align: center;
            line-height: 1.2;
        }

        .college-logo-container {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 45px;
            width: 100%;
            padding: 4px;
        }

        .college-logo-container img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        /* Featured Wide Card Style */
        .featured-card {
            background-color: #fdfbf7;
            border: 2px solid #eddcd0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.06);
            display: flex;
            height: 100%;
            transition: all 0.3s ease;
        }

        .featured-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(243, 108, 33, 0.22);
        }

        .featured-ribbon {
            background: var(--header-orange);
            color: #ffffff;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            padding: 15px 8px;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
        }

        .featured-content {
            padding: 18px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .featured-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .croma-tag {
            color: #0b3c5d;
            font-weight: 800;
        }

        .asia-leading {
            color: #2c3e50;
            font-size: 0.7rem;
        }

        .featured-title-name {
            display: flex;
            flex-direction: column;
        }

        .featured-title-name h3 {
            color: var(--primary-orange);
            font-size: 1.8rem;
            font-weight: 800;
            margin: 0;
            line-height: 1.1;
        }

        .student-full-name {
            font-size: 1.4rem;
            font-weight: 900;
            color: #111;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin: 5px 0 10px;
        }

        .placed-at-label {
            font-size: 0.7rem;
            color: #666;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .company-brand-box {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }

        .featured-role-badge {
            background-color: #111;
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 12px;
        }

        .photo-frame-featured {
            position: relative;
            width: 100%;
            height: 220px;
            border-radius: 12px;
            overflow: hidden;
            border: 3px solid #ff7a18;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .photo-frame-featured img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .university-overlay-badge {
            position: absolute;
            bottom: 6px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            padding: 4px 10px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            width: 85%;
            text-align: center;
        }

        .announcement-text {
            font-size: 0.72rem;
            color: #444;
            line-height: 1.4;
            margin-top: 10px;
        }

        .announcement-text strong {
            color: #111;
        }

        .future-wish {
            font-weight: 700;
            font-size: 0.8rem;
            color: #2b2b2b;
            margin-top: 8px;
        }

        .footer-website-link {
            font-size: 0.65rem;
            color: #777;
            text-align: right;
            margin-top: 5px;
        }

        /* Custom Scroll/Grid Adjustments for small screens */
        @media (max-width: 991px) {
            .featured-card {
                margin-bottom: 20px;
            }
        }
    </style>

   

    

<style>

/* ===== FOUNDER SECTION ===== */
.founder-section {
    background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    overflow: hidden;
}

.founder-badge {
    display: inline-flex;
    align-items: center;
    background: #fff3cd;
    color: #8a5a00;
    padding: 9px 18px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.founder-main-title {
    color: #172033;
    font-size: clamp(30px, 4vw, 43px);
    font-weight: 800;
    letter-spacing: -1.2px;
}

.founder-main-title span {
    color: #e5a900;
}

.founder-subtitle {
    max-width: 650px;
    color: #64748b;
    font-size: 16px;
    line-height: 1.8;
}

.founder-role {
    display: inline-block;
    color: #b77900;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.8px;
    padding-left: 12px;
    border-left: 3px solid #f2b705;
}

.founder-name {
    font-size: clamp(30px, 4vw, 42px);
    color: #172033;
    font-weight: 800;
    letter-spacing: -1px;
}

.founder-designation {
    color: #64748b;
    font-size: 14px;
    font-weight: 600;
    line-height: 1.9;
}

.founder-designation span {
    color: #e5a900;
    margin: 0 5px;
}

.experience-highlight {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    background: #ffffff;
    padding: 15px 22px;
    border: 1px solid #e8edf4;
    border-radius: 14px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
}

.experience-highlight > i {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff4ce;
    color: #b77900;
    border-radius: 12px;
    font-size: 21px;
}

.experience-highlight strong,
.experience-highlight span {
    display: block;
}

.experience-highlight strong {
    color: #172033;
    font-size: 19px;
    font-weight: 800;
}

.experience-highlight span {
    color: #64748b;
    font-size: 12px;
    margin-top: 3px;
}

.founder-description {
    color: #5c6678;
    font-size: 15px;
    line-height: 1.95;
    margin-bottom: 15px;
}

.skills-heading {
    font-size: 17px;
    color: #172033;
    font-weight: 800;
}

.skills-heading i {
    color: #d99d00;
}

.founder-skills {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.founder-skills span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid #e8edf4;
    border-radius: 8px;
    padding: 10px 13px;
    color: #344054;
    font-size: 12px;
    font-weight: 700;
    transition: all 0.25s ease;
}

.founder-skills span i {
    color: #c28a00;
    font-size: 14px;
}

.founder-skills span:hover {
    background: #fff7df;
    border-color: #f0c54e;
    transform: translateY(-2px);
}

.founder-quote {
    position: relative;
    padding: 23px 25px;
    background: #fff8e5;
    border-left: 4px solid #eab308;
    border-radius: 0 14px 14px 0;
}

.quote-icon {
    color: #d4a000;
    font-size: 22px;
    margin-bottom: 12px;
}

.founder-quote p {
    color: #344054;
    font-size: 15px;
    font-weight: 600;
    font-style: italic;
    line-height: 1.8;
    margin-bottom: 12px;
}

.founder-quote span {
    color: #8a6500;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

/* ===== FOUNDER IMAGE ===== */
.founder-visual {
    position: relative;
    max-width: 460px;
    margin: 0 auto;
    padding: 0 12px 25px 0;
}

.founder-image-frame {
    position: relative;
    min-height: 430px;
    height: 520px;
    overflow: hidden;
    border-radius: 28px;
    background: #e8edf4;
    box-shadow: 0 25px 60px rgba(23, 32, 51, 0.14);
}

.founder-image {
    width: 100%;
    height: 100%;
    min-height: 430px;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.6s ease;
}

.founder-image-frame:hover .founder-image {
    transform: scale(1.04);
}

.founder-image-overlay {
    position: absolute;
    inset: 40% 0 0;
    background: linear-gradient(
        to bottom,
        transparent 0%,
        rgba(15, 23, 42, 0.15) 35%,
        rgba(15, 23, 42, 0.9) 100%
    );
    pointer-events: none;
}

.founder-image-caption {
    position: absolute;
    bottom: 25px;
    left: 24px;
    right: 20px;
    display: flex;
    align-items: center;
    gap: 13px;
    z-index: 2;
}

.caption-icon {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #172033;
    background: #f4c430;
    border-radius: 14px;
    font-size: 20px;
}

.founder-image-caption h5 {
    color: #fff;
    font-size: 18px;
    font-weight: 800;
    margin: 0 0 5px;
}

.founder-image-caption p {
    color: #e2e8f0;
    font-size: 12px;
    margin: 0;
}

.floating-experience {
    position: absolute;
    bottom: 0;
    left: -20px;
    display: flex;
    align-items: center;
    gap: 12px;
    background: #fff;
    padding: 15px 20px;
    border-radius: 15px;
    box-shadow: 0 12px 35px rgba(15, 23, 42, 0.12);
    z-index: 3;
}

.floating-experience > i {
    color: #d9a000;
    font-size: 23px;
}

.floating-experience strong,
.floating-experience span {
    display: block;
}

.floating-experience strong {
    color: #172033;
    font-size: 13px;
    font-weight: 800;
}

.floating-experience span {
    color: #64748b;
    font-size: 11px;
    margin-top: 4px;
}

/* ===== BOTTOM BENEFITS ===== */
.benefit-card {
    height: 100%;
    background: #fff;
    padding: 27px 22px;
    border: 1px solid #edf0f5;
    border-radius: 17px;
    transition: all 0.3s ease;
}

.benefit-card:hover {
    transform: translateY(-6px);
    border-color: #f0ce68;
    box-shadow: 0 15px 35px rgba(23, 32, 51, 0.07);
}

.benefit-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff5d5;
    color: #b98200;
    border-radius: 14px;
    font-size: 21px;
    margin-bottom: 18px;
}

.benefit-card h5 {
    color: #172033;
    font-size: 16px;
    font-weight: 800;
    margin-bottom: 10px;
}

.benefit-card p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
    margin: 0;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 991.98px) {
    .founder-visual {
        max-width: 500px;
        margin-top: 10px;
    }

    .founder-image-frame {
        height: 480px;
    }

    .floating-experience {
        left: -5px;
    }
}

@media (max-width: 575.98px) {
    .founder-section {
        padding-top: 45px !important;
        padding-bottom: 45px !important;
    }

    .founder-main-title {
        letter-spacing: -0.7px;
    }

    .founder-subtitle {
        font-size: 14px;
    }

    .founder-description {
        font-size: 14px;
    }

    .founder-skills {
        gap: 8px;
    }

    .founder-skills span {
        padding: 9px 10px;
        font-size: 11px;
    }

    .founder-image-frame {
        height: 390px;
        min-height: 390px;
        border-radius: 20px;
    }

    .founder-image {
        min-height: 390px;
    }

    .founder-image-caption {
        left: 15px;
        bottom: 18px;
    }

    .founder-image-caption h5 {
        font-size: 15px;
    }

    .floating-experience {
        padding: 12px 14px;
        gap: 9px;
    }

    .founder-quote {
        padding: 20px;
    }
}
</style>

<style>
       
       /* Related Courses */
.section-title {
    font-size: 27px;
    font-weight: 800;
    color: #172554;
    position: relative;
    padding-bottom: 12px;
}

.section-title::after {
    content: "";
    width: 65px;
    height: 4px;
    background: #f59e0b;
    position: absolute;
    bottom: 0;
    left: 0;
    border-radius: 5px;
}

.course-card {
    display: block;
    height: 100%;
    text-decoration: none;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    transition: .3s ease;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(15, 23, 42, .10);
    border-color: #c7d2fe;
}

.card-icon-box {
    height: 115px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.bg-grad-1 { background: linear-gradient(135deg, #ede9fe, #ddd6fe); }
.bg-grad-2 { background: linear-gradient(135deg, #f3e8ff, #e9d5ff); }
.bg-grad-3 { background: linear-gradient(135deg, #e0e7ff, #c7d2fe); }
.bg-grad-4 { background: linear-gradient(135deg, #fae8ff, #f5d0fe); }
.bg-grad-5 { background: linear-gradient(135deg, #dbeafe, #bfdbfe); }
.bg-grad-6 { background: linear-gradient(135deg, #cffafe, #a5f3fc); }

.icon-badge {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6d28d9;
    font-size: 26px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
}

.card-content {
    padding: 15px;
}

.course-title {
    min-height: 54px;
    color: #1e293b;
    font-size: 15px;
    line-height: 1.5;
    font-weight: 700;
}

.rating-box {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 10px;
}

.stars-group {
    color: #f59e0b;
    font-size: 11px;
}

.rating-text {
    font-size: 12px;
    font-weight: 700;
    color: #475569;
}

/* Enquiry Form */
.enquiry-card {
    position: sticky;
    top: 20px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 12px 35px rgba(15, 23, 42, .08);
}

.enquiry-header {
    text-align: center;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e5e7eb;
}

.enquiry-icon {
    width: 55px;
    height: 55px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #eef2ff;
    color: #4f46e5;
    font-size: 23px;
    border-radius: 15px;
    margin-bottom: 12px;
}

.enquiry-header h3 {
    font-size: 23px;
    font-weight: 800;
    color: #172554;
    margin-bottom: 7px;
}

.enquiry-header p {
    font-size: 13px;
    color: #64748b;
    margin-bottom: 0;
}

.enquiry-card .form-label {
    font-size: 13px;
    font-weight: 700;
    color: #334155;
    margin-bottom: 7px;
}

.enquiry-card .form-control,
.enquiry-card .form-select {
    min-height: 45px;
    border: 1px solid #dbe2ea;
    border-radius: 8px;
    font-size: 13px;
    box-shadow: none;
}

.enquiry-card textarea.form-control {
    min-height: auto;
}

.enquiry-card .form-control:focus,
.enquiry-card .form-select:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
}

.enquiry-btn {
    background: #4f46e5;
    color: #fff;
    border: none;
    padding: 13px 15px;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 700;
    transition: .3s ease;
}

.enquiry-btn:hover {
    background: #3730a3;
    color: #fff;
}

.form-note {
    margin: 14px 0 0;
    text-align: center;
    color: #64748b;
    font-size: 11px;
}

@media (max-width: 991.98px) {
    .enquiry-card {
        position: static;
    }
}

@media (max-width: 575.98px) {
    .section-title {
        font-size: 23px;
    }

    .enquiry-card {
        padding: 20px;
    }
}
    </style>

    

    <style>
    

        /* Hero Banner Container */
        .banner-container {
            background-color: #291b3e;
            background-image: radial-gradient(circle at 10% 20%, rgba(83, 48, 136, 0.25) 0%, transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(83, 48, 136, 0.2) 0%, transparent 40%);
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Left Column Heading */
        .banner-heading {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            font-weight: 800;
            font-size: 2.5rem;
            line-height: 1.25;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        /* Form Card */
        .form-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 28px 24px;
            border: 2px solid #a855f7;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-card:hover {
            box-shadow: 0 0 25px rgba(168, 85, 247, 0.4);
        }

        .form-title {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.15rem;
            text-align: center;
            margin-bottom: 22px;
            line-height: 1.4;
        }

        .price-original {
            color: #dc2626;
            text-decoration: line-through;
            font-weight: 600;
        }

        .price-free {
            color: #dc2626;
            font-weight: 800;
        }

        .form-control, .form-select {
            height: 48px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 0.95rem;
            color: #334155;
            padding-left: 14px;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-control:focus, .form-select:focus {
            border-color: #533088;
            box-shadow: 0 0 0 3px rgba(83, 48, 136, 0.15);
        }

        .btn-submit {
            background-color: #533088;
            color: #ffffff;
            font-weight: 700;
            font-size: 1.05rem;
            height: 50px;
            border-radius: 8px;
            border: none;
            width: 100%;
            transition: all 0.2s ease;
            letter-spacing: 0.5px;
        }

        .btn-submit:hover {
            background-color: #432570;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(83, 48, 136, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Certificate Preview Frame */
        .cert-container {
            background: #ffffff;
            border-radius: 4px;
            padding: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            position: relative;
            background-color: #fdfdfd;
            border: 1px solid #e2e8f0;
            user-select: none;
        }

        .cert-inner {
            border: 2px solid #2d3748;
            padding: 16px;
            position: relative;
            background: radial-gradient(circle, #ffffff 60%, #f8fafc 100%);
            overflow: hidden;
        }

        .cert-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 5rem;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.04);
            white-space: nowrap;
            pointer-events: none;
            letter-spacing: 10px;
        }

        .cert-header {
            font-family: 'UnifrakturMaguntia', 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 2px;
            line-height: 1.1;
        }

        .cert-subtitle {
            font-size: 0.6rem;
            text-align: center;
            letter-spacing: 1px;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .cert-name {
            font-size: 1.05rem;
            font-weight: 800;
            text-align: center;
            color: #1a202c;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }

        .cert-body-text {
            font-size: 0.58rem;
            text-align: center;
            color: #4a5568;
            margin-bottom: 4px;
            line-height: 1.2;
        }

        .cert-course {
            font-size: 0.9rem;
            font-weight: 800;
            text-align: center;
            color: #0f172a;
            letter-spacing: 0.5px;
            margin: 4px 0 2px 0;
        }

        .gold-seal {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 42px;
            height: 42px;
            background: radial-gradient(ellipse at center, #f6d365 0%, #fda085 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            border: 2px dashed #b7791f;
        }

        .gold-seal-inner {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid #744210;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.45rem;
            font-weight: 800;
            color: #744210;
            text-align: center;
            line-height: 1;
            text-transform: uppercase;
        }

        .cert-footer {
            margin-top: 12px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            font-size: 0.55rem;
            color: #4a5568;
        }

        .cert-logos {
            display: flex;
            gap: 6px;
            align-items: center;
            margin-top: 6px;
        }

        .cert-logo-badge {
            border: 1px solid #cbd5e1;
            padding: 2px 4px;
            border-radius: 3px;
            font-size: 0.5rem;
            font-weight: 700;
            background: #ffffff;
            color: #334155;
        }

        .cert-signature-line {
            border-top: 1px solid #94a3b8;
            width: 70px;
            margin-top: 2px;
            text-align: center;
            padding-top: 2px;
            font-size: 0.5rem;
        }

        .sig-font {
            font-family: 'Playfair Display', cursive;
            font-style: italic;
            font-size: 0.75rem;
            color: #1e293b;
        }

        /* Responsive Breakpoints Adjustment */
        @media (max-width: 991px) {
            .banner-heading {
                font-size: 2rem;
                text-align: center;
            }
            .banner-container {
                padding: 30px 20px;
            }
        }

        @media (max-width: 576px) {
            .banner-heading {
                font-size: 1.6rem;
            }
            .form-card {
                padding: 20px 16px;
            }
            .cert-header {
                font-size: 1.4rem;
            }
        }
    </style>



     <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fc;
            color: #1a1d20;
        }

        /* Section Title Styling */
        .main-heading {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -0.5px;
            color: #111827;
        }

        .highlight-text {
            color: #5392fd;
        }

        .sub-heading {
            color: #6b7280;
            font-size: 1.05rem;
            font-weight: 400;
        }

        /* Card Custom Styling */
        .contact-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 2.2rem 1.5rem 1.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.08);
        }

        /* Icon Badges */
        .icon-badge {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1.25rem;
        }

        .badge-blue {
            background-color: #e0ebff;
            color: #3b82f6;
        }

        .badge-green {
            background-color: #dcfce7;
            color: #16a34a;
        }

        .badge-orange {
            background-color: #ffedd5;
            color: #f97316;
        }

        /* Card Content Typography */
        .card-title-text {
            font-weight: 700;
            font-size: 1.15rem;
            color: #111827;
            margin-bottom: 0.25rem;
        }

        .card-sub-text {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .card-main-action {
            font-weight: 800;
            font-size: 2.1rem;
            letter-spacing: -0.5px;
            color: #111827;
            margin-bottom: 1.5rem;
        }

        /* Buttons Styling */
        .btn-custom-orange {
            background-color: #ff5e28;
            border-color: #ff5e28;
            color: #ffffff;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            transition: background-color 0.2s;
        }

        .btn-custom-orange:hover {
            background-color: #e54e1b;
            border-color: #e54e1b;
            color: #ffffff;
        }

        .btn-custom-green {
            background-color: #10b981;
            border-color: #10b981;
            color: #ffffff;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            transition: background-color 0.2s;
        }

        .btn-custom-green:hover {
            background-color: #059669;
            border-color: #059669;
            color: #ffffff;
        }

        /* Floating Sidebar Widget */
        .floating-sidebar {
            position: fixed;
            right: 0;
            top: 20%;
            background-color: #1e293b;
            border-top-left-radius: 16px;
            border-bottom-left-radius: 16px;
            padding: 10px 8px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 1000;
            box-shadow: -2px 10px 20px rgba(0,0,0,0.15);
        }

        .floating-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: transform 0.2s;
        }

        .floating-btn:hover {
            transform: scale(1.1);
            color: white;
        }

        .btn-call-sidebar {
            background-color: #3b82f6;
        }

        .btn-whatsapp-sidebar {
            background-color: #10b981;
        }

        .btn-email-sidebar {
            background-color: #f97316;
        }

        /* Floating Avatar Chat Widget */
        .floating-avatar-widget {
            position: fixed;
            right: 20px;
            bottom: 30px;
            z-index: 1000;
            cursor: pointer;
        }

        .avatar-container {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #ffffff;
            padding: 3px;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            border: 3px solid #818cf8;
            position: relative;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .online-status {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 13px;
            height: 13px;
            background-color: #22c55e;
            border: 2px solid white;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .main-heading {
                font-size: 1.8rem;
            }
            .card-main-action {
                font-size: 1.75rem;
            }
        }
    </style>

    <style>
  
/* Practical Projects Section */
.practical-projects {
    background: linear-gradient(180deg, #f8faff 0%, #eef3ff 100%);
    position: relative;
    overflow: hidden;
}

.project-badge {
    display: inline-flex;
    align-items: center;
    background: #e4eaff;
    color: #304ecb;
    padding: 9px 18px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.project-heading {
    font-size: clamp(30px, 4vw, 44px);
    font-weight: 800;
    color: #172554;
    letter-spacing: -1px;
}

.project-heading span {
    color: #4f46e5;
}

.project-subtitle {
    max-width: 650px;
    color: #64748b;
    line-height: 1.8;
    font-size: 15px;
}

.heading-line {
    width: 65px;
    height: 4px;
    margin-top: 20px;
    border-radius: 10px;
    background: linear-gradient(90deg, #4f46e5, #06b6d4);
}

/* Project Card */
.project-card {
    position: relative;
    background: #ffffff;
    padding: 28px 22px 22px;
    border: 1px solid #e6eaf2;
    border-radius: 18px;
    box-shadow: 0 5px 20px rgba(30, 41, 59, 0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease,
                border-color 0.3s ease;
    overflow: hidden;
}

.project-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 4px;
    background: linear-gradient(90deg, #4f46e5, #06b6d4);
    transition: width 0.3s ease;
}

.project-card:hover {
    transform: translateY(-8px);
    border-color: #c7d2fe;
    box-shadow: 0 18px 40px rgba(79, 70, 229, 0.12);
}

.project-card:hover::before {
    width: 100%;
}

/* Icon Box */
.project-icon {
    width: 66px;
    height: 66px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    margin-bottom: 22px;
    transition: transform 0.3s ease;
}

.project-icon i {
    font-size: 29px;
}

.project-card:hover .project-icon {
    transform: scale(1.08) rotate(-3deg);
}

.icon-blue {
    background: #e5edff;
    color: #3159d9;
}

.icon-green {
    background: #dcfce7;
    color: #15803d;
}

.icon-orange {
    background: #ffedd5;
    color: #ea580c;
}

.icon-purple {
    background: #f0e7ff;
    color: #7c3aed;
}

.icon-red {
    background: #fee2e2;
    color: #dc2626;
}

.icon-teal {
    background: #ccfbf1;
    color: #0f766e;
}

.icon-indigo {
    background: #e0e7ff;
    color: #4338ca;
}

.icon-yellow {
    background: #fef3c7;
    color: #b45309;
}

/* Card Content */
.project-number {
    display: block;
    color: #818cf8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.4px;
    margin-bottom: 10px;
}

.project-card h5 {
    color: #172554;
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 12px;
    line-height: 1.5;
}

.project-card p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
    margin-bottom: 22px;
}

.project-footer {
    border-top: 1px solid #edf0f6;
    padding-top: 15px;
    margin-top: auto;
    color: #475569;
    font-size: 11px;
    font-weight: 700;
}

.project-footer i {
    color: #16a34a;
    margin-right: 5px;
}

/* Bottom CTA */
.cta-text {
    color: #334155;
    font-size: 16px;
    font-weight: 700;
}

.project-btn {
    padding: 13px 25px;
    background: #4f46e5;
    color: #fff;
    border-radius: 10px;
    font-weight: 700;
    box-shadow: 0 8px 20px rgba(79, 70, 229, 0.2);
    transition: all 0.3s ease;
}

.project-btn:hover {
    background: #3730a3;
    color: #fff;
    transform: translateY(-2px);
}

@media (max-width: 575.98px) {
    .project-card {
        padding: 24px 20px;
    }

    .project-heading {
        letter-spacing: -0.5px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .project-card,
    .project-icon,
    .project-card::before,
    .project-btn {
        transition: none;
    }
}

    </style>

    <style>
    .trainer-card {
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .trainer-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, .10) !important;
    }

    .trainer-image {
        height: 260px;
        overflow: hidden;
        background: #e9ecef;
    }

    .trainer-image img {
        height: 100%;
        object-fit: cover;
        object-position: center 30%;
        transition: transform .4s ease;
    }

    .trainer-card:hover .trainer-image img {
        transform: scale(1.05);
    }

    .pagination .page-link {
        color: #0d47a1;
        padding: 10px 16px;
        border-radius: 8px;
        margin: 0 3px;
    }

    .pagination .page-item.active .page-link {
        background: #0d47a1;
        border-color: #0d47a1;
        color: #fff;
    }
</style>

<style>
/* Main Section */
.career-support-section {
    background: linear-gradient(135deg, #f7f9ff 0%, #edf2ff 100%);
    overflow: hidden;
}

.career-badge {
    display: inline-flex;
    align-items: center;
    background: #e0e7ff;
    color: #4338ca;
    padding: 10px 17px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;
}

.career-title {
    color: #172554;
    font-size: clamp(32px, 4vw, 48px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -1.2px;
}

.career-title span {
    display: block;
    color: #4f46e5;
}

.career-description {
    color: #64748b;
    line-height: 1.9;
    font-size: 15px;
}

/* Benefits */
.career-benefits {
    display: grid;
    gap: 22px;
}

.career-benefit {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.benefit-icon {
    min-width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: #fff;
    color: #4f46e5;
    box-shadow: 0 5px 15px rgba(30, 41, 59, .06);
    font-size: 22px;
}

.career-benefit h6 {
    color: #1e293b;
    font-size: 15px;
    font-weight: 800;
    margin: 2px 0 5px;
}

.career-benefit p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
    margin: 0;
}

.career-note {
    background: #fff;
    border-left: 4px solid #6366f1;
    padding: 15px 17px;
    border-radius: 8px;
    color: #475569;
    font-size: 12px;
    line-height: 1.8;
}

/* Form Card */
.career-form-card {
    background: #fff;
    padding: 32px;
    border: 1px solid #e8ecf5;
    border-radius: 22px;
    box-shadow: 0 20px 60px rgba(37, 55, 110, .10);
}

.form-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 27px;
}

.form-heading-icon {
    width: 54px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #fff;
    background: linear-gradient(135deg, #4f46e5, #6366f1);
    border-radius: 15px;
    font-size: 23px;
}

.form-heading h3 {
    color: #172554;
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 5px;
}

.form-heading p {
    color: #64748b;
    font-size: 12px;
    line-height: 1.7;
    margin: 0;
}

.career-form-card .form-label {
    font-size: 13px;
    font-weight: 700;
    color: #334155;
    margin-bottom: 8px;
}

.career-form-card .form-label span {
    color: #dc2626;
}

.career-input {
    min-height: 48px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    color: #334155;
    font-size: 13px;
    background-color: #fbfcff;
    box-shadow: none;
}

textarea.career-input {
    min-height: 110px;
    resize: vertical;
}

.career-input:focus {
    border-color: #818cf8;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(99, 102, 241, .10);
}

.career-input::placeholder {
    color: #a0aabc;
}

.career-submit-btn {
    min-height: 51px;
    border-radius: 10px;
    background: #4f46e5;
    color: #fff;
    font-size: 14px;
    font-weight: 800;
    margin-top: 5px;
    transition: all .25s ease;
}

.career-submit-btn:hover {
    background: #3730a3;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79, 70, 229, .2);
}

.form-footer {
    text-align: center;
    color: #94a3b8;
    font-size: 11px;
    margin-top: 20px;
}

/* Steps Section */
.career-steps-section {
    background: #fff;
}

.steps-label {
    color: #4f46e5;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.steps-title {
    color: #172554;
    font-size: clamp(25px, 3vw, 34px);
    font-weight: 800;
}

.step-card {
    height: 100%;
    position: relative;
    padding: 32px 25px;
    border: 1px solid #e8ecf5;
    border-radius: 17px;
    background: #fff;
    transition: transform .3s ease, box-shadow .3s ease;
}

.step-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(30, 41, 59, .08);
}

.step-number {
    position: absolute;
    top: 20px;
    right: 22px;
    color: #e0e7ff;
    font-size: 32px;
    font-weight: 900;
}

.step-icon {
    display: inline-flex;
    color: #4f46e5;
    font-size: 30px;
    margin-bottom: 22px;
}

.step-card h5 {
    color: #172554;
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 12px;
}

.step-card p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
    margin-bottom: 0;
}

@media (max-width: 767px) {
    .career-title {
        font-size: 34px;
    }

    .career-form-card {
        padding: 23px 18px;
    }

    .form-heading h3 {
        font-size: 21px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .step-card,
    .career-submit-btn {
        transition: none;
    }
}
</style>

<style>
/* HERO */
.certificate-hero {
    background:
        linear-gradient(105deg, rgba(8, 35, 83, .98), rgba(20, 75, 155, .87)),
        url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1800&q=85')
        center/cover no-repeat;
    overflow: hidden;
}

.certificate-hero-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 50px;
    padding: 10px 16px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.hero-description {
    max-width: 650px;
    color: rgba(255,255,255,.78);
    font-size: 16px;
    line-height: 1.9;
}

/* Decorative certificate */
.hero-certificate-visual {
    position: relative;
    max-width: 440px;
    margin: 15px auto;
    padding: 10px;
}

.hero-certificate-paper {
    padding: 10px;
    background: #f4e4b9;
    color: #17345e;
    border-radius: 3px;
    box-shadow: 0 22px 55px rgba(0,0,0,.30);
    transform: rotate(2deg);
}

.certificate-inner-border {
    border: 2px solid #b68c37;
    outline: 1px solid rgba(182,140,55,.5);
    outline-offset: -7px;
    padding: 26px 18px;
    text-align: center;
    min-height: 345px;
    background: #fffdf6;
}

.hero-award-icon {
    font-size: 43px;
    color: #bd9137;
}

.hero-paper-small {
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 4px;
    margin-top: 10px;
}

.certificate-inner-border h3 {
    font-family: Georgia, serif;
    font-size: 35px;
    font-weight: bold;
    margin: 8px 0;
}

.paper-divider {
    height: 2px;
    width: 90px;
    margin: 15px auto;
    background: #c19a4c;
}

.paper-caption {
    font-size: 9px;
    letter-spacing: 3px;
}

.paper-recipient {
    font-family: Georgia, serif;
    font-size: 21px;
    font-weight: bold;
    margin: 22px 0 8px;
}

.paper-course {
    color: #64748b;
    font-size: 11px;
    line-height: 1.7;
}

.paper-bottom {
    display: flex;
    justify-content: space-between;
    align-items: end;
    margin-top: 25px;
}

.paper-bottom small {
    font-size: 9px;
}

.signature-line {
    width: 95px;
    height: 1px;
    background: #b68c37;
    margin-bottom: 7px;
}

.paper-seal {
    font-size: 39px;
    color: #bd9137;
}

.floating-certificate-icon {
    position: absolute;
    right: -4px;
    bottom: -15px;
    display: flex;
    align-items: center;
    gap: 10px;
    background: white;
    color: #17345e;
    border-radius: 12px;
    padding: 13px 16px;
    font-size: 12px;
    font-weight: 800;
    box-shadow: 0 10px 35px rgba(0,0,0,.15);
}

.floating-certificate-icon i {
    color: #16a34a;
    font-size: 23px;
}

/* COMMON HEADINGS */
.certificate-intro {
    background: #fff;
}

.section-eyebrow {
    color: #4f46e5;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.6px;
}

.section-heading {
    color: #172554;
    font-size: clamp(27px, 3vw, 38px);
    font-weight: 800;
    line-height: 1.3;
}

.section-heading span {
    color: #4f46e5;
}

.section-description {
    max-width: 650px;
    line-height: 1.8;
}

.certificate-heading-line {
    width: 65px;
    height: 4px;
    border-radius: 5px;
    background: linear-gradient(90deg, #4f46e5, #06b6d4);
    margin-top: 20px;
}

/* INTRO */
.intro-feature {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #334155;
    font-size: 14px;
    margin-top: 16px;
}

.intro-feature i {
    color: #16a34a;
    font-size: 18px;
}

.certificate-info-box {
    padding: 35px;
    border-radius: 20px;
    background: #f5f7ff;
    border: 1px solid #e4e8ff;
}

.info-box-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: #e0e7ff;
    color: #4338ca;
    font-size: 28px;
    margin-bottom: 22px;
}

.certificate-info-box h4 {
    font-weight: 800;
    color: #172554;
}

.certificate-info-box p {
    color: #64748b;
    line-height: 1.9;
    font-size: 14px;
}

/* PROGRAM CARDS */
.certificate-programs {
    background: #f7f9ff;
}

.certificate-program-card {
    background: white;
    border: 1px solid #e7eaf2;
    border-radius: 17px;
    overflow: hidden;
    transition: transform .3s ease, box-shadow .3s ease;
}

.certificate-program-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 40px rgba(30,41,59,.09);
}

.program-card-top {
    padding: 25px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.program-icon {
    width: 57px;
    height: 57px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(255,255,255,.85);
    border-radius: 15px;
    font-size: 27px;
}

.program-tag {
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1px;
    color: #475569;
    background: rgba(255,255,255,.85);
    padding: 8px 10px;
    border-radius: 30px;
}

.bg-soft-blue { background: #e7efff; }
.bg-soft-green { background: #e1f7e9; }
.bg-soft-orange { background: #fff0dd; }
.bg-soft-purple { background: #f0e8ff; }
.bg-soft-cyan { background: #dff8fc; }
.bg-soft-pink { background: #ffe8f0; }
.text-purple { color: #7c3aed !important; }

.program-card-body {
    padding: 24px;
}

.program-card-body h5 {
    font-size: 18px;
    font-weight: 800;
    line-height: 1.5;
    color: #172554;
    margin-bottom: 12px;
}

.program-card-body p {
    min-height: 75px;
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
}

.program-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 17px;
    border-top: 1px solid #edf0f6;
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
}

.program-card-footer span i {
    color: #4f46e5;
}

.program-card-footer a {
    color: #4f46e5;
    font-size: 25px;
    line-height: 1;
}

/* PROCESS */
.certificate-process {
    background: #fff;
}

.process-card {
    height: 100%;
    position: relative;
    padding: 28px 20px;
    border: 1px solid #e7eaf2;
    border-radius: 16px;
    text-align: center;
    transition: .3s ease;
}

.process-card:hover {
    border-color: #c7d2fe;
    box-shadow: 0 12px 30px rgba(79,70,229,.09);
    transform: translateY(-5px);
}

.process-number {
    position: absolute;
    right: 15px;
    top: 12px;
    color: #e0e7ff;
    font-size: 27px;
    font-weight: 900;
}

.process-card > i {
    display: block;
    color: #4f46e5;
    font-size: 32px;
    margin: 15px 0 20px;
}

.process-card h6 {
    color: #172554;
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 10px;
}

.process-card p {
    color: #64748b;
    font-size: 12px;
    line-height: 1.8;
    margin: 0;
}

/* CTA */
.certificate-cta {
    background: linear-gradient(115deg, #0b2b62, #1d4fa1);
}

.cta-inner {
    max-width: 760px;
    margin: auto;
}

.cta-icon {
    color: #fbbf24;
    font-size: 44px;
    margin-bottom: 15px;
}

.cta-inner h2 {
    color: #fff;
    font-size: clamp(25px, 3vw, 36px);
    font-weight: 800;
    line-height: 1.4;
}

.cta-inner p {
    color: rgba(255,255,255,.76);
    line-height: 1.9;
    margin: 15px 0 25px;
}

@media (max-width: 991px) {
    .certificate-hero .display-4 {
        font-size: 39px;
    }

    .hero-certificate-visual {
        max-width: 390px;
        margin-top: 20px;
    }
}

@media (max-width: 575px) {
    .certificate-hero .display-4 {
        font-size: 32px;
    }

    .hero-description {
        font-size: 14px;
    }

    .hero-certificate-visual {
        max-width: 320px;
    }

    .certificate-inner-border {
        min-height: 300px;
        padding: 20px 12px;
    }

    .certificate-inner-border h3 {
        font-size: 29px;
    }

    .paper-recipient {
        font-size: 17px;
    }

    .floating-certificate-icon {
        right: -3px;
        font-size: 10px;
        padding: 10px;
    }

    .certificate-info-box {
        padding: 25px 20px;
    }

    .program-card-body p {
        min-height: auto;
    }
}

@media (prefers-reduced-motion: reduce) {
    .certificate-program-card,
    .process-card {
        transition: none;
    }
}
</style>
<style>
/* ================= HERO ================= */
.contact-hero {
    color: #fff;
    background:
        linear-gradient(110deg, rgba(7, 29, 72, .97), rgba(25, 79, 160, .88)),
        url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1800&q=85')
        center/cover no-repeat;
}

.contact-hero .breadcrumb-item a {
    color: rgba(255,255,255,.85);
    font-size: 13px;
}

.contact-hero .breadcrumb-item.active {
    font-size: 13px;
}

.contact-hero .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,.6);
}

.contact-badge {
    display: inline-flex;
    align-items: center;
    padding: 10px 17px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 50px;
    background: rgba(255,255,255,.1);
    color: #fff;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.4px;
}

.contact-hero-title {
    font-size: clamp(36px, 5vw, 55px);
    font-weight: 800;
    line-height: 1.18;
    letter-spacing: -1px;
}

.contact-hero-title span {
    display: block;
    color: #fbbf24;
}

.contact-hero-description {
    max-width: 650px;
    color: rgba(255,255,255,.78);
    font-size: 16px;
    line-height: 1.9;
}

.hero-contact-points {
    display: flex;
    flex-wrap: wrap;
    gap: 14px 22px;
}

.hero-contact-points span {
    color: #fff;
    font-size: 12px;
    font-weight: 600;
}

.hero-contact-points i {
    color: #fbbf24;
    margin-right: 5px;
}

/* ================= MAIN ================= */
.contact-main-section {
    background: #f6f8fc;
}

.contact-info-panel {
    position: relative;
    overflow: hidden;
    padding: 36px 30px;
    border-radius: 20px;
    color: #fff;
    background: linear-gradient(155deg, #102f68, #174a99);
    box-shadow: 0 15px 40px rgba(16,47,104,.14);
}

.contact-info-panel::after {
    content: "";
    position: absolute;
    width: 210px;
    height: 210px;
    border: 35px solid rgba(255,255,255,.04);
    border-radius: 50%;
    right: -100px;
    bottom: -80px;
    pointer-events: none;
}

.contact-small-label {
    color: #818cf8;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.6px;
}

.contact-info-panel .contact-small-label {
    color: #fbbf24;
}

.contact-info-title {
    font-size: 30px;
    line-height: 1.35;
    font-weight: 800;
}

.contact-info-description {
    color: rgba(255,255,255,.72);
    font-size: 13px;
    line-height: 1.9;
    margin-bottom: 32px;
}

.contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-top: 26px;
}

.contact-info-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 46px;
    height: 46px;
    border-radius: 13px;
    color: #fbbf24;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.12);
    font-size: 20px;
}

.contact-info-item h6 {
    color: #fff;
    font-size: 14px;
    font-weight: 800;
    margin: 2px 0 7px;
}

.contact-info-item p {
    color: rgba(255,255,255,.67);
    font-size: 12px;
    line-height: 1.8;
    margin-bottom: 6px;
}

.contact-info-item a {
    color: #fcd34d;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    overflow-wrap: anywhere;
}

.contact-info-item a:hover {
    color: #fff;
    text-decoration: underline;
}

.contact-hours {
    display: flex;
    gap: 8px;
    padding: 16px;
    margin-top: 30px;
    border-radius: 12px;
    background: rgba(255,255,255,.08);
    font-size: 12px;
}

.contact-hours > i {
    color: #fbbf24;
    font-size: 18px;
}

.contact-hours strong {
    display: block;
    margin-bottom: 5px;
}

.contact-hours p {
    color: rgba(255,255,255,.7);
    margin: 0;
    line-height: 1.7;
}

.contact-social-note {
    color: rgba(255,255,255,.75);
    font-size: 11px;
    line-height: 1.8;
    margin-top: 25px;
}

/* ================= FORM ================= */
.contact-form-card {
    padding: 36px;
    background: #fff;
    border: 1px solid #e7ebf3;
    border-radius: 20px;
    box-shadow: 0 12px 40px rgba(15,23,42,.05);
}

.form-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 30px;
}

.contact-form-title {
    color: #172554;
    font-size: 28px;
    font-weight: 800;
}

.form-header p {
    font-size: 13px;
    line-height: 1.8;
    margin-bottom: 0;
}

.form-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 55px;
    height: 55px;
    border-radius: 16px;
    background: #e8edff;
    color: #4f46e5;
    font-size: 24px;
}

.contact-label {
    display: block;
    color: #334155;
    font-size: 12px;
    font-weight: 800;
    margin-bottom: 9px;
}

.contact-label span {
    color: #dc2626;
}

.contact-input-wrap {
    position: relative;
}

.contact-input-wrap > i {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    z-index: 2;
    color: #818cf8;
    font-size: 16px;
    pointer-events: none;
}

.contact-input {
    min-height: 49px;
    padding: 12px 14px 12px 43px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    background-color: #fbfcff;
    color: #334155;
    font-size: 12px;
    box-shadow: none;
}

.contact-input::placeholder {
    color: #9ca8ba;
}

.contact-input:focus {
    border-color: #818cf8;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(99,102,241,.09);
}

.select-wrap select {
    padding-right: 30px;
}

.textarea-wrap > i {
    top: 17px;
    transform: none;
}

textarea.contact-input {
    min-height: 130px;
    resize: vertical;
}

.contact-privacy {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    color: #64748b;
    font-size: 11px;
    line-height: 1.8;
    margin-top: 3px;
}

.contact-privacy i {
    color: #16a34a;
    font-size: 16px;
    flex-shrink: 0;
}

.contact-submit-btn {
    min-height: 52px;
    border-radius: 10px;
    background: #4f46e5;
    color: #fff;
    font-size: 13px;
    font-weight: 800;
    transition: .25s ease;
}

.contact-submit-btn:hover {
    background: #3730a3;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,.2);
}

/* ================= BOTTOM CTA ================= */
.contact-bottom-section {
    background: #fff;
}

.bottom-label {
    color: #4f46e5;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.bottom-title {
    color: #172554;
    font-size: clamp(24px, 3vw, 34px);
    font-weight: 800;
    line-height: 1.4;
}

.contact-bottom-section p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
}

@media (max-width: 991px) {
    .contact-info-title {
        font-size: 26px;
    }

    .contact-form-card {
        padding: 28px 23px;
    }
}

@media (max-width: 575px) {
    .contact-hero-title {
        font-size: 36px;
    }

    .contact-hero-description {
        font-size: 14px;
    }

    .hero-contact-points {
        flex-direction: column;
        gap: 12px;
    }

    .contact-info-panel {
        padding: 28px 22px;
    }

    .contact-form-card {
        padding: 25px 18px;
    }

    .contact-form-title {
        font-size: 23px;
    }

    .form-header-icon {
        width: 44px;
        height: 44px;
        font-size: 20px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .contact-submit-btn {
        transition: none;
    }
}
</style>

    @stack('styles')

</head>

<body>

@include('layouts.inqury')

    {{-- Top Bar --}}
 <div class="top-bar">
    <div class="container-fluid px-3 px-md-4">
      <div class="row align-items-center justify-content-between gy-2">

        <!-- Left Side: Email & Contact Numbers -->
        <div class="col-12 col-lg-auto d-flex flex-wrap align-items-center gap-3">
          <a href="mailto:info@talentmagnifier.com" class="d-flex align-items-center gap-2">
            <i class="fa-regular fa-envelope"></i>
            <span>{{ $websiteSetting->email ?? 'info@institute.com' }}</span>
          </a>

          <a href="tel:+919999420393" class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-phone"></i>
            <span> {{ $websiteSetting->phone ?? '+91 98765 43210' }}</span>
          </a>

          <a href="tel:+919999420394" class="d-flex align-items-center gap-1">
            <span> {{ $websiteSetting->phone ?? '+91 98765 43210' }}</span>
          </a>
        </div>

        <!-- Right Side: Social Links & Action Buttons -->
        <div class="col-12 col-lg-auto d-flex flex-wrap align-items-center justify-content-lg-end gap-3">

          <!-- Social Icons -->
          <div class="d-flex align-items-center gap-2 me-lg-2">
            <span class="fw-semibold">Follow Us:</span>
            <div class="social-icons d-flex align-items-center">
              <a href="{{ $websiteSetting->facebook ?? '#' }}" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
              <a href="{{ $websiteSetting->instagram ?? '#' }}" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
              <a href="{{ $websiteSetting->youtube ?? '#' }}" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            </div>
          </div>

          <!-- Buttons -->
          <div class="d-flex align-items-center gap-2">

             <button type="button" class="btn btn-book-demo" data-bs-toggle="modal" data-bs-target="#demoModal">
             Book Free Demo Class
              </button>
            <a href="#" class="btn btn-pay-online">Pay For Online</a>
          </div>

        </div>

      </div>
    </div>
  </div>


    {{-- Navbar --}}
<nav class="navbar navbar-expand-lg main-navbar bg-white py-2 shadow-sm">
    <div class="container-fluid px-lg-4">

        <!-- Logo / Brand Section -->
        <a class="navbar-brand d-flex align-items-center me-4" href="{{ url('/') }}">
            @if(!empty($websiteSetting?->logo))
                <img
                    src="{{ asset('storage/' . $websiteSetting->logo) }}"
                    alt="{{ $websiteSetting->site_name ?? 'TALENT MAGNIFIER' }}"
                    height="65"
                >
            @else
                <div class="d-flex flex-column text-center">
                    <span class="fw-bold text-uppercase fs-5 text-dark" style="letter-spacing: 0.5px;">
                        <span class="text-dark">TALENT</span> <span class="text-primary">MAGNIFIER</span>
                    </span>
                    <small class="text-muted" style="font-size: 10px; margin-top: -3px;">A Great Place to get Success</small>
                    <small class="text-dark fw-semibold" style="font-size: 8px;">AN ISO 9001:2015 Certified Institute</small>
                </div>
            @endif
        </a>

        <!-- Mobile Toggle Button -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">

 <ul class="navbar-nav ms-auto align-items-lg-center">

    @foreach($navbarItems as $item)
        <li class="nav-item">

            @if($item->type === 'demo')
                <button
                    type="button"
                    class="btn btn-book-demo btn-sm px-3 py-2 text-nowrap"
                    data-bs-toggle="modal"
                    data-bs-target="#demoModal">
                    {{ $item->title }}
                </button>

            @elseif($item->type === 'login')
                <a
                    class="btn btn-primary-custom btn-sm px-3 py-2 text-nowrap"
                    href="{{ url($item->url ?: '/login') }}">
                    {{ $item->title }}
                </a>

            @else
                <a
                    class="nav-link custom-nav-link text-nowrap
                    {{ request()->is(ltrim($item->url ?? '', '/'))
                        ? 'active' : '' }}"
                    href="{{ $item->url ?: '#' }}"
                    target="{{ $item->target }}"
                    @if($item->target === '_blank')
                        rel="noopener noreferrer"
                    @endif>
                    {{ $item->title }}
                </a>
            @endif

        </li>
    @endforeach

</ul>

        </div>

    </div>
</nav>


    {{-- Page Content --}}
    <main>

        @yield('content')

    </main>


    {{-- Footer --}}
    <footer class="frontend-footer">

        <div class="container section-padding pb-5">

            <div class="row g-5">

                <div class="col-lg-4">

                    <h5>
                        {{ $websiteSetting->site_name ?? 'Institute' }}
                    </h5>

                    <p>
                        {{ $websiteSetting->meta_description
                            ?? 'Professional training institute providing practical, career-focused education and skill development programs.'
                        }}
                    </p>

                    <div class="mt-4">

                        <a
                            href="{{ $websiteSetting->facebook ?? '#' }}"
                            class="d-inline-block me-3"
                        >
                            <i class="bi bi-facebook fs-5"></i>
                        </a>

                        <a
                            href="{{ $websiteSetting->instagram ?? '#' }}"
                            class="d-inline-block me-3"
                        >
                            <i class="bi bi-instagram fs-5"></i>
                        </a>

                        <a
                            href="{{ $websiteSetting->youtube ?? '#' }}"
                            class="d-inline-block"
                        >
                            <i class="bi bi-youtube fs-5"></i>
                        </a>

                    </div>

                </div>


                <div class="col-lg-2 col-md-4">

                    <h5>
                        Quick Links
                    </h5>

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <a href="{{ url('/about') }}">
                        About Us
                    </a>

                    <a href="{{ url('/courses') }}">
                        Courses
                    </a>

                    <a href="{{ url('/batches') }}">
                        Batches
                    </a>

                </div>


                <div class="col-lg-3 col-md-4">

                    <h5>
                        Training
                    </h5>

                    <a href="{{ url('/training') }}">
                        Online Training
                    </a>

                    <a href="{{ url('/training') }}">
                        Offline Training
                    </a>

                    <a href="{{ url('/training') }}">
                        Practical Training
                    </a>

                    <a href="{{ url('/courses') }}">
                        Career Courses
                    </a>

                </div>


                <div class="col-lg-3 col-md-4">

                    <h5>
                        Contact Us
                    </h5>

                    <p class="mb-2">

                        <i class="bi bi-geo-alt me-2"></i>

                        {{ $websiteSetting->address ?? 'Your Institute Address' }}

                    </p>

                    <p class="mb-2">

                        <i class="bi bi-telephone me-2"></i>

                        {{ $websiteSetting->phone ?? '+91 98765 43210' }}

                    </p>

                    <p>

                        <i class="bi bi-envelope me-2"></i>

                        {{ $websiteSetting->email ?? 'info@institute.com' }}

                    </p>

                </div>

            </div>

        </div>


        <div class="footer-bottom">

            <div class="container">

                <div class="py-4 text-center">

                    © {{ date('Y') }}

                    {{ $websiteSetting->site_name ?? 'Institute' }}.

                    All Rights Reserved.

                </div>

            </div>

        </div>

    </footer>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

    @stack('scripts')

</body>

</html>
