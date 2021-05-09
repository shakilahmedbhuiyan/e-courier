<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirm extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.PaymentConfirm')
        ->with([
            'name'=>$this->data->sender->name,
            'trx_id'=>$this->data->transaction_id,
            'total'=>$this->data->amount.$this->data->currency,
            'status'=>$this->data->status,
            'courier_status'=>$this->data->courier->status,
            'courier'=>$this->data->courier->tracking_code,
    ]);
    }
}
