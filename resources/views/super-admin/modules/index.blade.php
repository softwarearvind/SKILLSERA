@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <div class="text-muted small mb-1">
                Course Management /
                {{ $course->name }}
            </div>

            <h4 class="fw-bold mb-1">
                Course Modules
            </h4>

            <p class="text-muted mb-0">
                Manage modules for this course.
            </p>

        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('super-admin.courses.show', $course->id) }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Course

            </a>

            <a href="{{ route('super-admin.courses.modules.create', $course->id) }}"
               class="btn btn-primary">

                <i class="bi bi-plus-lg me-1"></i>
                Add Module

            </a>

        </div>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Course Info --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h5 class="fw-bold mb-1">
                        {{ $course->name }}
                    </h5>

                    <div class="text-muted">
                        {{ $course->code }}
                        ·
                        {{ $course->duration ?? 'Duration not set' }}
                    </div>

                </div>

                <div class="col-md-4 text-md-end">

                    <span class="badge bg-primary">
                        {{ $modules->count() }} Modules
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- Modules --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            @forelse($modules as $module)

                <div class="border rounded-3 p-3 mb-3">

                    <div class="d-flex align-items-center justify-content-between">

                        <div class="d-flex align-items-center">

                            <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3"
                                 style="width:50px;height:50px;">

                                {{ $module->sort_order }}

                            </div>

                            <div>

                                <h5 class="fw-semibold mb-1">
                                    {{ $module->title }}
                                </h5>

                                <div class="text-muted small">

                                    {{ $module->description
                                        ? Str::limit($module->description, 100)
                                        : 'No description'
                                    }}

                                </div>

                            </div>

                        </div>


                        <div class="d-flex align-items-center gap-2">

                            @if($module->is_active)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Inactive
                                </span>

                            @endif


                            <a href="{{ route(
                                'super-admin.courses.modules.show',
                                [$course->id, $module->id]
                            ) }}"
                               class="btn btn-sm btn-outline-primary">

                                <i class="bi bi-eye"></i>

                            </a>


                            <a href="{{ route(
                                'super-admin.courses.modules.edit',
                                [$course->id, $module->id]
                            ) }}"
                               class="btn btn-sm btn-outline-dark">

                                <i class="bi bi-pencil"></i>

                            </a>


                            <form method="POST"
                                  action="{{ route(
                                      'super-admin.courses.modules.toggle-status',
                                      [$course->id, $module->id]
                                  ) }}"
                                  class="d-inline">

                                @csrf

                                <button type="submit"
                                        class="btn btn-sm btn-outline-warning">

                                    <i class="bi bi-power"></i>

                                </button>

                            </form>


                            <form method="POST"
                                  action="{{ route(
                                      'super-admin.courses.modules.destroy',
                                      [$course->id, $module->id]
                                  ) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this module?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center py-5">

                    <i class="bi bi-collection fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        No modules found
                    </h5>

                    <p class="text-muted">
                        Create the first module for this course.
                    </p>

                    <a href="{{ route(
                        'super-admin.courses.modules.create',
                        $course->id
                    ) }}"
                       class="btn btn-primary">

                        Add First Module

                    </a>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection
