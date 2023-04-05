<?php

namespace App\Observers;

use App\Mail\UserCreatedMail;
use App\Models\user;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the user "created" event.
     */
    public function created(user $user): void
    {
        // info('Observer fired');
        // Mail::to($user->email)
        // ->cc("abc@mail.com")
        // ->bcc("xyz@mail.com")
        // ->send(new UserCreatedMail($user));
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
