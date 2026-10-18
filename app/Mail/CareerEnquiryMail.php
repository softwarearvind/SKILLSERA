<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $enquiry;

    public function __construct(array $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    public function build()
    {
        return $this->subject('New Career Enquiry - SKILLS ERA')
                    ->view('emails.career-enquiry');
    }
}
