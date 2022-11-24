<?php

namespace App\Notifications;

use App\Models\Card;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Fcm\FcmMessage;


class CardStatusUpdatedNotification extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Card
     */
    protected $card;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\OwnerRequest $ownerRequest
     */
    public function __construct(Card $card)
    {
        $this->card = $card;
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


    public function toFCM($notifiable)
    {
        return (new FCMMessage())
            ->setData([
                'title' => $this->card->title,
                'body' => trans('cards.messages.status_updated'),
                'view' => [
                    'id' => $this->card->id,
                    'type' => 'card_status_updated',
                    'data' => $this->card->status,
                ],
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
            ])
            ->setContentAvailable(true)
            ->setMutableContent(true)
            ->setPriority(FcmMessage::PRIORITY_HIGH);
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
            'title' => trans('cards.messages.status_updated'),
            'body' => $this->card->status,
            'message' =>  $this->card->title . " " .trans('cards.messages.status_updated'),
        ];
    }
}
