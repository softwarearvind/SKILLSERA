<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $attendances = Attendance::with(['batch.course'])
            ->where('student_id', $student->id)
            ->latest('attendance_date')
            ->paginate(15);

        $total = Attendance::where('student_id', $student->id)->count();

        $present = Attendance::where('student_id', $student->id)
            ->where('status', 'present')
            ->count();

        $absent = Attendance::where('student_id', $student->id)
            ->where('status', 'absent')
            ->count();

        $halfDay = Attendance::where('student_id', $student->id)
            ->where('status', 'half_day')
            ->count();

        return view('student.attendance.index', compact(
            'student',
            'attendances',
            'total',
            'present',
            'absent',
            'halfDay'
        ));
    }
}
