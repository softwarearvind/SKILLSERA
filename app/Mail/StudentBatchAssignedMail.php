<?php

namespace App\Mail;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentBatchAssignedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $student,
        public Batch $batch
    ) {}

    public function build()
    {
        return $this
            ->subject('You Have Been Assigned to a Training Batch')
            ->view('emails.student-batch-assigned');
    }
}
