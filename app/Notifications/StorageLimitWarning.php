<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

/**
 * Warns the user their storage is nearly full, before uploads/backups start failing.
 */
class StorageLimitWarning extends Notification
{
    use Queueable;

    public function __construct(
        protected int $usedBytes,
        protected int $limitBytes,
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
        $percent = (int) round(($this->usedBytes / max($this->limitBytes, 1)) * 100);

        return [
            'title' => 'Storage almost full',
            'body' => "You've used {$percent}% of your storage. Upgrade your plan or free up space to keep backing up.",
        ];
    }
}
