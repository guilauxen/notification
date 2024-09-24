<?php

namespace App\Services;

/**
 * Class NotificationChannelService
 *
 * @package App\Services
 */
abstract class NotificationChannelService
{
    /**
     * Send a notification to a recipient.
     * 
     * @param mixed $recipient
     * @param string $message
     * @return String
     */
    abstract public function send(mixed $recipient, string $message): String;
}