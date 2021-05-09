<?php

namespace App\Mail;

use App\Courier;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourierNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $courier = Courier::with('receiver', 'sender', 'payment')
            ->where('id',$id)->first();
        $this->data=$courier;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): CourierNotification
    {
        return $this->view('mail.CourierNotification')
            ->to($this->data->receiver->email)
            ->cc($this->data->sender->email)
            ->with([
                'sender' => $this->data->sender->name,
                'receiver' => $this->data->receiver->name,
                'delivery' => $this->data->delivery,
                'tracking_code' => $this->data->tracking_code,
                'status' => $this->data->status,
            ]);
    }
}
