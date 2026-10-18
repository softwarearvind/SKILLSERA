@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Edit Question
            </h4>

            <p class="text-muted mb-0">
                Update question, options, marks and correct answer.
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route(
                'super-admin.tests.questions.show',
                [
                    'test' => $test->id,
                    'question' => $question->id
                ]
            ) }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left"></i>
                Back to Question

            </a>

            <a href="{{ route(
                'super-admin.tests.questions.index',
                $test->id
            ) }}"
               class="btn btn-outline-primary">

                <i class="bi bi-list"></i>
                All Questions

            </a>

        </div>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
                Please fix the following errors:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row">

        {{-- Main Form --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-pencil-square text-primary me-2"></i>

                        Edit Question

                    </h5>

                </div>


                <div class="card-body">

                    <form method="POST"
                          action="{{ route(
                              'super-admin.tests.questions.update',
                              [
                                  'test' => $test->id,
                                  'question' => $question->id
                              ]
                          ) }}">

                        @csrf

                        @method('PUT')


                        {{-- Question --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Question

                                <span class="text-danger">*</span>

                            </label>

                            <textarea name="question"
                                      rows="4"
                                      class="form-control @error('question') is-invalid @enderror"
                                      placeholder="Enter question">{{ old(
                                          'question',
                                          $question->question
                                      ) }}</textarea>

                            @error('question')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Type + Marks --}}
                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Question Type

                                    <span class="text-danger">*</span>

                                </label>

                                <select name="question_type"
                                        id="question_type"
                                        class="form-select @error('question_type') is-invalid @enderror">

                                    <option value="mcq"
                                        {{ old(
                                            'question_type',
                                            $question->question_type
                                        ) == 'mcq'
                                            ? 'selected'
                                            : ''
                                        }}>

                                        Multiple Choice (MCQ)

                                    </option>

                                    <option value="true_false"
                                        {{ old(
                                            'question_type',
                                            $question->question_type
                                        ) == 'true_false'
                                            ? 'selected'
                                            : ''
                                        }}>

                                        True / False

                                    </option>

                                </select>

                                @error('question_type')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Marks

                                    <span class="text-danger">*</span>

                                </label>

                                <input type="number"
                                       name="marks"
                                       min="1"
                                       max="1000"
                                       value="{{ old(
                                           'marks',
                                           $question->marks
                                       ) }}"
                                       class="form-control @error('marks') is-invalid @enderror">

                                @error('marks')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>


                        {{-- Options Header --}}
                        <div class="mb-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <label class="form-label fw-semibold mb-0">

                                        Answer Options

                                        <span class="text-danger">*</span>

                                    </label>

                                    <small class="text-muted d-block">

                                        Select the radio button for the correct answer.

                                    </small>

                                </div>


                                <button type="button"
                                        id="addOption"
                                        class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-plus-lg"></i>
                                    Add Option

                                </button>

                            </div>

                        </div>


                        {{-- Options --}}
                        <div id="optionsContainer">

                            @foreach($question->options as $index => $option)

                                <div class="option-row mb-3">

                                    <div class="input-group">

                                        {{-- Correct Radio --}}
                                        <div class="input-group-text">

                                            <input type="radio"
                                                   name="correct_option"
                                                   value="{{ $index }}"
                                                   class="form-check-input mt-0"

                                                {{ old(
                                                    'correct_option',
                                                    $question->options
                                                        ->search(
                                                            fn($item) =>
                                                            $item->is_correct
                                                        )
                                                ) == $index
                                                    ? 'checked'
                                                    : ''
                                                }}>

                                        </div>


                                        {{-- Option Letter --}}
                                        <span class="input-group-text option-number">

                                            {{ chr(65 + $index) }}

                                        </span>


                                        {{-- Option Text --}}
                                        <input type="text"
                                               name="options[{{ $index }}]"
                                               value="{{ old(
                                                   'options.' . $index,
                                                   $option->option_text
                                               ) }}"
                                               class="form-control"
                                               placeholder="Enter option {{ chr(65 + $index) }}">


                                        {{-- Remove --}}
                                        <button type="button"
                                                class="btn btn-outline-danger remove-option">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </div>

                                </div>

                            @endforeach

                        </div>


                        @error('options')

                            <div class="text-danger small mb-3">

                                {{ $message }}

                            </div>

                        @enderror


                        @error('correct_option')

                            <div class="text-danger small mb-3">

                                {{ $message }}

                            </div>

                        @enderror


                        {{-- Status --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Status

                                <span class="text-danger">*</span>

                            </label>

                            <select name="is_active"
                                    class="form-select">

                                <option value="1"
                                    {{ old(
                                        'is_active',
                                        $question->is_active ? '1' : '0'
                                    ) == '1'
                                        ? 'selected'
                                        : ''
                                    }}>

                                    Active

                                </option>

                                <option value="0"
                                    {{ old(
                                        'is_active',
                                        $question->is_active ? '1' : '0'
                                    ) == '0'
                                        ? 'selected'
                                        : ''
                                    }}>

                                    Inactive

                                </option>

                            </select>

                        </div>


                        {{-- Buttons --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route(
                                'super-admin.tests.questions.show',
                                [
                                    'test' => $test->id,
                                    'question' => $question->id
                                ]
                            ) }}"
                               class="btn btn-light border">

                                Cancel

                            </a>


                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-check-lg me-1"></i>

                                Update Question

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- Right Sidebar --}}
        <div class="col-lg-4 mt-4 mt-lg-0">

            {{-- Test Information --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">

                        <i class="bi bi-journal-check text-primary me-2"></i>

                        Test Information

                    </h6>

                </div>


                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Test
                        </small>

                        <strong>
                            {{ $test->title }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Course
                        </small>

                        <strong>
                            {{ $test->course->name ?? '-' }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Module
                        </small>

                        <strong>
                            {{ $test->module->title ?? '-' }}
                        </strong>

                    </div>


                    <hr>


                    <div class="row text-center">

                        <div class="col-6">

                            <div class="fw-bold fs-5">
                                {{ $test->duration_minutes }}
                            </div>

                            <small class="text-muted">
                                Minutes
                            </small>

                        </div>


                        <div class="col-6">

                            <div class="fw-bold fs-5">
                                {{ $test->total_marks }}
                            </div>

                            <small class="text-muted">
                                Total Marks
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Current Question --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h6 class="fw-bold mb-0">

                        <i class="bi bi-info-circle text-primary me-2"></i>

                        Current Question

                    </h6>

                </div>


                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Question #
                        </span>

                        <strong>
                            {{ $question->sort_order }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Type
                        </span>

                        <strong>

                            {{ strtoupper(
                                str_replace(
                                    '_',
                                    ' ',
                                    $question->question_type
                                )
                            ) }}

                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span class="text-muted">
                            Options
                        </span>

                        <strong>
                            {{ $question->options->count() }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span class="text-muted">
                            Marks
                        </span>

                        <strong>
                            {{ $question->marks }}
                        </strong>

                    </div>

                </div>

            </div>


            {{-- Warning --}}
            <div class="alert alert-warning border-0">

                <div class="d-flex">

                    <i class="bi bi-exclamation-triangle me-2"></i>

                    <small>

                        Changing the options will replace the existing
                        answer options for this question.

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const container =
        document.getElementById('optionsContainer');

    const addButton =
        document.getElementById('addOption');

    const typeSelect =
        document.getElementById('question_type');


    function updateOptionNumbers() {

        const rows =
            container.querySelectorAll('.option-row');


        rows.forEach(function (row, index) {

            const number =
                row.querySelector('.option-number');

            const input =
                row.querySelector('input[type="text"]');

            const radio =
                row.querySelector('input[type="radio"]');


            number.textContent =
                String.fromCharCode(65 + index);


            input.name =
                `options[${index}]`;


            input.placeholder =
                `Enter option ${String.fromCharCode(65 + index)}`;


            radio.value = index;

        });

    }


    function addOption(value = '') {

        const rows =
            container.querySelectorAll('.option-row');


        const index = rows.length;


        if (index >= 10) {

            alert('Maximum 10 options are allowed.');

            return;

        }


        const letter =
            String.fromCharCode(65 + index);


        const row =
            document.createElement('div');


        row.className =
            'option-row mb-3';


        row.innerHTML = `

            <div class="input-group">

                <div class="input-group-text">

                    <input type="radio"
                           name="correct_option"
                           value="${index}"
                           class="form-check-input mt-0">

                </div>


                <span class="input-group-text option-number">

                    ${letter}

                </span>


                <input type="text"
                       name="options[${index}]"
                       value="${value}"
                       class="form-control"
                       placeholder="Enter option ${letter}">


                <button type="button"
                        class="btn btn-outline-danger remove-option">

                    <i class="bi bi-trash"></i>

                </button>

            </div>

        `;


        container.appendChild(row);

        updateOptionNumbers();

    }


    addButton.addEventListener('click', function () {

        addOption();

    });


    container.addEventListener('click', function (event) {

        const button =
            event.target.closest('.remove-option');


        if (!button) {
            return;
        }


        const rows =
            container.querySelectorAll('.option-row');


        if (rows.length <= 2) {

            alert('At least 2 options are required.');

            return;

        }


        const currentRow =
            button.closest('.option-row');


        const radio =
            currentRow.querySelector(
                'input[type="radio"]'
            );


        if (radio.checked) {

            const firstRadio =
                container.querySelector(
                    '.option-row input[type="radio"]'
                );


            if (firstRadio) {

                firstRadio.checked = true;

            }

        }


        currentRow.remove();

        updateOptionNumbers();

    });


    typeSelect.addEventListener('change', function () {

        if (this.value === 'true_false') {

            while (
                container.querySelectorAll('.option-row').length > 2
            ) {

                container.lastElementChild.remove();

            }


            const rows =
                container.querySelectorAll('.option-row');


            if (rows[0]) {

                rows[0].querySelector(
                    'input[type="text"]'
                ).value = 'True';

            }


            if (rows[1]) {

                rows[1].querySelector(
                    'input[type="text"]'
                ).value = 'False';

            }


            addButton.style.display = 'none';

            updateOptionNumbers();

        } else {

            addButton.style.display = 'inline-block';

        }

    });


    // Initial state
    if (typeSelect.value === 'true_false') {

        addButton.style.display = 'none';

    }

});

</script>

@endsection
