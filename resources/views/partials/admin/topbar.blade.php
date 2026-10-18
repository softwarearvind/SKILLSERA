<header class="topbar">

    <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search students, courses...">
    </div>

    <div class="top-right">

        <div class="notification">
            <i class="bi bi-bell"></i>
        </div>

        <div class="profile">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-role">Super Administrator</div>
            </div>
        </div>

    </div>

</header>
