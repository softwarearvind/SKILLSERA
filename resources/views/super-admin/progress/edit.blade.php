@extends('layouts.admin')

@section('title', 'Edit Student Progress')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Edit Student Progress
        </h3>

        <p class="text-muted mb-0">
            Update module progress
        </p>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form
                action="{{ route(
                    'super-admin.progress.update',
                    $progress->id
                ) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="row g-4">

                    {{-- Student --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Student
                        </label>

                        <select
                            name="student_id"
                            class="form-select"
                            required
                        >

                            @foreach($students as $student)

                                <option
                                    value="{{ $student->id }}"
                                    @selected(
                                        old(
                                            'student_id',
                                            $progress->student_id
                                        ) == $student->id
                                    )
                                >
                                    {{ $student->name }}
                                    - {{ $student->email }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Course --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Course
                        </label>

                        <select
                            name="course_id"
                            id="course_id"
                            class="form-select"
                            required
                        >

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    @selected(
                                        old(
                                            'course_id',
                                            $progress->course_id
                                        ) == $course->id
                                    )
                                >
                                    {{ $course->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Module --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Module
                        </label>

                        <select
                            name="module_id"
                            id="module_id"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Select Module
                            </option>
                        </select>

                    </div>


                    {{-- Progress --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Progress Percentage
                        </label>

                        <div class="input-group">

                            <input
                                type="number"
                                name="progress_percentage"
                                value="{{ old(
                                    'progress_percentage',
                                    $progress->progress_percentage
                                ) }}"
                                min="0"
                                max="100"
                                class="form-control"
                                required
                            >

                            <span class="input-group-text">
                                %
                            </span>

                        </div>

                    </div>


                    <div class="col-12">

                        <hr>

                        <a
                            href="{{ route('super-admin.progress.index') }}"
                            class="btn btn-light"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check-lg me-1"></i>
                            Update Progress
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

const courses = @json($courses);

const courseSelect =
    document.getElementById('course_id');

const moduleSelect =
    document.getElementById('module_id');

function loadModules(courseId, selectedModule = null)
{
    moduleSelect.innerHTML =
        '<option value="">Select Module</option>';

    if (!courseId) {
        return;
    }

    const course =
        courses.find(
            course => course.id == courseId
        );

    if (!course || !course.modules) {
        return;
    }

    course.modules.forEach(function(module) {

        const option =
            document.createElement('option');

        option.value = module.id;

        option.textContent =
            module.title;

        if (
            selectedModule &&
            selectedModule == module.id
        ) {
            option.selected = true;
        }

        moduleSelect.appendChild(option);

    });
}


courseSelect.addEventListener(
    'change',
    function() {

        loadModules(this.value);

    }
);


loadModules(
    courseSelect.value,
    "{{ old('module_id', $progress->module_id) }}"
);

</script>

@endsection
