<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoteEtudeMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $demande = [];
    /**
     * Create a new message instance.
     */
    public function __construct( public array $demand )
    {
        $this->demande = $demand;
        //dd($this->demande['note']);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ministère des Infrastructures et du désenclavement',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.noteEtudes.envoieNote',
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
            Attachment::fromStorage($this->demande['note'])
                    ->as('Devis.pdf')
                    ->withMime('application/pdf'),
        ];
    }
}
