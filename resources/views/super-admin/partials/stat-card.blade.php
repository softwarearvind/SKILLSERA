<div class="col-xl-3 col-md-6">
    <div class="stat-card">
        <div class="stat-top">
            <div>
                <div class="stat-title">{{ $title }}</div>
                <div class="stat-number">{{ $number }}</div>
                <div class="stat-change">
                    @if(!empty($arrow))<i class="bi bi-arrow-up"></i>@endif
                    {{ $note }}
                </div>
            </div>
            <div class="stat-icon {{ $color }}">
                <i class="bi {{ $icon }}"></i>
            </div>
        </div>
    </div>
</div>
