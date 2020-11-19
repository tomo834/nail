<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($p, $notifi_address, $email, $account_id)
    {
        $this->pass = $p;
        $this->address = $notifi_address;
        $this->email = $email;
        $this->account_id = $account_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->address)->subject('Nailtron')->view('registers.register_mail')->with(['pass' => $this->pass, 'email' => $this->email, 'account_id' => $this->account_id,]);
    }
}
