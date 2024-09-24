<?php

namespace App\Services;

/**
 * Class NotificationChannelService
 *
 * @package App\Services
 */
class PushNotificationService extends NotificationChannelService
{
    /**
     * Send push notification to users
     * 
     * @param int $userId
     * @param string $message
     * @return String
     */
    public function send($userId, string $message): String 
    {
        // Implement Logic to Push
        return "Push Notification sent to {$userId} with message: {$message}";
    }
}