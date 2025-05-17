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

    public function __construct($date, $name)
    {
        $this->date = $date;
        $this->name = $name;
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
            view: 'view.emails.passwordChange',
            with: ['date' => $this->date, 'name' => $this->name]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}