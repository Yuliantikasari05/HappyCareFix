<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class GoogleLoginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $time = Carbon::now()->format('d M Y, H:i:s');
        $ipAddress = request()->ip();
        $userAgent = request()->header('User-Agent');
        
        return (new MailMessage)
                    ->subject('Login Baru ke Akun HappyCare Anda')
                    ->greeting('Halo ' . $notifiable->name . '!')
                    ->line('Kami mendeteksi login baru ke akun HappyCare Anda menggunakan Google.')
                    ->line('Detail login:')
                    ->line('- Waktu: ' . $time)
                    ->line('- IP Address: ' . $ipAddress)
                    ->line('- Browser: ' . $userAgent)
                    ->line('Jika ini adalah Anda, Anda tidak perlu melakukan apa pun.')
                    ->line('Jika Anda tidak melakukan login ini, silakan segera ubah kata sandi Anda.')
                    ->action('Kelola Akun Anda', url('/profile'))
                    ->line('Terima kasih telah menggunakan aplikasi HappyCare!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
 