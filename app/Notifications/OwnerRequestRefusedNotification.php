<?php

namespace App\Notifications;

use App\Models\OwnerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmMessage;

class OwnerRequestRefusedNotification extends Notification
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


    public function toFCM($notifiable)
    {
        return (new FCMMessage())
            ->setData([
                'title' => $this->ownerRequest->user->name,
                'body' => trans('owner_requests.messages.refused'),
                'view' => [
                    'id' => $this->ownerRequest->id,
                    'type' => 'owner_request_refused',
                    'data' => $this->ownerRequest->note,
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
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => trans('owner_requests.messages.refused'),
            'message' =>  $this->ownerRequest->business_name . " " .trans('owner_requests.messages.refused'),
        ];
    }
}
