
@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-4">Edit Professional Trainer</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            Please correct the errors in the form.
        </div>
    @endif

    <form action="{{ route('super-admin.trainers.update', $trainer) }}"
          method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('super-admin.trainers._form')
    </form>
</div>
@endsection
