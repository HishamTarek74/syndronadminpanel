<?php

namespace App\Notifications;

use App\Models\OwnerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OwnerRequestNotification extends Notification
{
    use Queueable;


    /**
     * @var \App\Models\OwnerRequest
     */
    protected $ownerRequest;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\OwnerRequest $ownerRequest
     */
    public function __construct(OwnerRequest $ownerRequest)
    {
        $this->ownerRequest = $ownerRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => trans('owner_requests.messages.created'),
            'message' =>  $this->ownerRequest->business_name . " " .trans('owner_requests.messages.created'),
        ];
    }
}
