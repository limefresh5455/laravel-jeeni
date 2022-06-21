<?php

namespace App\Jobs;

use App\Mail\SendConfiguredEmail;
use App\Models\EmailUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCustomEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emailUserId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailUserId)
    {
        $this->emailUserId = $emailUserId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailUser = EmailUser::find($this->emailUserId);
        Mail::to($emailUser->user->email)->send(new SendConfiguredEmail($emailUser));
    }
}
