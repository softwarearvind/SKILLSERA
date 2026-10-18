@extends('layouts.student')

@section('title', 'Test Result')

@section('content')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body text-center py-5">

            @if($attempt->is_passed)

                <div class="result-icon success">
                    <i class="bi bi-check-lg"></i>
                </div>

                <h2 class="fw-bold text-success mt-3">
                    Congratulations!
                </h2>

                <p class="text-muted">
                    You have passed the test.
                </p>

            @else

                <div class="result-icon failed">
                    <i class="bi bi-x-lg"></i>
                </div>

                <h2 class="fw-bold text-danger mt-3">
                    Test Failed
                </h2>

                <p class="text-muted">
                    Better luck next time.
                </p>

            @endif


            <h4 class="fw-bold mt-4">
                {{ $attempt->test->title }}
            </h4>


            <div class="row justify-content-center mt-4">

                <div class="col-md-3">

                    <div class="result-box">

                        <small class="text-muted">
                            Your Score
                        </small>

                        <h2 class="fw-bold">
                            {{ $attempt->score }}
                        </h2>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="result-box">

                        <small class="text-muted">
                            Total Marks
                        </small>

                        <h2 class="fw-bold">
                            {{ $attempt->total_marks }}
                        </h2>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="result-box">

                        <small class="text-muted">
                            Passing Marks
                        </small>

                        <h2 class="fw-bold">
                            {{ $attempt->test->passing_marks }}
                        </h2>

                    </div>

                </div>

            </div>


            <div class="mt-4">

                <a
                    href="{{ route('student.tests.index') }}"
                    class="btn btn-primary"
                >
                    Back to Tests
                </a>

            </div>

        </div>

    </div>

</div>


<style>

.result-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
}

.result-icon.success {
    background: #d1e7dd;
    color: #198754;
}

.result-icon.failed {
    background: #f8d7da;
    color: #dc3545;
}

.result-box {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin: 5px;
}

</style>

@endsection
