<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class CustomerOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private string $name,
        private string $OTP,
        private Carbon $expiresAt,
        private string $title,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.customer_otp',
            with: [
                'name' => $this->name,
                'OTP' => $this->OTP,
                'expiresAt' => $this->expiresAt->toDateTimeString(),
                'title' => $this->title,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
