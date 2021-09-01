<?php

namespace App\Mail;


use App\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoreMail extends Mailable
{
    use Queueable, SerializesModels;


    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Email $email )
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.store-email')->with([
            'email' => $this->email
        ]);
    }
}
