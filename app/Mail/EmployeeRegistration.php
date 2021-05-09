<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeRegistration extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @param $employee
     */
    public function __construct($employee)
    {
        $this->data = $employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.employeeReg')
            ->with([
                'user'=> $this->data['user'],
                'email' => $this->data['email'],
                'password' => $this->data['password'],
                'verificationCode' => $this->data['verificationCode'],
            ]);
    }
}
