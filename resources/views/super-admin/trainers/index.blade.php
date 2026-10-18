@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Professional Trainers</h3>
        <a href="{{ route('super-admin.trainers.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add Trainer
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Experience</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trainers as $trainer)
                        <tr>
                            <td>
                                @if($trainer->photo)
                                    <img src="{{ asset('storage/'.$trainer->photo) }}"
                                         width="55" height="55"
                                         style="object-fit:cover;border-radius:8px"
                                         alt="{{ $trainer->name }}">
                                @else
                                    <i class="bi bi-person-circle fs-2"></i>
                                @endif
                            </td>
                            <td>{{ $trainer->name }}</td>
                            <td>{{ $trainer->designation }}</td>
                            <td>{{ $trainer->experience ?: '—' }}</td>
                            <td>
                                <span class="badge {{ $trainer->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $trainer->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('super-admin.trainers.edit', $trainer) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>

                                <form action="{{ route('super-admin.trainers.destroy', $trainer) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this trainer?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No trainers added yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">
            {{ $trainers->links() }}
        </div>
    </div>
</div>
@endsection
