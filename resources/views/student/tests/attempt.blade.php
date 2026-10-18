@extends('layouts.student')

@section('title', $test->title)

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                {{ $test->title }}
            </h3>

            <span class="text-muted">
                {{ $test->questions->count() }} Questions
            </span>
        </div>

        <div class="timer-box">

            <i class="bi bi-clock-fill me-2"></i>

            <span id="timer">
                00:00
            </span>

        </div>

    </div>


    <form
        method="POST"
        action="{{ route('student.tests.submit', $attempt->id) }}"
        id="testForm"
    >

        @csrf


        @foreach($test->questions as $index => $question)

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="mb-3">

                        <span class="badge bg-primary mb-2">
                            Question {{ $index + 1 }}
                        </span>

                        <span class="badge bg-secondary ms-1">
                            {{ $question->marks }} Mark
                        </span>

                    </div>


                    <h5 class="fw-bold mb-4">

                        {{ $question->question }}

                    </h5>


                    @foreach($question->options as $option)

                        <div class="form-check option-box mb-2">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}"
                                id="option_{{ $option->id }}"
                            >

                            <label
                                class="form-check-label w-100"
                                for="option_{{ $option->id }}"
                            >
                                {{ $option->option_text }}
                            </label>

                        </div>

                    @endforeach

                </div>

            </div>

        @endforeach


        <div class="text-center mb-5">

            <button
                type="submit"
                class="btn btn-success btn-lg px-5"
                onclick="return confirm('Are you sure you want to submit the test?')"
            >

                <i class="bi bi-check-circle me-1"></i>

                Submit Test

            </button>

        </div>

    </form>

</div>


<style>

.timer-box {
    background: #dc3545;
    color: #fff;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 18px;
}

.option-box {
    padding: 12px 15px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
}

.option-box:hover {
    background: #f8f9fa;
}

</style>


<script>

let remainingSeconds = {{ $remainingSeconds }};

const timer = document.getElementById('timer');
const form = document.getElementById('testForm');

function updateTimer()
{
    if (remainingSeconds <= 0) {

        form.submit();

        return;
    }

    let minutes = Math.floor(
        remainingSeconds / 60
    );

    let seconds =
        remainingSeconds % 60;

    timer.innerText =
        String(minutes).padStart(2, '0')
        + ':'
        + String(seconds).padStart(2, '0');

    remainingSeconds--;
}

updateTimer();

setInterval(
    updateTimer,
    1000
);

</script>

@endsection
