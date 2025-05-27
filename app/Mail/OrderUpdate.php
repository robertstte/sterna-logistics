<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $name;
    public $status;
    public $color;
    public $description;
    public $arrival_date;
    public $observations;
    public $order;

    public function __construct($date, $name, $status, $color, $description, $arrival_date, $observations, $order)
    {
        $this->date = $date;
        $this->name = $name;
        $this->status = $status;
        $this->color = $color;
        $this->description = $description;
        $this->arrival_date = $arrival_date;
        $this->observations = $observations;
        $this->order = $order;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update: Your order status has changed',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.orderUpdate',
            with: [
                'date' => $this->date,
                'name' => $this->name,
                'status' => $this->status,
                'color' => $this->color,
                'description' => $this->description,
                'arrival_date' => $this->arrival_date,
                'observations' => $this->observations,
                'order' => $this->order
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}