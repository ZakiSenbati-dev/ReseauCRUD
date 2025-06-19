<?php

namespace App\Mail;

use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;


class profileMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;
    private string $email;


    /**
     * Create a new message instance.
     */
    public function __construct(private readonly Profile $profile)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Profile Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date = $this->profile->created_at;
        $id = $this->profile->id;

        $href =url('').'/Verify_email/'.base64_encode($date.'///'.$id);

        return new Content(
            view: 'emails.inscription',
            with:[
                'name'=>$this->profile->name,
                'email'=>$this->profile->email,
                'href'=>$href
            ]
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
            Attachment::fromPath(public_path('logo.png'))
                ->as('logo.png')
                ->withMime('image/png'),
        ];
    }

}
