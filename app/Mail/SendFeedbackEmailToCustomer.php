<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * SendFeedbackEmailToCustomer
 */
class SendFeedbackEmailToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    public $userData;

    public $subject = 'THANKS FOR YOUR FEEDBACK';


    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->userData = $user;
    }

    /**
     * Build the message.
     * @return SendFeedbackEmailToCustomer
     */
    public function build(): SendFeedbackEmailToCustomer
    {
        return $this->view('email-template.feedback-customer',[
            'user' => $this->userData,
            'subject' => $this->subject
        ])->subject($this->subject);
    }
}
