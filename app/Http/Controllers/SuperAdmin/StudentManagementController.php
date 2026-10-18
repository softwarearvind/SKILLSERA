<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\StudentApprovedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class StudentManagementController extends Controller
{
    /**
     * Student listing
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'student');

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {

            if ($request->status === 'pending') {
                $query->where('is_active', false);
            }

            if ($request->status === 'approved') {
                $query->where('is_active', true);
            }
        }

        $students = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        // Statistics
        $totalStudents = User::where('role', 'student')->count();

        $pendingStudents = User::where('role', 'student')
            ->where('is_active', false)
            ->count();

        $approvedStudents = User::where('role', 'student')
            ->where('is_active', true)
            ->count();

        return view('super-admin.students.index', compact(
            'students',
            'totalStudents',
            'pendingStudents',
            'approvedStudents'
        ));
    }


    /**
     * View student
     */
    public function show($id)
    {
        $student = User::where('role', 'student')
            ->findOrFail($id);

        return view(
            'super-admin.students.show',
            compact('student')
        );
    }


    /**
     * Approve student
     */
    public function approve($id)
    {
        $student = User::where('role', 'student')
            ->findOrFail($id);

        if ($student->is_active) {

            return back()->with(
                'info',
                'Student is already approved.'
            );
        }

        $student->is_active = true;
        $student->save();

        // Queue email
        Mail::to($student->email)
            ->queue(new StudentApprovedMail($student));

        return back()->with(
            'success',
            'Student approved successfully. Approval email has been queued.'
        );
    }


    /**
     * Deactivate student
     */
    public function deactivate($id)
    {
        $student = User::where('role', 'student')
            ->findOrFail($id);

        $student->is_active = false;
        $student->save();

        return back()->with(
            'success',
            'Student account deactivated successfully.'
        );
    }


    /**
     * Delete student
     */
    public function destroy($id)
    {
        $student = User::where('role', 'student')
            ->findOrFail($id);

        $student->delete();

        return back()->with(
            'success',
            'Student deleted successfully.'
        );
    }
}
