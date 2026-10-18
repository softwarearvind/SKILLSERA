<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        return view('student.profile.index', compact('student'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Current password is incorrect.');
                    }
                },
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $student = Auth::user();

        $student->password = Hash::make($request->password);
        $student->save();

        return back()->with(
            'success',
            'Password changed successfully.'
        );
    }
}
