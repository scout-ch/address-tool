<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class AddressMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $contact)
    {
        $this->wrong_user = $data;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))->replyTo(env('MAIL_USERNAME'))->view('template.mail')->with(['wrong_user' => $this->wrong_user, 'contact' => $this->contact]);
    }
}
