<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

class StudentCertificateController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $certificates = Certificate::with('course')
            ->where('student_id', $student->id)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view(
            'student.certificates.index',
            compact('student', 'certificates')
        );
    }

    public function show($id)
    {
        $student = Auth::user();

        $certificate = Certificate::with([
            'course',
            'student'
        ])
            ->where('student_id', $student->id)
            ->where('is_active', true)
            ->findOrFail($id);

        $verificationUrl = route(
            'certificate.verify',
            $certificate->certificate_number
        );

        return view(
            'student.certificates.show',
            compact('student', 'certificate', 'verificationUrl')
        );
    }
}
