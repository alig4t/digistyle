<?php

namespace App\Mail;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Adminlogged extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $time;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->time = Carbon::now()->toDateTimeString();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ورود به کنترل پنل فروشگاه')
            ->markdown('emails.admin-logged');
    }
}
