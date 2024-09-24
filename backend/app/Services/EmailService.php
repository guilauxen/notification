<?php

namespace App\Services;

/**
 * Class NotificationChannelService
 *
 * @package App\Services
 */
class EmailService extends NotificationChannelService
{
    /**
     * Send email to users
     * 
     * @param string $email
     * @param string $message
     * @return String
     */
    public function send($email, string $message): String 
    {
        // Implement Logic to Email
        return "E-Mail sent to {$email} with message: {$message}";
    }

}