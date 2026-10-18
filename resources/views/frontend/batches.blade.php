
@extends('layouts.frontend')
@section('title', 'Batches | ' . ($websiteSetting->site_name ?? 'Institute'))

@section('meta_description', 'Learn more about our institute, training programs, trainers and career-focused education.')

@section('content')

<style>
    .batches-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #2f6f8f 100%);
        color: #fff;
        padding: 6.5rem 0 5rem;
    }
    @media (max-width: 767px) {
        .batches-hero { padding-top: 5rem; }
    }
    .batches-hero p { color: rgba(255,255,255,.8); max-width: 520px; margin: 0 auto; }

    .batches-wrap { margin-top: -2.5rem; }

    .batch-card {
        border: 1px solid #e6ebf0;
        border-radius: 14px;
        background: #fff;
        overflow: hidden;
        transition: box-shadow .2s ease, transform .2s ease;
    }
    .batch-card:hover { box-shadow: 0 10px 28px rgba(30,58,95,.12); transform: translateY(-3px); }

    .batch-top { display: flex; gap: 1rem; align-items: flex-start; }

    .date-block {
        flex: 0 0 62px;
        text-align: center;
        border-radius: 10px;
        background: #eef4f8;
        color: #1e3a5f;
        padding: .5rem 0;
        line-height: 1.1;
    }
    .date-block .day { font-size: 1.5rem; font-weight: 700; display: block; }
    .date-block .mon { font-size: .8rem; font-weight: 600; }
    .date-block .yr  { font-size: .7rem; opacity: .7; display: block; }
    .date-block.tbd  { font-size: .8rem; font-weight: 600; padding: 1rem 0; }

    .batch-title { font-size: 1.1rem; font-weight: 700; margin: 0; color: #14233a; }
    .batch-course { color: #5b6b7c; font-size: .9rem; margin: 0; }

    .mode-badge {
        display: inline-block;
        font-size: .78rem;
        font-weight: 600;
        padding: .25rem .7rem;
        border-radius: 999px;
    }
    .mode-online  { background: #e3f6ec; color: #17794a; }
    .mode-offline { background: #fff1de; color: #a15c07; }
    .mode-hybrid  { background: #e8ebff; color: #3b45a8; }
    .mode-default { background: #eef1f4; color: #55616e; }

    .batch-meta { margin: 1.25rem 0 0; padding: 0; list-style: none; }
    .batch-meta li {
        display: flex;
        justify-content: space-between;
        padding: .55rem 0;
        border-top: 1px solid #eef1f4;
        font-size: .92rem;
    }
    .batch-meta span:first-child { color: #7a8794; }
    .batch-meta span:last-child  { font-weight: 600; color: #1d2b3a; text-align: right; }

    .btn-join {
        background: #1e3a5f;
        color: #fff;
        border-radius: 10px;
        padding: .6rem 1rem;
        font-weight: 600;
    }
    .btn-join:hover { background: #2f6f8f; color: #fff; }
</style>

<section class="batches-hero text-center">
    <div class="container">
        <h1 class="fw-bold mb-2">Our Batches</h1>
        <p class="mb-0">Pick a batch that fits your schedule and start learning with us.</p>
    </div>
</section>
<br><br>

<div class="container batches-wrap pb-5">

    <div class="row g-4">

        @forelse($batches as $batch)

            @php
                $date = $batch->start_date ? \Carbon\Carbon::parse($batch->start_date) : null;
                $mode = strtolower($batch->mode ?? '');
                $modeClass = in_array($mode, ['online', 'offline', 'hybrid']) ? 'mode-' . $mode : 'mode-default';
            @endphp

            <div class="col-md-6 col-lg-4">

                <div class="batch-card h-100 p-4 d-flex flex-column">

                    <div class="batch-top">

                        @if($date)
                            <div class="date-block">
                                <span class="day">{{ $date->format('d') }}</span>
                                <span class="mon">{{ $date->format('M') }}</span>
                                <span class="yr">{{ $date->format('Y') }}</span>
                            </div>
                        @else
                            <div class="date-block tbd">Date<br>TBD</div>
                        @endif

                        <div>
                            <h4 class="batch-title">{{ $batch->name }}</h4>
                            <p class="batch-course">{{ $batch->course->name ?? 'Course not assigned' }}</p>
                        </div>

                    </div>

                    <ul class="batch-meta">
                        <li>
                            <span>Batch code</span>
                            <span>{{ $batch->code ?? '-' }}</span>
                        </li>
                        <li>
                            <span>Starts</span>
                            <span>{{ $date ? $date->format('d M Y') : 'To be announced' }}</span>
                        </li>
                        <li>
                            <span>Mode</span>
                            <span>
                                <span class="mode-badge {{ $modeClass }}">
                                    {{ $mode ? ucfirst($mode) : '-' }}
                                </span>
                            </span>
                        </li>
                        @if($batch->room)
                            <li>
                                <span>Room</span>
                                <span>{{ $batch->room }}</span>
                            </li>
                        @endif
                    </ul>

                   @if(auth()->check() && auth()->user()->role === 'student')

    @if($batch->students->contains(auth()->id()))

        {{-- Already Enrolled --}}
        @if($batch->meeting_link)
            <a href="{{ $batch->meeting_link }}"
               target="_blank"
               rel="noopener"
               class="btn btn-join mt-auto w-100">
                Join online class
            </a>
        @endif

    @else

        {{-- Not Enrolled --}}
        <a href="{{ route('website.batch.enroll', $batch->id) }}"
           class="btn btn-primary mt-auto w-100">
            Enroll Now
        </a>

    @endif

@else

    {{-- Guest User --}}
    <a href="{{ route('login') }}"
       class="btn btn-primary mt-auto w-100">
        Login to Enroll
    </a>

@endif

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="batch-card p-5 text-center">
                    <h5 class="fw-bold mb-1">No active batches right now</h5>
                    <p class="text-muted mb-0">New batches will appear here as soon as they are scheduled.</p>
                </div>
            </div>

        @endforelse

    </div>

</div>

@endsection
