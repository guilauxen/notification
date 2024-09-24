<?php

namespace App\Enums;

enum NotificationChannel: int
{
    case SMS = 1;
    case EMAIL = 2;
    case PUSH = 3;

    /**
     * Get the name of the channel.
     * 
     * @return string
     */
    public function label(): string
    {
        return match($this) {
            self::EMAIL => 'Email',
            self::SMS => 'SMS',
            self::PUSH => 'Push Notification',
        };
    }

    /**
     * Get all channel labels 
     * 
     * @return array
     */
    public function labels(): array
    {
        return array_map(fn($channel) => $channel->label(), self::cases());
    }
}
