@extends('layouts.student')

@section('title', $material->title)

@section('content')

<div class="container-fluid py-4">

    <div class="mb-3">

        <a
            href="{{ route('student.study-materials.index') }}"
            class="text-decoration-none"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Study Materials
        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="d-flex align-items-start gap-3 mb-4">

                <div class="material-icon">

                    <i class="bi bi-file-earmark-text-fill"></i>

                </div>

                <div>

                    <h3 class="fw-bold mb-1">
                        {{ $material->title }}
                    </h3>

                    <div class="text-muted">

                        {{ $material->course->name ?? '' }}

                        @if($material->module)
                            /
                            {{ $material->module->title }}
                        @endif

                    </div>

                </div>

            </div>


            @if($material->description)

                <div class="mb-4">

                    <h5 class="fw-bold">
                        Description
                    </h5>

                    <p class="text-muted">
                        {{ $material->description }}
                    </p>

                </div>

            @endif


            {{-- File --}}
            @if($material->file)

                <div class="border rounded p-4 mb-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <i class="bi bi-file-earmark-arrow-down fs-3"></i>

                            <strong class="ms-2">
                                Study Material File
                            </strong>

                        </div>

                        <a
                            href="{{ asset('storage/' . $material->file) }}"
                            target="_blank"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-download me-1"></i>
                            Open / Download
                        </a>

                    </div>

                </div>

            @endif


            {{-- External URL --}}
            @if($material->external_url)

                <div class="border rounded p-4">

                    <h5 class="fw-bold mb-3">
                        External Learning Resource
                    </h5>

                    <a
                        href="{{ $material->external_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn btn-success"
                    >
                        <i class="bi bi-box-arrow-up-right me-1"></i>
                        Open Resource
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>


<style>

.material-icon {
    width: 55px;
    height: 55px;
    border-radius: 12px;
    background: #eef4ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    flex-shrink: 0;
}

</style>

@endsection
