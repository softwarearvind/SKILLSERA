@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-4">Edit Student Placement</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form
                action="{{ route('super-admin.placements.update', $placement) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('super-admin.placements.form')
            </form>
        </div>
    </div>
</div>
@endsection
