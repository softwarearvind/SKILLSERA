@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <div class="text-muted small mb-1">
                {{ $course->name }}
            </div>

            <h4 class="fw-bold mb-1">
                Add Course Module
            </h4>

            <p class="text-muted mb-0">
                Create a new module for this course.
            </p>

        </div>

        <a href="{{ route(
            'super-admin.courses.modules.index',
            $course->id
        ) }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Back

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form method="POST"
                  action="{{ route(
                      'super-admin.courses.modules.store',
                      $course->id
                  ) }}">

                @csrf


                <div class="row g-4">

                    <div class="col-md-8">

                        <label class="form-label fw-semibold">
                            Module Title
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="form-control"
                               placeholder="e.g. PHP Fundamentals"
                               required>

                    </div>


                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Module Order
                        </label>

                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', 1) }}"
                               class="form-control"
                               min="1"
                               required>

                    </div>


                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Enter module description...">{{ old('description') }}</textarea>

                    </div>

                </div>


                <hr class="my-4">


                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route(
                        'super-admin.courses.modules.index',
                        $course->id
                    ) }}"
                       class="btn btn-light">

                        Cancel

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-check-lg me-1"></i>

                        Create Module

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
