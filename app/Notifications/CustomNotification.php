<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomNotification extends Notification
{
    use Queueable;

    /**
     * @var array
     */
    private $data;

    /**
     * Create a new notification instance.
     *
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
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
        return (new FcmMessage())
            ->setData([
                'title' => $this->data['title'] ?? null,
                'body' => $this->data['body'] ?? null,
                'view' => isset($this->data['page_id']) && $this->data['page_id'] ? 'page' : 'custom',
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
        $data = [
            'title' => $this->data['title'] ?? null,
            'body' => $this->data['body'] ?? null,
            'data' => $this->data['data'] ?? null,
        ];

        if (isset($this->data['user_id']) && $this->data['user_id']) {
            $data['user_id'] = $this->data['user_id'];
        }

        return $data;
    }
}
