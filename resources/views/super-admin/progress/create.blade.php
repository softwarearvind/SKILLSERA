@extends('layouts.admin')

@section('title', 'Add Student Progress')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Add Student Progress
        </h3>

        <p class="text-muted mb-0">
            Set module progress for a student
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
                action="{{ route('super-admin.progress.store') }}"
                method="POST"
            >

                @csrf


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

                            <option value="">
                                Select Student
                            </option>

                            @foreach($students as $student)

                                <option
                                    value="{{ $student->id }}"
                                    @selected(old('student_id') == $student->id)
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

                            <option value="">
                                Select Course
                            </option>

                            @foreach($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    @selected(old('course_id') == $course->id)
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
                                Select Course First
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
                                value="{{ old('progress_percentage', 0) }}"
                                min="0"
                                max="100"
                                class="form-control"
                                required
                            >

                            <span class="input-group-text">
                                %
                            </span>

                        </div>

                        <small class="text-muted">
                            Enter value between 0 and 100.
                        </small>

                    </div>


                    {{-- Buttons --}}
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
                            Save Progress
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Course Modules --}}
<script>

const courses = @json($courses);

const courseSelect =
    document.getElementById('course_id');

const moduleSelect =
    document.getElementById('module_id');

function loadModules(courseId)
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

        moduleSelect.appendChild(option);

    });
}

courseSelect.addEventListener(
    'change',
    function() {

        loadModules(this.value);

    }
);

@if(old('course_id'))

    loadModules({{ old('course_id') }});

    moduleSelect.value =
        "{{ old('module_id') }}";

@endif

</script>

@endsection
