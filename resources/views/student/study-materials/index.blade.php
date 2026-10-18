@extends('layouts.student')
@php
    use Illuminate\Support\Str;
@endphp
@section('title', 'Study Materials')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Study Materials
        </h3>

        <p class="text-muted mb-0">
            Access your course notes, documents and learning materials.
        </p>

    </div>


    {{-- Materials --}}
    <div class="row g-4">

        @forelse($materials as $material)

            <div class="col-xl-4 col-lg-6">

                <div class="card material-card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        {{-- Icon --}}
                        <div class="material-icon mb-3">

                            @if($material->file_type === 'pdf')

                                <i class="bi bi-file-earmark-pdf-fill"></i>

                            @elseif(in_array($material->file_type, ['doc', 'docx']))

                                <i class="bi bi-file-earmark-word-fill"></i>

                            @elseif(in_array($material->file_type, ['xls', 'xlsx']))

                                <i class="bi bi-file-earmark-excel-fill"></i>

                            @else

                                <i class="bi bi-file-earmark-text-fill"></i>

                            @endif

                        </div>


                        {{-- Title --}}
                        <h5 class="fw-bold mb-2">

                            {{ $material->title }}

                        </h5>


                        {{-- Course --}}
                        <div class="small text-muted mb-1">

                            <i class="bi bi-book me-1"></i>

                            {{ $material->course->name ?? 'Course' }}

                        </div>


                        {{-- Module --}}
                        <div class="small text-muted mb-3">

                            <i class="bi bi-layers me-1"></i>

                            {{ $material->module->title ?? 'Module' }}

                        </div>


                        {{-- Description --}}
                        @if($material->description)

                            <p class="text-muted small">

                                {{ Str::limit($material->description, 120) }}

                            </p>

                        @endif


                        {{-- Action --}}
                        <a
                            href="{{ route('student.study-materials.show', $material->id) }}"
                            class="btn btn-primary w-100"
                        >

                            <i class="bi bi-eye me-1"></i>

                            View Material

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-file-earmark-x fs-1 text-muted"></i>

                        <h5 class="mt-3">
                            No Study Materials
                        </h5>

                        <p class="text-muted mb-0">
                            Study materials will appear here when your instructor adds them.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>


    {{-- Pagination --}}
    @if($materials->hasPages())

        <div class="mt-4">

            {{ $materials->links() }}

        </div>

    @endif

</div>


<style>

.material-card {
    transition: .2s ease;
}

.material-card:hover {
    transform: translateY(-4px);
}

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
}

</style>

@endsection
