<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSupportCustomerEmail extends Mailable
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
     * @return SendSupportCustomerEmail
     */
    public function build(): SendSupportCustomerEmail
    {
        return $this->view('email-template.support-customer',[
            'data' => $this->supportData
        ])->subject('JEENI SUPPORT HELPDESK');
    }
}
