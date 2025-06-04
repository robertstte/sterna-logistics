<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordChange extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $name;
    public $language;

    public function __construct($date, $name, $language)
    {
        $this->date = $date;
        $this->name = $name;
        $this->language = $language;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Change Confirmation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.passwordChange',
            with: ['date' => $this->date, 'name' => $this->name, 'language' => $this->language]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}