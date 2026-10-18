<div class="dashboard-card">

    <div class="card-header-custom">
        <h5>Quick Actions</h5>
    </div>

    @foreach ([
        ['bi-person-plus-fill',   'Add Student',    'Create a new student'],
        ['bi-bookmark-plus-fill', 'Create Course',  'Add a new training course'],
        ['bi-layers-fill',        'Add Module',     'Create course module'],
        ['bi-megaphone-fill',     'Publish Notice', 'Send notice to students'],
    ] as [$icon, $title, $desc])
        <div class="quick-action">
            <div class="quick-icon"><i class="bi {{ $icon }}"></i></div>
            <div>
                <h6>{{ $title }}</h6>
                <p>{{ $desc }}</p>
            </div>
        </div>
    @endforeach

</div>
