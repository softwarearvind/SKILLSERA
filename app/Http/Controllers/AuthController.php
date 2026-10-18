<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\WebsiteSetting;
class AuthController extends Controller
{
    public function showLogin()
    {
        $websiteSetting = WebsiteSetting::first();
        return view('auth.login',compact('websiteSetting'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
            ],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        if (!$user->is_active) {
            return back()
                ->withInput()
                ->with('error', 'Your account is inactive.');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'super_admin') {
                return redirect()->route('super-admin.dashboard');
            }

            if (Auth::user()->role === 'student') {
                return redirect()->route('student.dashboard');
            }
        }

        return back()
            ->withInput()
            ->with('error', 'Invalid email or password.');
    }

    public function showRegister()
    {
        $websiteSetting = WebsiteSetting::first();
        return view('auth.register',compact('websiteSetting'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',

            // New students initially need admin approval.
            'is_active' => false,
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registration successful. Please wait for Super Admin approval.'
            );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Logged out successfully.');
    }
}
