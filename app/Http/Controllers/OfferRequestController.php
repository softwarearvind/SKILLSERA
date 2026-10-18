<?php

namespace App\Http\Controllers;

use App\Models\OfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OfferRequestController extends Controller
{
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name'      => 'required|string|max:255',
        'email'     => 'required|email|max:255',
        'phone'     => 'required|string|max:20',
        'address'   => 'required|string',
        'course_id' => 'required|exists:courses,id',
    ]);

    // Save offer request
    $offerRequest = OfferRequest::create($validated);

    // Send email notification to admin
    try {
        $adminEmail = config('mail.career_enquiry_to');

        if ($adminEmail) {
            Mail::raw(
                "New Offer Request Received\n\n" .
                "Name: {$offerRequest->name}\n" .
                "Email: {$offerRequest->email}\n" .
                "Phone: {$offerRequest->phone}\n" .
                "Address: {$offerRequest->address}\n" .
                "Course ID: {$offerRequest->course_id}\n",
                function ($message) use ($adminEmail) {
                    $message->to($adminEmail)
                        ->subject('New Offer Request - SKILLS ERA');
                }
            );
        }
    } catch (\Throwable $e) {
        Log::error('Offer request email failed', [
            'offer_request_id' => $offerRequest->id,
            'error' => $e->getMessage(),
        ]);
    }

    return back()->with(
        'success',
        'Your offer request has been submitted successfully!'
    );
}
}
