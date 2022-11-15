<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FeedbackMailer extends Mailable
{
    use Queueable, SerializesModels;

    private string $message;
    public function __construct( string $message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Форма обратной связи')
            ->view('email.reply', ['content' =>  $this->message]);
    }

}
