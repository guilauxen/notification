<?php

namespace Tests\Unit;

use App\Services\SmsService;
use PHPUnit\Framework\TestCase;

class SmsServiceTest extends TestCase
{
    protected $smsService;

    public function setUp(): void
    {
        parent::setUp();

        $this->smsService = new SmsService;
    }

    public function testSmsIsSent(): void
    {
        $response = $this->smsService->send('1234567890', 'Test message');

        $this->assertEquals('SMS sent to 1234567890 with message: Test message', $response);
    }
}
