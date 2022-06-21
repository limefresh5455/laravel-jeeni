<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * SendFeedbackEmail
 */
class SendFeedbackEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    public $feedbackData;

    /**
     * @var array
     */
    public $mappingData;

    /**
     * @var array
     */
    public $userData;


    /**
     * @param $data array
     * @param $mapping array
     * @param $user
     */
    public function __construct(array $data, array $mapping, $user)
    {
        $this->feedbackData = $data;
        $this->mappingData = $mapping;
        $this->userData = $user;
    }

    /**
     * Build the message.
     * @return SendFeedbackEmail
     */
    public function build(): SendFeedbackEmail
    {
        return $this->view('email-template.feedback',[
            'data' => $this->feedbackData,
            'mapping' => $this->mappingData,
            'user' => $this->userData
        ])->subject('Feedback Data Received');
    }
}
