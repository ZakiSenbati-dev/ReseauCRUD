<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class profileMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Profile Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $body = 'The GOAT Mehhhhhhssi';
        return new Content(
            view: 'emails.inscription',
            with:compact('body')
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromStorage('public/profile/1JqsO71kn15Xyh9jvXNNqPgNOrSp5zJVkTZVRAiW.jpg')
            ->as('image.jpg')
            ->withMime('image/jpg')
        ];
    }
}
