<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

/**
 * Alerts the user whenever their account is signed into from a device/browser,
 * so unrecognized logins can be spotted quickly.
 */
class NewDeviceLogin extends Notification
{
    use Queueable;

    public function __construct(
        protected string $deviceName,
        protected ?string $ipAddress,
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
            'title' => 'New sign-in to your account',
            'body' => $this->ipAddress
                ? "Signed in from {$this->deviceName} ({$this->ipAddress})."
                : "Signed in from {$this->deviceName}.",
        ];
    }
}
