<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestMail;
use Mail;


class SendEmailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $email;
    public  $details;
    public function __construct($email,$details)
    {
        //
        $this->email=$email;
        $this->details=$details;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // send mail
       Mail::to($this->email)->send(new TestMail($this->details));


    }
}
