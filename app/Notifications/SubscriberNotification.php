<?php

namespace App\Notifications;

use App\Models\Subscribers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriberNotification extends Notification
{
    use Queueable;
    private $subscriber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Subscribers $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->greeting('Hello, '.$this->subscriber->name)
                ->line('Welcome to EVSU - TC STUDENT SERVICES MOBILE ADVISORY.')
                ->action('Explore our Website', url('/'))
                ->line('Thank you for using our application!');
            
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
