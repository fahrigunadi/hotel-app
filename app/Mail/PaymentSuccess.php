<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;


    public $row;
    public $kamar;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($row, $kamar)
    {
        $this->row = $row;
        $this->kamar = $kamar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Booking Invoice')
        ->markdown('mail.payment-success');
    }
}
