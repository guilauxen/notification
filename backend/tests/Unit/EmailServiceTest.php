<?php

namespace Tests\Unit;

use App\Services\EmailService;
use PHPUnit\Framework\TestCase;

class EmailServiceTest extends TestCase
{
    protected $emailService;

    public function setUp(): void
    {
        parent::setUp();

        $this->emailService = new EmailService;
    }

    public function testEmailIsSent(): void
    {
        $response = $this->emailService->send('test@example.com', 'Test E-Mail Message');

        $this->assertEquals('E-Mail sent to test@example.com with message: Test E-Mail Message', $response);
    }
}
