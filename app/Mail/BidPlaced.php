<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BidPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $bid;
    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $bid, $item)
    {
        $this->user = $user;
        $this->bid = $bid;
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bidplaced')->subject('Your bid on ' . $this->item . ' was placed!');
    }
}
