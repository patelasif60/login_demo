<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCreateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($employee,$type)
    {
        $this->employee = $employee;
        $this->type = $type;
        $this->subject = 'Live Demo - Create ' . $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->employee;
        $type = $this->type;
        return $this->view('emails.create_account',compact('data','type'));
    }
}
