<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

class GoogleRegistrationNotification extends Notification implements ShouldQueue
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
        $profileUrl = URL::route('profile');

        return (new MailMessage)
            ->subject('Welcome to HappyCare - Account Created')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Thank you for registering with HappyCare using your Google account.')
            ->line('Your account has been created successfully and is ready to use.')
            ->line('You can now access all features of HappyCare including booking appointments, tours, and more.')
            ->action('View Your Profile', $profileUrl)
            ->line('If you did not create this account, please contact us immediately.')
            ->line('Thank you for choosing HappyCare!');
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
