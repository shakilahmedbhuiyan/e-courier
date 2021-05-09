<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromoteToManager extends Mailable
{
    use Queueable, SerializesModels;

    private $data,$date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$date)
    {
        $this->data = $data;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.PromoteToManager')
            ->with([
                'name' => $this->data->employee->name,
                'branch' => $this->data->branch->name,
                'location' => $this->data->branch->address,
                'date'=> date('l, M d Y', strtotime($this->date) ),
            ]);
    }
}
