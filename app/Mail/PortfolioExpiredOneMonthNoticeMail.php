<?php

namespace App\Mail;

use App\Models\Portfolio;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PortfolioExpiredOneMonthNoticeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('APP_NAME')),
            subject: "Your Website {$this->portfolio->name} Will Expired Soon From ".env('APP_NAME'),
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.portfolio-expired-one-month-notice',
            with: [
                'portfolio' => $this->portfolio,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
