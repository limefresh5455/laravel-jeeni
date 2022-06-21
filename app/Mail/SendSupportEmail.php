<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $supportData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->supportData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): SendSupportEmail
    {
        return $this->view('email-template.support',[
            'data' => $this->supportData
        ])->subject('Support request received');
    }
}
