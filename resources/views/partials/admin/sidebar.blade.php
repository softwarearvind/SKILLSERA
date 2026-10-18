<aside class="sidebar" id="sidebarMenu">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div>
            <h5>Institute Admin</h5>
            <small>Training Management</small>
        </div>
    </div>

    <!-- MAIN (always visible) -->
    <div class="menu-title">Main</div>

    <a href="#" class="nav-link active">
        <i class="bi bi-grid-1x2-fill"></i> Dashboard
    </a>

    <!-- WEBSITE -->
    <button class="menu-toggle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuWebsite">
        <span>Website</span>
        <i class="bi bi-chevron-down arrow"></i>
    </button>
    <div class="collapse" id="menuWebsite" data-bs-parent="#sidebarMenu">
        <a href="{{ route('super-admin.website.index') }}" class="nav-link"><i class="bi bi-window"></i> Website Management</a>

    <li class="nav-item"><a href="{{ route('super-admin.hero-slides.index') }}"class="nav-link"> <i class="bi bi-images me-2"></i>
        Hero Slider
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('super-admin.placements.index') }}"
       class="nav-link">
        <i class="bi bi-briefcase-fill me-2 text-white"></i>
        Student Placements
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('super-admin.trainers.index') }}"
       class="nav-link">
        <i class="bi bi-person-video3 me-2"></i>
        Professional Trainers
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('super-admin.navbar.index') }}"
       class="nav-link {{ request()->routeIs('super-admin.navbar.*') ? 'active' : '' }}">
        <i class="bi bi-menu-button-wide me-2"></i>
        Navbar Management
    </a>
</li>

    </div>



    <!-- TRAINING MANAGEMENT -->
    <button class="menu-toggle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuTraining">
        <span>Training Management</span>
        <i class="bi bi-chevron-down arrow"></i>
    </button>
    <div class="collapse" id="menuTraining" data-bs-parent="#sidebarMenu">
      <a href="{{ route('super-admin.students.index') }}"
   class="nav-link">
    <i class="bi bi-people"></i>
    <span>Student Management</span>
</a>
        <a href="{{ route('super-admin.courses.index') }}" class="nav-link"><i class="bi bi-book-fill"></i> Course Management</a>

<a href="{{ route('super-admin.modules.index') }}" class="nav-link">
    <i class="bi bi-layers-fill"></i>
    <span>Module Management</span>
</a>
<a
    href="{{ route('super-admin.progress.index') }}"
    class="nav-link {{ request()->routeIs('super-admin.progress.*') ? 'active' : '' }}"
>
    <i class="bi bi-graph-up-arrow"></i>
    <span>Student Progress</span>
</a>

        <a href="{{ route('super-admin.batches.index') }}" class="nav-link"><i class="bi bi-calendar3"></i> Batch / Class Management</a>
    </div>

    <!-- ACADEMICS -->
    <button class="menu-toggle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuAcademics">
        <span>Academics</span>
        <i class="bi bi-chevron-down arrow"></i>
    </button>
    <div class="collapse" id="menuAcademics" data-bs-parent="#sidebarMenu">
        <a href="{{ route('super-admin.attendance.create') }}" class="nav-link"><i class="bi bi-calendar-check-fill"></i> Attendance</a>
        <a href="{{ route('super-admin.study-materials.index') }}" class="nav-link"><i class="bi bi-file-earmark-pdf-fill"></i> Study Material</a>
        <a href="{{ route('super-admin.assignments.index') }}" class="nav-link"><i class="bi bi-journal-text"></i> Assignments</a>
        <a href="{{ route('super-admin.tests.index') }}" class="nav-link"><i class="bi bi-patch-question-fill"></i> Exams / Tests</a>
        <a href="{{ route('super-admin.student-progress.index') }}" class="nav-link"><i class="bi bi-graph-up-arrow"></i> Student Progress</a>
    </div>

    <!-- ADMINISTRATION -->
    <button class="menu-toggle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuAdmin">
        <span>Administration</span>
        <i class="bi bi-chevron-down arrow"></i>
    </button>
    <div class="collapse" id="menuAdmin" data-bs-parent="#sidebarMenu">
        <a href="{{ route('super-admin.certificates.index') }}" class="nav-link"><i class="bi bi-award-fill"></i> Certificates</a>
        <a href="#" class="nav-link"><i class="bi bi-megaphone-fill"></i> Notices</a>
        <a href="#" class="nav-link"><i class="bi bi-credit-card-fill"></i> Payments</a>
        <a href="#" class="nav-link"><i class="bi bi-bar-chart-fill"></i> Reports</a>
    </div>

    <!-- SYSTEM -->
    <button class="menu-toggle collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuSystem">
        <span>System</span>
        <i class="bi bi-chevron-down arrow"></i>
    </button>
    <div class="collapse" id="menuSystem" data-bs-parent="#sidebarMenu">
        <a href="#" class="nav-link"><i class="bi bi-person-circle"></i> Profile</a>
        <a href="#" class="nav-link"><i class="bi bi-gear-fill"></i> Settings</a>
    </div>

    <div class="p-3 mt-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </div>

</aside>
