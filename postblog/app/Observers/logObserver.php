<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\User;
use Auth;
use App\Jobs\SendEmailjob;


class logObserver
{
    /**
     * Handle the Admin "created" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function created(Admin $admin)
    {
        //
        $details = [
            'title' => 'Mail from Postblog',
            'body' => 'one post added',
        ];
       
        $email=Auth::user()->email;
        SendEmailjob::dispatch($email, $details)->delay(now()->addSecond(1));
        
    }

    /**
     * Handle the Admin "updated" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function updated(Admin $admin)
    {
        //
        $details = [
            'title' => 'Mail from Postblog',
            'body' => 'one post updated',
        ];
        $email=Auth::user()->email;
        SendEmailjob::dispatch($email, $details)->delay(now()->addSecond(1));
    }

    /**
     * Handle the Admin "deleted" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function deleted(Admin $admin)
    {
        //
        $details = [
            'title' => 'Mail from Postblog',
            'body' => 'one post Deleted',
        ];
       
        $email=Auth::user()->email;
        SendEmailjob::dispatch($email, $details)->delay(now()->addSecond(1));
    }

    /**
     * Handle the Admin "restored" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function restored(Admin $admin)
    {
        //
    }

    /**
     * Handle the Admin "force deleted" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function forceDeleted(Admin $admin)
    {
        //
    }
}
