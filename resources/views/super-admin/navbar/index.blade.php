@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Navbar Management</h3>
            <p class="text-muted mb-0">
                Manage website navigation links and buttons.
            </p>
        </div>

        <a href="{{ route('super-admin.navbar.create') }}"
           class="btn btn-primary">
            + Add Menu Item
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->sort_order }}</td>
                            <td class="fw-semibold">{{ $item->title }}</td>
                            <td>{{ $item->url ?: '—' }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ ucfirst($item->type) }}
                                </span>
                            </td>
                            <td>
                                @if($item->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('super-admin.navbar.edit', $item) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('super-admin.navbar.destroy', $item) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Delete this menu item?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No navbar items found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
