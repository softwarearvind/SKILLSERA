<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'course' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:3000',
        ]);

        // Email details
        $emailBody =
            "New Enquiry - SKILLS ERA\n\n" .
            "Name: " . $validated['name'] . "\n" .
            "Phone: " . $validated['phone'] . "\n" .
            "Email: " . $validated['email'] . "\n" .
            "Interested Course: " . ($validated['course'] ?: 'Not selected') . "\n" .
            "Enquiry Type: " . $validated['subject'] . "\n" .
            "Your Message: " . $validated['message'];

        // Send email to your receiving email address
        Mail::raw($emailBody, function ($mail) use ($validated) {
            $mail->to(config('mail.career_enquiry_to'))
                 ->subject('New Contact Enquiry - SKILLS ERA')
                 ->replyTo($validated['email'], $validated['name']);
        });

        // WhatsApp number with country code
        $whatsappNumber = '917536045682';

        $whatsappMessage = $emailBody;

        $whatsappUrl = 'https://wa.me/' . $whatsappNumber .
            '?text=' . urlencode($whatsappMessage);

        // Store message for the next page
        return redirect()->back()->with(
    'success',
    'Your enquiry has been submitted successfully!'
);

        return redirect()->away($whatsappUrl);
    }
}
