<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OutBid extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $outBidder;
    public $bid;
    public $oldBid;
    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $outBidder, $oldBid, $bid, $item)
    {
        $this->user = $user;
        $this->outBidder = $outBidder;
        $this->oldBid = $oldBid;
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
        return $this->view('emails.outbid');
    }
}
