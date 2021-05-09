<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourierBooking extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mail.CourierBooking')
            ->with([
                'sender'=> $this->data->sender->name,
                'receiver'=> $this->data->receiver->name,
                'delivery'=> $this->data->delivery,
                'tracking_code'=> $this->data->tracking_code,
                'status'=>$this->data->status,
                'payment'=>$this->data->payment->status,
                'total'=>$this->data->payment->amount.$this->data->payment->currency,

            ]);
    }
}
