<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user_name = '';
    public $order_details = '';
    public function __construct($user_name, $order_details)
    {
        $this->user_name = $user_name;
        $this->order_details = $order_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your package has been cancelled order #' . $this->order_details->order_number)
        ->view('backend.mail.OrderCancel', [
            'user_name' => $this->user_name,
            'order_details' =>  $this->order_details,
        ]);
    }
}
