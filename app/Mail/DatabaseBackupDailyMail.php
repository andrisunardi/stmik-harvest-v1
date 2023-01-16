<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DatabaseBackupDailyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('APP_NAME')),
            subject: 'Database Backup Daily - '.now()->isoFormat('dddd, DD MMMM YYYY'),
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.database-backup-daily',
        );
    }

    public function attachments()
    {
        return [
            // Attachment::fromPath(storage_path().'/app/database/'.now()->format('Y-m-d').'.sql')
            Attachment::fromStorage('database/'.now()->format('Y-m-d').'.sql')
                ->as('database-'.now()->format('Y-m-d').'.sql')
                ->withMime('application/gzip'),
        ];
    }
}
