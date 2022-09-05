<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendStatusEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($employee)
    {
        // dd('here');
        $this->employee = $employee;
        $this->subject = 'Live Demo - About Your Employee Status';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->employee;
        return $this->view('emails.send_status',compact('data'));
    }
}
