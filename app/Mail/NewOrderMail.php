<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    private $items;
    private $restaurant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $items, $restaurant)
    {
        $this->order = $order;
        $this->items = $items;
        $this->restaurant = $restaurant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;
        $items = $this->items;
        $restaurant = $this->restaurant;
        return $this->view('mail.order.newOrder', compact('order', 'items', 'restaurant'));
    }
}
