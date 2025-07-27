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
        private Carbon $expiresAt
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác Nhận OTP Đăng Ký Tài Khoản',
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
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
