<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

/**
 * An announcement sent to one or more users by an administrator.
 */
class AdminAnnouncement extends Notification
{
    use Queueable;

    public function __construct(
        protected string $title,
        protected string $body,
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
