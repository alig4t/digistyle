<?php

namespace App\Listeners;

use App\Events\AdminLogin;
use App\Mail\Adminlogged;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailLog implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    
     public $tries = 5 ;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdminLogin  $event
     * @return void
     */
    public function handle(AdminLogin $event)
    {
        // dd($event);
       
        Mail::to($event->user->email)->send(new Adminlogged($event->user));
    }
}
