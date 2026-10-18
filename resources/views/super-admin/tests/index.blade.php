@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Exams / Tests
            </h4>

            <p class="text-muted mb-0">
                Manage course and module based online tests.
            </p>
        </div>

        <a href="{{ route('super-admin.tests.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>
            Create Test

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Error Message --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Statistics --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Total Tests
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $totalTests }}
                            </h3>
                        </div>

                        <div class="text-primary fs-2">
                            <i class="bi bi-journal-check"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Active Tests
                            </small>

                            <h3 class="fw-bold text-success mb-0">
                                {{ $activeTests }}
                            </h3>
                        </div>

                        <div class="text-success fs-2">
                            <i class="bi bi-check-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <small class="text-muted">
                                Inactive Tests
                            </small>

                            <h3 class="fw-bold text-danger mb-0">
                                {{ $inactiveTests }}
                            </h3>
                        </div>

                        <div class="text-danger fs-2">
                            <i class="bi bi-x-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Filters --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('super-admin.tests.index') }}">

                <div class="row g-3">

                    <div class="col-md-7">

                        <label class="form-label">
                            Search
                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search test, course or module..."
                        >

                    </div>


                    <div class="col-md-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="">
                                All Status
                            </option>

                            <option value="active"
                                {{ request('status') === 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ request('status') === 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit"
                                class="btn btn-dark w-100">

                            <i class="bi bi-search"></i>
                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Tests Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Test</th>

                            <th>Course</th>

                            <th>Module</th>

                            <th>Duration</th>

                            <th>Marks</th>

                            <th>Passing</th>

                            <th>Status</th>

                            <th class="text-end">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($tests as $test)

                            <tr>

                                <td>
                                    {{ $tests->firstItem() + $loop->index }}
                                </td>


                                <td>

                                    <div class="fw-semibold">
                                        {{ $test->title }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $test->attempts_allowed }}
                                        attempt(s)
                                    </small>

                                </td>


                                <td>
                                    {{ $test->course->name ?? '-' }}
                                </td>


                                <td>
                                    {{ $test->module->title ?? '-' }}
                                </td>


                                <td>

                                    {{ $test->duration_minutes }}

                                    min

                                </td>


                                <td>

                                    <span class="badge bg-primary">
                                        {{ $test->total_marks }}
                                    </span>

                                </td>


                                <td>

                                    <span class="badge bg-warning text-dark">
                                        {{ $test->passing_marks }}
                                    </span>

                                </td>


                                <td>

                                    @if($test->is_active)

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                <td class="text-end">

                                    <div class="btn-group">

                                        {{-- View --}}
                                        <a href="{{ route(
                                            'super-admin.tests.show',
                                            $test->id
                                        ) }}"
                                           class="btn btn-sm btn-outline-primary">

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route(
                                            'super-admin.tests.edit',
                                            $test->id
                                        ) }}"
                                           class="btn btn-sm btn-outline-warning">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Status --}}
                                        <form method="POST"
                                              action="{{ route(
                                                  'super-admin.tests.toggle-status',
                                                  $test->id
                                              ) }}">

                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-success">

                                                <i class="bi bi-power"></i>

                                            </button>

                                        </form>


                                        {{-- Delete --}}
                                        <form method="POST"
                                              action="{{ route(
                                                  'super-admin.tests.destroy',
                                                  $test->id
                                              ) }}"
                                              onsubmit="return confirm(
                                                  'Are you sure you want to delete this test?'
                                              )">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="text-center py-5">

                                    <i class="bi bi-journal-x fs-1 text-muted"></i>

                                    <h5 class="mt-3">
                                        No Tests Found
                                    </h5>

                                    <p class="text-muted">
                                        Create your first test.
                                    </p>

                                    <a href="{{ route(
                                        'super-admin.tests.create'
                                    ) }}"
                                       class="btn btn-primary">

                                        <i class="bi bi-plus-lg"></i>
                                        Create Test

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="mt-3">

                {{ $tests->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
