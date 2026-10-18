@extends('layouts.admin')

@section('title', 'Student Management')

@section('content')

<style>
    .sp {
        --ink: #1b2430;
        --muted: #6b7686;
        --line: #e6eaf0;
        --bg: #f5f7fa;
        --brand: #3b5bdb;
        --ok: #12805c;
        --ok-bg: #e3f6ee;
        --wait: #a35d00;
        --wait-bg: #fff1d6;
        --bad: #c92a2a;
        padding: 24px;
        background: var(--bg);
        color: var(--ink);
    }

    .sp .card-lite {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 14px;
    }

    /* Header */
    .sp-head {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
    }
    .sp-head-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        background: var(--brand);
        color: #fff;
        display: grid; place-items: center;
        font-size: 24px;
        flex-shrink: 0;
    }
    .sp-head h3 { margin: 0; font-weight: 700; font-size: 22px; }
    .sp-head p  { margin: 2px 0 0; color: var(--muted); font-size: 14px; }

    /* Stats (clickable filters) */
    .stat {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 18px 20px;
        text-decoration: none;
        color: inherit;
        height: 100%;
        transition: border-color .15s, box-shadow .15s;
    }
    .stat:hover { border-color: var(--brand); box-shadow: 0 4px 14px rgba(59,91,219,.10); color: inherit; }
    .stat.is-active { border-color: var(--brand); box-shadow: 0 0 0 2px rgba(59,91,219,.15); }
    .stat-icon {
        width: 44px; height: 44px;
        border-radius: 12px;
        display: grid; place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .stat-number { font-size: 26px; font-weight: 700; line-height: 1.1; }
    .stat-title  { font-size: 13px; color: var(--muted); }

    /* Toolbar */
    .toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid var(--line);
    }
    .search-box { position: relative; flex: 1 1 280px; max-width: 420px; }
    .search-box i {
        position: absolute; left: 14px; top: 50%;
        transform: translateY(-50%);
        color: var(--muted);
    }
    .search-box input {
        padding-left: 40px;
        min-height: 42px;
        border-radius: 10px;
        border-color: var(--line);
        background: var(--bg);
        font-size: 14px;
    }
    .search-box input:focus { background: #fff; border-color: var(--brand); box-shadow: 0 0 0 3px rgba(59,91,219,.12); }

    .chips { display: flex; gap: 6px; flex-wrap: wrap; }
    .chip {
        padding: 7px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        color: var(--muted);
        border: 1px solid var(--line);
        background: #fff;
    }
    .chip:hover { color: var(--ink); background: var(--bg); }
    .chip.is-active { background: var(--ink); border-color: var(--ink); color: #fff; }

    /* Table */
    .student-table { margin: 0; }
    .student-table thead th {
        background: var(--bg);
        font-size: 12px;
        font-weight: 600;
        color: var(--muted);
        padding: 12px 20px;
        white-space: nowrap;
        border-bottom: 1px solid var(--line);
    }
    .student-table td {
        padding: 14px 20px;
        vertical-align: middle;
        font-size: 14px;
        border-bottom: 1px solid var(--line);
    }
    .student-table tbody tr:last-child td { border-bottom: 0; }
    .student-table tbody tr:hover td { background: #fafbff; }

    .avatar {
        width: 42px; height: 42px;
        border-radius: 50%;
        display: grid; place-items: center;
        font-weight: 700;
        flex-shrink: 0;
    }
    .av-0 { background: #e7edff; color: #3b5bdb; }
    .av-1 { background: #e3f6ee; color: #12805c; }
    .av-2 { background: #fff1d6; color: #a35d00; }
    .av-3 { background: #fde8ef; color: #c2255c; }
    .av-4 { background: #e9e4fb; color: #6741d9; }

    .student-name  { font-weight: 600; }
    .student-email { font-size: 12.5px; color: var(--muted); }

    .badge-status {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 11px;
        border-radius: 999px;
        font-size: 12.5px;
        font-weight: 600;
    }
    .badge-status::before {
        content: ""; width: 7px; height: 7px; border-radius: 50%; background: currentColor;
    }
    .badge-approved { background: var(--ok-bg); color: var(--ok); }
    .badge-pending  { background: var(--wait-bg); color: var(--wait); }

    /* Actions */
    .act {
        width: 34px; height: 34px;
        display: inline-grid; place-items: center;
        border-radius: 9px;
        border: 1px solid var(--line);
        background: #fff;
        color: var(--muted);
        text-decoration: none;
        cursor: pointer;
        transition: background .15s, color .15s, border-color .15s;
    }
    .act:hover, .act:focus-visible { color: var(--ink); border-color: #cbd3de; background: var(--bg); }
    .act.ok:hover   { color: var(--ok);   background: var(--ok-bg);   border-color: var(--ok); }
    .act.warn:hover { color: var(--wait); background: var(--wait-bg); border-color: var(--wait); }
    .act.bad:hover  { color: var(--bad);  background: #ffe9e9;        border-color: var(--bad); }

    .empty { padding: 56px 20px; text-align: center; color: var(--muted); }
    .empty i { font-size: 40px; }
    .empty strong { display: block; margin-top: 8px; color: var(--ink); }

    .pager { padding: 14px 20px; border-top: 1px solid var(--line); }
    .pager .pagination { margin: 0; }

    @media (max-width: 767px) {
        .sp { padding: 14px; }
        .student-table td, .student-table thead th { padding: 12px 14px; }
    }
</style>

@php
    $current = request('status');
    $searchQuery = request('search');
@endphp

<div class="sp">

    {{-- HEADER --}}
    <div class="sp-head">
        <div class="sp-head-icon"><i class="bi bi-mortarboard"></i></div>
        <div>
            <h3>Student Management</h3>
            <p>Review registrations, approve accounts and manage students.</p>
        </div>
    </div>

    {{-- ALERTS --}}
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center border-0 rounded-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info d-flex align-items-center border-0 rounded-3" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i> {{ session('info') }}
        </div>
    @endif

    {{-- STATS: click to filter --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <a href="{{ route('super-admin.students.index') }}"
               class="card-lite stat {{ !$current ? 'is-active' : '' }}">
                <div class="stat-icon" style="background:#e7edff;color:#3b5bdb"><i class="bi bi-people"></i></div>
                <div>
                    <div class="stat-number">{{ $totalStudents }}</div>
                    <div class="stat-title">Total students</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('super-admin.students.index', ['status' => 'pending']) }}"
               class="card-lite stat {{ $current === 'pending' ? 'is-active' : '' }}">
                <div class="stat-icon" style="background:#fff1d6;color:#a35d00"><i class="bi bi-hourglass-split"></i></div>
                <div>
                    <div class="stat-number">{{ $pendingStudents }}</div>
                    <div class="stat-title">Waiting for approval</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('super-admin.students.index', ['status' => 'approved']) }}"
               class="card-lite stat {{ $current === 'approved' ? 'is-active' : '' }}">
                <div class="stat-icon" style="background:#e3f6ee;color:#12805c"><i class="bi bi-person-check"></i></div>
                <div>
                    <div class="stat-number">{{ $approvedStudents }}</div>
                    <div class="stat-title">Approved</div>
                </div>
            </a>
        </div>
    </div>

    {{-- LIST --}}
    <div class="card-lite overflow-hidden">

        {{-- TOOLBAR --}}
        <form method="GET" action="{{ route('super-admin.students.index') }}" class="toolbar">

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text"
                       name="search"
                       class="form-control"
                       value="{{ $searchQuery }}"
                       placeholder="Search by name, email or phone"
                       aria-label="Search students">
            </div>

            @if($current)
                <input type="hidden" name="status" value="{{ $current }}">
            @endif

            <div class="chips">
                <a class="chip {{ !$current ? 'is-active' : '' }}"
                   href="{{ route('super-admin.students.index', array_filter(['search' => $searchQuery])) }}">All</a>
                <a class="chip {{ $current === 'pending' ? 'is-active' : '' }}"
                   href="{{ route('super-admin.students.index', array_filter(['search' => $searchQuery, 'status' => 'pending'])) }}">Pending</a>
                <a class="chip {{ $current === 'approved' ? 'is-active' : '' }}"
                   href="{{ route('super-admin.students.index', array_filter(['search' => $searchQuery, 'status' => 'approved'])) }}">Approved</a>
            </div>

        </form>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table student-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th class="d-none d-md-table-cell">Phone</th>
                        <th>Status</th>
                        <th class="d-none d-lg-table-cell">Registered</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($students as $student)
                    <tr>
                        {{-- STUDENT --}}
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar av-{{ ord(strtoupper(substr($student->name ?? 'S', 0, 1))) % 5 }}">
                                    {{ strtoupper(substr($student->name ?? 'S', 0, 1)) }}
                                </div>
                                <div>
                                    <div class="student-name">{{ $student->name }}</div>
                                    <div class="student-email">{{ $student->email }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- PHONE --}}
                        <td class="d-none d-md-table-cell">{{ $student->phone ?? '—' }}</td>

                        {{-- STATUS --}}
                        <td>
                            @if($student->is_active)
                                <span class="badge-status badge-approved">Approved</span>
                            @else
                                <span class="badge-status badge-pending">Pending</span>
                            @endif
                        </td>

                        {{-- DATE --}}
                        <td class="d-none d-lg-table-cell text-nowrap">
                            {{ $student->created_at?->format('d M Y') }}
                        </td>

                        {{-- ACTIONS --}}
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">

                                <a href="{{ route('super-admin.students.show', $student->id) }}"
                                   class="act" title="View details" aria-label="View details">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @if(!$student->is_active)
                                    <form method="POST" action="{{ route('super-admin.students.approve', $student->id) }}">
                                        @csrf
                                        <button type="submit" class="act ok" title="Approve" aria-label="Approve"
                                                onclick="return confirm('Approve this student?')">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('super-admin.students.deactivate', $student->id) }}">
                                        @csrf
                                        <button type="submit" class="act warn" title="Deactivate" aria-label="Deactivate"
                                                onclick="return confirm('Deactivate this student?')">
                                            <i class="bi bi-person-slash"></i>
                                        </button>
                                    </form>
                                @endif

                                <form method="POST" action="{{ route('super-admin.students.destroy', $student->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act bad" title="Delete" aria-label="Delete"
                                            onclick="return confirm('Delete this student permanently?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="p-0">
                            <div class="empty">
                                <i class="bi bi-person-x"></i>
                                <strong>No students found</strong>
                                <small>Try a different search or switch the status filter.</small>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if($students->hasPages())
            <div class="pager">
                {{ $students->withQueryString()->links() }}
            </div>
        @endif

    </div>
</div>

@endsection
