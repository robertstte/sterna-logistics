<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordRecovery extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $name;
    public $token;
    public $language;

    public function __construct($date, $name, $token, $language)
    {
        $this->date = $date;
        $this->name = $name;
        $this->token = $token;
        $this->language = $language;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Recovery Confirmation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.passwordRecovery',
            with: ['date' => $this->date, 'name' => $this->name, 'token' => $this->token, 'language' => $this->language]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}