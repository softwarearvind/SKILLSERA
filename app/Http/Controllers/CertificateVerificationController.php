<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

class CertificateVerificationController extends Controller
{
    public function verify($certificateNumber)
    {
        $certificate = Certificate::with([
            'student',
            'course'
        ])
        ->where(
            'certificate_number',
            $certificateNumber
        )
        ->first();

        return view(
            'certificate.verify',
            compact('certificate')
        );
    }
}