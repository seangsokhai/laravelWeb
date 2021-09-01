<?php

namespace App\Mail;


use App\SubscribQuery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribMail extends Mailable
{
    use Queueable, SerializesModels;


    public $subscrib_query;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( SubscribQuery $subscrib_query )
    {
        $this->subscrib_query = $subscrib_query;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.subcrib-query')->with([
            'subscrib_query' => $this->subscrib_query
        ]);
    }
}
