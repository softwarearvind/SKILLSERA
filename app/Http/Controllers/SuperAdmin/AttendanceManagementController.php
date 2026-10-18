<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Attendance Dashboard
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $batches = Batch::with('course')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $attendances = collect();

        if ($request->filled('batch_id') && $request->filled('date')) {

            $attendances = Attendance::with('student')
                ->where('batch_id', $request->batch_id)
                ->whereDate('attendance_date', $request->date)
                ->get();
        }

        return view(
            'super-admin.attendance.index',
            compact(
                'batches',
                'attendances'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Mark Attendance Page
    |--------------------------------------------------------------------------
    */

 public function create(Request $request)
{
    $batches = Batch::with('course')
        ->where('is_active', true)
        ->orderBy('name')
        ->get();

    $students = collect();

    $attendances = collect();

    $selectedBatch = null;

    if ($request->filled('batch_id')) {

        $selectedBatch = Batch::with('course')
            ->findOrFail($request->batch_id);

        $students = $selectedBatch->students()
            ->where('users.role', 'student')
            ->where('users.is_active', true)
            ->orderBy('users.name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Existing Attendance
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date')) {

            $attendances = Attendance::where(
                'batch_id',
                $selectedBatch->id
            )
            ->whereDate(
                'attendance_date',
                $request->date
            )
            ->get();
        }
    }

    return view(
        'super-admin.attendance.create',
        compact(
            'batches',
            'students',
            'attendances',
            'selectedBatch'
        )
    );
}


    /*
    |--------------------------------------------------------------------------
    | Save Attendance
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|exists:batches,id',

            'attendance_date' => [
                'required',
                'date',
            ],

            'attendance' => 'required|array',

            'attendance.*.status' => [
                'required',
                'in:present,absent,half_day',
            ],

            'attendance.*.remarks' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);


        $batch = Batch::findOrFail($request->batch_id);


        foreach ($request->attendance as $studentId => $data) {

            /*
            |--------------------------------------------------------------------------
            | Security Check
            |--------------------------------------------------------------------------
            | Student must actually belong to this batch.
            */

            $isStudentInBatch = $batch->students()
                ->where('users.id', $studentId)
                ->exists();

            if (!$isStudentInBatch) {
                continue;
            }


            Attendance::updateOrCreate(
                [
                    'batch_id' => $batch->id,
                    'student_id' => $studentId,
                    'attendance_date' => $request->attendance_date,
                ],
                [
                    'status' => $data['status'],
                    'remarks' => $data['remarks'] ?? null,
                ]
            );
        }


        return redirect()
            ->route(
                'super-admin.attendance.index',
                [
                    'batch_id' => $batch->id,
                    'date' => $request->attendance_date,
                ]
            )
            ->with(
                'success',
                'Attendance saved successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Attendance History
    |--------------------------------------------------------------------------
    */

    public function history(Request $request)
    {
        $query = Attendance::with([
            'batch.course',
            'student',
        ]);

        if ($request->filled('batch_id')) {
            $query->where(
                'batch_id',
                $request->batch_id
            );
        }

        if ($request->filled('date')) {
            $query->whereDate(
                'attendance_date',
                $request->date
            );
        }

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        $attendances = $query
            ->latest('attendance_date')
            ->paginate(20)
            ->withQueryString();

        $batches = Batch::with('course')
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.attendance.history',
            compact(
                'attendances',
                'batches'
            )
        );
    }
}
