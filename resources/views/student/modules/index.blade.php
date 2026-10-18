@extends('layouts.student')

@section('title', 'My Modules')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            My Modules
        </h3>

        <p class="text-muted mb-0">
            View all modules available in your assigned courses.
        </p>

    </div>


    @forelse($batches as $batch)

        @php
            $course = $batch->course;
        @endphp

        <div class="card border-0 shadow-sm mb-4">

            {{-- Course Header --}}
            <div class="card-header bg-white border-0 p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="fw-bold mb-1">
                            {{ $course->name }}
                        </h4>

                        <div class="text-muted">

                            Course Code:
                            <strong>
                                {{ $course->code }}
                            </strong>

                            <span class="mx-2">|</span>

                            Batch:
                            <strong>
                                {{ $batch->name }}
                            </strong>

                        </div>

                    </div>

                    <span class="badge bg-primary">
                        {{ $course->modules->count() }} Modules
                    </span>

                </div>

            </div>


            {{-- Modules --}}
            <div class="card-body p-4">

                @forelse($course->modules as $module)

                    @php
                        $moduleProgress = $progress->get($module->id);

                        $percentage = $moduleProgress
                            ? $moduleProgress->progress_percentage
                            : 0;

                        $status = $moduleProgress
                            ? $moduleProgress->status
                            : 'not_started';
                    @endphp


                    <div class="module-card border rounded-3 p-3 mb-3">

                        <div class="row align-items-center">

                            {{-- Module Name --}}
                            <div class="col-lg-5">

                                <div class="d-flex align-items-center">

                                    <div class="module-icon me-3">

                                        <i class="bi bi-layers-fill"></i>

                                    </div>

                                    <div>

                                        <h5 class="fw-bold mb-1">

                                            Module
                                            {{ $module->sort_order }}:
                                            {{ $module->title }}

                                        </h5>

                                        @if($module->description)

                                            <p class="text-muted small mb-0">

                                                {{ Str::limit($module->description, 100) }}

                                            </p>

                                        @endif

                                    </div>

                                </div>

                            </div>


                            {{-- Materials --}}
                            <div class="col-lg-2 mt-3 mt-lg-0">

                                <div class="small text-muted">
                                    Study Materials
                                </div>

                                <strong>
                                    {{ $module->studyMaterials->count() }}
                                </strong>

                            </div>


                            {{-- Tests --}}
                            <div class="col-lg-2 mt-3 mt-lg-0">

                                <div class="small text-muted">
                                    Tests
                                </div>

                                <strong>
                                    {{ $module->onlineTests->count() }}
                                </strong>

                            </div>


                           {{-- Progress --}}
<div class="col-lg-2 mt-3 mt-lg-0">

    @php
        $percentage = $progress[$module->id]->progress_percentage ?? 0;
    @endphp

    <div class="small text-muted mb-1">
        Progress
    </div>

    <div class="progress" style="height: 7px;">

        <div
            class="progress-bar"
            role="progressbar"
            style="width: {{ $percentage }}%;"
            aria-valuenow="{{ $percentage }}"
            aria-valuemin="0"
            aria-valuemax="100"
        ></div>

    </div>

    <small class="fw-semibold">
        {{ $percentage }}%
    </small>

</div>


                            {{-- Action --}}
                            <div class="col-lg-1 text-lg-end mt-3 mt-lg-0">

                                <a
                                    href="#"
                                    class="btn btn-sm btn-primary"
                                >
                                    <i class="bi bi-play-fill"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <i class="bi bi-layers fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            No modules available
                        </h5>

                        <p class="text-muted">
                            Modules will appear here when assigned by the institute.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    @empty

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="bi bi-book fs-1 text-muted"></i>

                <h4 class="mt-3">
                    No Courses Assigned
                </h4>

                <p class="text-muted">
                    You don't have any active course or batch assigned yet.
                </p>

            </div>

        </div>

    @endforelse

</div>


<style>

.module-card {
    transition: .2s ease;
    background: #fff;
}

.module-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 18px rgba(0,0,0,.06);
}

.module-icon {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    background: #eef4ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

</style>

@endsection
