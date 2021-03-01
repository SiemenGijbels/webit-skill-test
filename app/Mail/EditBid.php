<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditBid extends Mailable
{
    use Queueable, SerializesModels;

    public $bid;
    public $user;
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
        return $this->view('emails.editbid')->subject('We edited your bid on ' . $this->item . ' to €' . $this->bid . ",00.");
    }
}
