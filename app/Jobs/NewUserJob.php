<?php

namespace App\Jobs;

use App\Mail\UserCreatedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;
    public function __construct($user)
    {
        info("constructr come");
        info($user);
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info("mail area come");
        Mail::to($this->user->email)->send(new UserCreatedMail($this->user));
    }
}
