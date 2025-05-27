<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Sighting;
use App\Models\Type;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SightingMail extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    public Sighting $sighting;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Sighting $sighting)
    {
        $this->user = $user;
        $this->sighting = $sighting;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bedankt voor je melding '.$this->user->name.'!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.user.sighting',
            with: [
                'userName' => $this->user->name,
                'sightingType' => $this->sighting->type->name,
                'dateTime' => $this->sighting->date_time,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
