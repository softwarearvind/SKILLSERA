<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerEnquiryMail;


class TrainingController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::first();
        return view('frontend.training', compact('websiteSetting'));
    }

    public function career()
    {
        $websiteSetting = WebsiteSetting::first();
        return view('frontend.career', compact('websiteSetting'));
    }

    public function certificates()
    {
        $websiteSetting = WebsiteSetting::first();
        return view('frontend.certificates', compact('websiteSetting'));
    }

    public function contact()
    {
        $websiteSetting = WebsiteSetting::first();
        return view('frontend.contact', compact('websiteSetting'));
    }

     public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'qualification' => 'nullable|string|max:100',
            'support_type' => 'required|string|max:100',
            'message' => 'nullable|string|max:2000',
        ]);

      $receiverEmail = config('mail.career_enquiry_to');

if (empty($receiverEmail)) {
    return back()->withErrors([
        'email' => 'Enquiry receiving email is not configured.'
    ])->withInput();
}

Mail::to($receiverEmail)
    ->send(new CareerEnquiryMail($validated));

return back()->with(
    'success',
    'Your enquiry has been submitted successfully!'
);
    }





}
