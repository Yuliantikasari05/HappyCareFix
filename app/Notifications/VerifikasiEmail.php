<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class VerifikasiEmail extends BaseVerifyEmail
{
    /**
     * Override default email template.
     */
    public function toMail($notifiable): MailMessage
    {
        $url = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verifikasi Email Anda - HappyCare')
            ->markdown('emails.verify', [
                'user' => $notifiable,
                'url' => $url,
            ]);
    }
}
