<?php

namespace App\Services;

/**
 * Class SmsService
 *
 * @package App\Services
 */
class SmsService extends NotificationChannelService
{
    /**
     * Send SMS to users
     * 
     * @param string $phoneNumber
     * @param string $message
     * @return String
     */
    public function send($phoneNumber, string $message): String 
    {
        // Implement Logic to SMS
        return "SMS sent to {$phoneNumber} with message: {$message}";
    }
}