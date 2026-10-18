@extends('layouts.admin')

@section('title', 'Super Admin Dashboard')

@section('content')

    <!-- TITLE -->
    <div class="page-title">
        <h3>Dashboard</h3>
        <p>Welcome back! Here's what's happening in your institute today.</p>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-4">
        @include('super-admin.partials.stat-card', ['title' => 'Total Students', 'number' => 0, 'note' => 'Active students',     'icon' => 'bi-people-fill', 'color' => 'icon-blue', 'arrow' => true])
        @include('super-admin.partials.stat-card', ['title' => 'Total Courses',  'number' => 0, 'note' => 'Available courses',   'icon' => 'bi-book-fill',   'color' => 'icon-green'])
        @include('super-admin.partials.stat-card', ['title' => 'Total Modules',  'number' => 0, 'note' => 'Learning modules',    'icon' => 'bi-layers-fill', 'color' => 'icon-orange'])
        @include('super-admin.partials.stat-card', ['title' => 'Certificates',   'number' => 0, 'note' => 'Issued certificates', 'icon' => 'bi-award-fill',  'color' => 'icon-purple'])
    </div>

    <!-- LOWER CONTENT -->
    <div class="row">
        <div class="col-xl-8">
            @include('super-admin.partials.recent-students')
        </div>
        <div class="col-xl-4">
            @include('super-admin.partials.quick-actions')
        </div>
    </div>

@endsection
