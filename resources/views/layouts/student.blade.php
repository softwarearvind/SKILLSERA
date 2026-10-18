<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Student Dashboard') -
        {{ \App\Models\WebsiteSetting::first()->site_name ?? 'Institute' }}
    </title>

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    @stack('styles')

    <style>

        :root {
            --student-primary: #4f46e5;
            --student-dark: #111827;
            --student-sidebar: #111827;
            --student-bg: #f5f7fb;
            --student-border: #e5e7eb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--student-bg);
            color: #1f2937;
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .student-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--student-sidebar);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: all .3s ease;
        }


        /* Logo */

        .student-logo {
            height: 72px;
            padding: 0 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,.08);
            flex-shrink: 0;
        }

        .student-logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--student-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .student-logo-text {
            font-size: 17px;
            font-weight: 700;
            white-space: nowrap;
        }


        /* Sidebar Scroll */

        .student-sidebar-menu {
            flex: 1;
            overflow-y: auto;
            padding: 18px 12px 25px;
        }

        .student-sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .student-sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .student-sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.15);
            border-radius: 10px;
        }


        /* Section */

        .sidebar-title {
            padding: 10px 12px 7px;
            color: #6b7280;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
        }


        /* Links */

        .student-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin-bottom: 4px;
            color: #9ca3af;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 500;
            transition: all .2s ease;
        }

        .student-nav-link i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .student-nav-link:hover {
            background: rgba(255,255,255,.07);
            color: #ffffff;
        }

        .student-nav-link.active {
            background: var(--student-primary);
            color: #ffffff;
        }


        /* Bottom */

        .student-sidebar-bottom {
            padding: 12px;
            border-top: 1px solid rgba(255,255,255,.08);
            flex-shrink: 0;
        }


        /* =========================
           MAIN
        ========================= */

        .student-main {
            margin-left: 260px;
            min-height: 100vh;
            transition: all .3s ease;
        }


        /* =========================
           TOPBAR
        ========================= */

        .student-topbar {
            height: 72px;
            background: #ffffff;
            border-bottom: 1px solid var(--student-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }


        .student-menu-btn {
            border: 0;
            background: #f3f4f6;
            width: 40px;
            height: 40px;
            border-radius: 9px;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }


        /* Search */

        .student-search {
            position: relative;
            width: 280px;
        }

        .student-search i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .student-search input {
            width: 100%;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            border-radius: 9px;
            padding: 9px 12px 9px 38px;
            outline: none;
            font-size: 13px;
        }

        .student-search input:focus {
            border-color: var(--student-primary);
            background: #ffffff;
        }


        /* Profile */

        .student-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--student-primary);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            text-transform: uppercase;
        }

        .student-profile-info {
            line-height: 1.2;
        }

        .student-profile-name {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
        }

        .student-profile-role {
            font-size: 11px;
            color: #6b7280;
        }


        /* =========================
           CONTENT
        ========================= */

        .student-content {
            padding: 28px;
        }


        /* =========================
           MOBILE OVERLAY
        ========================= */

        .student-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.45);
            z-index: 1040;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991.98px) {

            .student-sidebar {
                transform: translateX(-100%);
            }

            .student-sidebar.show {
                transform: translateX(0);
            }

            .student-main {
                margin-left: 0;
            }

            .student-menu-btn {
                display: flex;
            }

            .student-overlay.show {
                display: block;
            }

            .student-search {
                display: none;
            }

            .student-topbar {
                padding: 0 16px;
            }

            .student-content {
                padding: 20px 15px;
            }

        }


        @media (max-width: 575.98px) {

            .student-profile-info {
                display: none;
            }

            .student-avatar {
                width: 38px;
                height: 38px;
            }

        }

    </style>

</head>


<body>


@php

    $studentUser = auth()->user();

    $studentName = $studentUser->name ?? 'Student';

    $studentInitial =
        strtoupper(
            substr(
                $studentName,
                0,
                1
            )
        );

    $currentRoute = request()->route()?->getName();

@endphp


{{-- =====================================
     SIDEBAR
===================================== --}}

<aside
    class="student-sidebar"
    id="studentSidebar"
>


    {{-- Logo --}}

    <div class="student-logo">

        <div class="student-logo-icon">

            <i class="bi bi-mortarboard-fill"></i>

        </div>

        <div class="student-logo-text">

            {{ \App\Models\WebsiteSetting::first()->site_name
                ?? 'Training Institute' }}

        </div>

    </div>


    {{-- Menu --}}

    <div class="student-sidebar-menu">


        <div class="sidebar-title">

            Main Menu

        </div>


        {{-- Dashboard --}}

        <a
            href="{{ route('student.dashboard') }}"
            class="student-nav-link
                {{ $currentRoute === 'student.dashboard'
                    ? 'active'
                    : '' }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        {{-- Learning --}}

        <div class="sidebar-title mt-3">

            Learning

        </div>


      <a
    href="{{ route('student.courses.index') }}"
    class="student-nav-link
        {{ request()->routeIs('student.courses.*')
            ? 'active'
            : '' }}"
>

    <i class="bi bi-book-fill"></i>

    <span>
        My Courses
    </span>

</a>


      <a
    href="{{ route('student.modules.index') }}"
    class="student-nav-link
        {{ request()->routeIs('student.modules.*') ? 'active' : '' }}"
>
    <i class="bi bi-layers-fill"></i>

    <span>
        My Modules
    </span>
</a>

       <a href="{{ route('student.study-materials.index') }}"class="student-nav-link
        {{ request()->routeIs('student.study-materials.*') ? 'active' : '' }}">
    <i class="bi bi-file-earmark-text-fill"></i>
    <span>
        Study Materials
    </span>
</a>


       <a
    href="{{ route('student.assignments.index') }}"
    class="student-nav-link
        {{ request()->routeIs('student.assignments.*') ? 'active' : '' }}"
>
    <i class="bi bi-journal-text"></i>

    <span>
        Assignments
    </span>
</a>


       <a
    href="{{ route('student.tests.index') }}"
    class="student-nav-link
        {{ request()->routeIs('student.tests.*') ? 'active' : '' }}"
>
    <i class="bi bi-pencil-square"></i>

    <span>
        Exams / Tests
    </span>
</a>


        {{-- Performance --}}

        <div class="sidebar-title mt-3">

            Performance

        </div>


        <a
    href="{{ route('student.attendance.index') }}"
    class="student-nav-link {{ request()->routeIs('student.attendance.*') ? 'active' : '' }}"
>
    <i class="bi bi-calendar-check-fill"></i>

    <span>
        Attendance
    </span>
</a>


       <a
    href="{{ route('student.progress.index') }}"
    class="student-nav-link {{ request()->routeIs('student.progress.*') ? 'active' : '' }}"
>
    <i class="bi bi-graph-up-arrow"></i>

    <span>
        My Progress
    </span>
</a>

      <a
    href="{{ route('student.certificates.index') }}"
    class="student-nav-link {{ request()->routeIs('student.certificates.*') ? 'active' : '' }}"
>
    <i class="bi bi-award-fill"></i>

    <span>
        Certificates
    </span>
</a>


        {{-- Communication --}}

        <div class="sidebar-title mt-3">

            Communication

        </div>


        <a
            href="#"
            class="student-nav-link"
        >

            <i class="bi bi-megaphone-fill"></i>

            <span>
                Notices
            </span>

        </a>


        {{-- Account --}}

        <div class="sidebar-title mt-3">

            Account

        </div>


       <a
    href="{{ route('student.profile.index') }}"
    class="student-nav-link {{ request()->routeIs('student.profile.*') ? 'active' : '' }}"
>
    <i class="bi bi-person-fill"></i>

    <span>
        My Profile
    </span>
</a>


    </div>


    {{-- Logout --}}

    <div class="student-sidebar-bottom">

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="student-nav-link w-100 border-0
                       bg-transparent text-start"
            >

                <i class="bi bi-box-arrow-right"></i>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>


</aside>


{{-- Mobile Overlay --}}

<div
    class="student-overlay"
    id="studentOverlay"
></div>


{{-- =====================================
     MAIN
===================================== --}}

<main class="student-main">


    {{-- Topbar --}}

    <header class="student-topbar">


        <div class="d-flex align-items-center gap-3">


            {{-- Mobile Menu --}}

            <button
                type="button"
                class="student-menu-btn"
                id="studentMenuBtn"
            >

                <i class="bi bi-list"></i>

            </button>


            {{-- Search --}}

            <div class="student-search">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    placeholder="Search..."
                >

            </div>


        </div>


        {{-- Right Side --}}

        <div class="student-profile">


            {{-- Notification --}}

            <button
                type="button"
                class="btn btn-light position-relative
                       rounded-circle"
                style="width:40px;height:40px;"
            >

                <i class="bi bi-bell"></i>

                <span
                    class="position-absolute top-0
                           start-100 translate-middle
                           badge rounded-pill bg-danger"
                    style="font-size:8px;"
                >

                    0

                </span>

            </button>


            {{-- Avatar --}}

            <div class="student-avatar">

                {{ $studentInitial }}

            </div>


            <div class="student-profile-info">

                <div class="student-profile-name">

                    {{ $studentName }}

                </div>

                <div class="student-profile-role">

                    Student

                </div>

            </div>


        </div>


    </header>


    {{-- Page Content --}}

    <div class="student-content">

        @yield('content')

    </div>


</main>


{{-- Bootstrap JS --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<script>

    const menuBtn =
        document.getElementById('studentMenuBtn');

    const sidebar =
        document.getElementById('studentSidebar');

    const overlay =
        document.getElementById('studentOverlay');


    function openStudentSidebar() {

        sidebar.classList.add('show');

        overlay.classList.add('show');

    }


    function closeStudentSidebar() {

        sidebar.classList.remove('show');

        overlay.classList.remove('show');

    }


    if (menuBtn) {

        menuBtn.addEventListener(
            'click',
            openStudentSidebar
        );

    }


    if (overlay) {

        overlay.addEventListener(
            'click',
            closeStudentSidebar
        );

    }


    document.querySelectorAll(
        '.student-nav-link'
    ).forEach(function(link) {

        link.addEventListener(
            'click',
            function() {

                if (
                    window.innerWidth <= 991
                ) {

                    closeStudentSidebar();

                }

            }
        );

    });

</script>


@stack('scripts')

</body>

</html>
