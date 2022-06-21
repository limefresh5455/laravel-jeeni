<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendConfiguredEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailUser)
    {
        $this->emailUser = $emailUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->emailUser->update([
            'is_processed' => true,
            'status' => true
        ]);
        return $this->view('email-template.dynamic',[
            'user' => $this->emailUser->user,
            'template' => $this->emailUser->email
        ])->subject($this->emailUser->email->subject);
    }
}
