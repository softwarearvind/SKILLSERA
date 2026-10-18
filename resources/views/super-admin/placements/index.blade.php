@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Student Placements</h3>
            <p class="text-muted mb-0">
                Manage website placement showcase
            </p>
        </div>

        <a href="{{ route('super-admin.placements.create') }}"
           class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Add Placement
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            Please check the form fields and try again.
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Student</th>
                        <th>Company</th>
                        <th>Job Role</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($placements as $placement)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($placement->student_photo)
                                    <img
                                        src="{{ asset('storage/'.$placement->student_photo) }}"
                                        alt=""
                                        width="45" height="45"
                                        class="rounded-circle"
                                        style="object-fit:cover">
                                @else
                                    <div class="rounded-circle bg-light d-flex
                                                align-items-center justify-content-center"
                                         style="width:45px;height:45px">
                                        <i class="fa-solid fa-user text-secondary"></i>
                                    </div>
                                @endif

                                <div>
                                    <div class="fw-semibold">
                                        {{ $placement->student_name }}
                                    </div>
                                    <small class="text-muted">
                                        {{ $placement->college_name }}
                                    </small>
                                </div>
                            </div>
                        </td>

                        <td>{{ $placement->company_name }}</td>
                        <td>{{ $placement->job_role }}</td>

                        <td>
                            @if($placement->is_featured)
                                <span class="badge bg-primary">Featured</span>
                            @else
                                <span class="badge bg-light text-dark">Normal</span>
                            @endif
                        </td>

                        <td>
                            @if($placement->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>

                        <td>{{ $placement->sort_order }}</td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('super-admin.placements.edit', $placement) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('super-admin.placements.destroy', $placement) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this placement?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-outline-danger"
                                            type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            No placements found. Add your first placement.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-body">
            {{ $placements->links() }}
        </div>
    </div>
</div>
@endsection
