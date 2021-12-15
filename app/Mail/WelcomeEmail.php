<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Config;
use Helper;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_info;

    /**
     * Create a new message instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->email_info = $attributes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bem-Vindo')
            ->view('emails.welcome', $this->email_info);
    }
}
