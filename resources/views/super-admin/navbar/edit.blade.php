@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit Navbar Item</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('super-admin.navbar.update', $item) }}"
                  method="POST">
                @csrf
                @method('PUT')

                @include('super-admin.navbar._form', ['item' => $item])
            </form>
        </div>
    </div>
</div>
@endsection
