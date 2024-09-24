<?php

namespace Tests\Unit;

use App\Services\PushNotificationService;
use PHPUnit\Framework\TestCase;

class PushNotificationServiceTest extends TestCase
{
    protected $pushNotificationService;

    public function setUp(): void
    {
        parent::setUp();

        $this->pushNotificationService = new PushNotificationService;
    }

    public function testPushIsSent(): void
    {
        $response = $this->pushNotificationService->send('7', 'Test Push Notification message');

        $this->assertEquals('Push Notification sent to 7 with message: Test Push Notification message', $response);
    }
}
