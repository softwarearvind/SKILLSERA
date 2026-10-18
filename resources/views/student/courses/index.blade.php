@extends('layouts.student')

@section('title', 'My Courses')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h3 class="fw-bold mb-1">

            My Courses

        </h3>

        <p class="text-muted mb-0">

            View your assigned training courses and learning progress.

        </p>

    </div>


    {{-- Courses --}}
    <div class="row g-4">

        @forelse($batches as $batch)

            @php

                $course = $batch->course;

                $moduleCount =
                    $course?->modules?->count() ?? 0;

            @endphp


            <div class="col-xl-4 col-lg-6">

                <div class="course-card h-100">


                    {{-- Course Image --}}
                    <div class="course-cover">

                        @if($course?->thumbnail)

                            <img
                                src="{{ asset(
                                    'storage/' .
                                    $course->thumbnail
                                ) }}"
                                alt="{{ $course->name }}"
                            >

                        @else

                            <div class="course-cover-icon">

                                <i class="bi bi-mortarboard-fill"></i>

                            </div>

                        @endif


                        <span class="course-mode">

                            {{ ucfirst($course->mode ?? 'offline') }}

                        </span>

                    </div>


                    {{-- Body --}}
                    <div class="p-4">


                        <div class="d-flex
                                    justify-content-between
                                    align-items-start
                                    gap-2 mb-2">

                            <h5 class="fw-bold mb-0">

                                {{ $course->name
                                    ?? 'Course' }}

                            </h5>

                        </div>


                        <div class="text-muted small mb-3">

                            <i class="bi bi-upc-scan me-1"></i>

                            {{ $course->code ?? 'N/A' }}

                        </div>


                        {{-- Description --}}
                        <p class="text-muted small">

                            {{ \Illuminate\Support\Str::limit(
                                $course->description
                                    ?? 'Training course',
                                100
                            ) }}

                        </p>


                        {{-- Batch --}}
                        <div class="course-info">

                            <div>

                                <i class="bi bi-people-fill"></i>

                                <span>

                                    {{ $batch->name }}

                                </span>

                            </div>


                            <div>

                                <i class="bi bi-calendar-event"></i>

                                <span>

                                    {{ $batch->start_date
                                        ? $batch->start_date
                                            ->format('d M Y')
                                        : '—' }}

                                </span>

                            </div>


                            <div>

                                <i class="bi bi-layers-fill"></i>

                                <span>

                                    {{ $moduleCount }}
                                    Modules

                                </span>

                            </div>

                        </div>


                        {{-- Progress --}}
                        <div class="mt-3">

                            <div class="d-flex
                                        justify-content-between
                                        mb-1">

                                <small class="text-muted">

                                    Course Progress

                                </small>

                                <small class="fw-bold">

                                    0%

                                </small>

                            </div>


                            <div
                                class="progress"
                                style="height: 7px;"
                            >

                                <div
                                    class="progress-bar"
                                    style="width: 0%;"
                                ></div>

                            </div>

                        </div>


                        {{-- Button --}}
                        <div class="mt-4">

                            <a
                                href="{{ route(
                                    'student.courses.show',
                                    $batch->id
                                ) }}"
                                class="btn btn-primary w-100"
                            >

                                <i class="bi bi-play-circle me-1"></i>

                                Continue Learning

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="empty-course">

                    <div class="empty-icon">

                        <i class="bi bi-book"></i>

                    </div>

                    <h5 class="fw-bold mt-3">

                        No Courses Assigned

                    </h5>

                    <p class="text-muted mb-0">

                        Your assigned courses will appear here
                        after the institute assigns a batch to you.

                    </p>

                </div>

            </div>

        @endforelse

    </div>


    {{-- Pagination --}}
    @if($batches->hasPages())

        <div class="mt-4">

            {{ $batches->links() }}

        </div>

    @endif

</div>


<style>

.course-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #e8eaf0;
    box-shadow: 0 5px 20px rgba(0,0,0,.05);
    transition: .25s ease;
}

.course-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0,0,0,.10);
}

.course-cover {
    height: 180px;
    position: relative;
    overflow: hidden;
    background: #eef2ff;
}

.course-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.course-cover-icon {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    color: #4f46e5;
}

.course-mode {
    position: absolute;
    top: 14px;
    right: 14px;
    background: #ffffff;
    color: #111827;
    border-radius: 30px;
    padding: 6px 12px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
}

.course-info {
    border-top: 1px solid #eeeeee;
    border-bottom: 1px solid #eeeeee;
    padding: 12px 0;
}

.course-info div {
    display: flex;
    align-items: center;
    gap: 9px;
    color: #6b7280;
    font-size: 13px;
    margin-bottom: 8px;
}

.course-info div:last-child {
    margin-bottom: 0;
}

.course-info i {
    color: #4f46e5;
}

.empty-course {
    background: #ffffff;
    border-radius: 16px;
    padding: 70px 20px;
    text-align: center;
    border: 1px dashed #d1d5db;
}

.empty-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: #eef2ff;
    color: #4f46e5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    font-size: 30px;
}

</style>

@endsection