<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HappyBirthdayMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('APP_NAME')),
            subject: "Happy Birthday {$this->user->name} From ".env('APP_NAME'),
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.happy-birthday',
            with: [
                'user' => $this->user,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
