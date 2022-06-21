<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrackUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Build the message.
     *
     * @return TrackUploaded
     */
    public function build(): TrackUploaded
    {
        return $this->view('email-template.track-uploaded',[
            'user_name' => $this->userData->name
        ])->subject('THANK YOU!');
    }
}
