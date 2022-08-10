<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;
        $user = User::find($order->user_id);
        $transaction = Transaction::where('order_id', '=', $order->id)->first();
        return $this->view('emails.orders.invoice')
            ->with([
                'order' => $order,
                'user' => $user,
            'transaction' => $transaction,
            ]);
    }
}