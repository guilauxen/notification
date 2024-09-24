<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\NotificationRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\EmailService;
use App\Services\NotificationService;
use App\Services\PushNotificationService;
use App\Services\SmsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class NotificationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $smsService;
    protected $emailService;
    protected $pushNotificationService;
    protected $userRepository;
    protected $notificationRepository;
    protected $notificationService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->smsService = $this->createMock(SmsService::class);
        $this->emailService = $this->createMock(EmailService::class);
        $this->pushNotificationService = $this->createMock(PushNotificationService::class);

        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->notificationRepository = $this->createMock(NotificationRepositoryInterface::class);

        $this->notificationService = new NotificationService(
            $this->smsService,
            $this->emailService,
            $this->pushNotificationService,
            $this->userRepository,
            $this->notificationRepository
        );
    }

    public function testMessagesAreSentToUsers()
    {
        $user = User::factory()->create([
            'name' => 'Test Name',
            'phone_number' => '1234567890',
            'email' => 'test@example.com',
            'subscribed' => [1, 2, 3],
            'channels' => [1, 2, 3]
        ]);

        $this->smsService->expects($this->once())
                         ->method('send')
                         ->with('1234567890', 'Test message');

        $this->emailService->expects($this->once())
                           ->method('send')
                           ->with('test@example.com', 'Test message');

        $this->pushNotificationService->expects($this->once())
                                      ->method('send')
                                      ->with($user->id, 'Test message');

        $this->notificationService->sendMessageToUsers('Test message', 1);
    }

}
