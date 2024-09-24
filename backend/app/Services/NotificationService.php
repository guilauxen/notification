<?php

namespace App\Services;

use App\Enums\NotificationChannel;
use App\Repositories\NotificationRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class NotificationService
 *
 * @package App\Services
 */
class NotificationService
{
    protected $smsService;
    protected $emailService;
    protected $pushNotificationService;
    protected $userRepository;
    protected $notificationRepository;

    /**
     * NotificationService constructor.
     * 
     * @param  SmsService $smsService
     * @param  EmailService $emailService
     * @param  PushNotificationService $pushNotificationService
     * @param  UserRepositoryInterface $userRepository
     * @param  NotificationRepositoryInterface $notificationRepository
     */
    public function __construct(
        SmsService $smsService,
        EmailService $emailService,
        PushNotificationService $pushNotificationService,
        UserRepositoryInterface $userRepository,
        NotificationRepositoryInterface $notificationRepository)
    {
        $this->smsService = $smsService;
        $this->emailService = $emailService;
        $this->pushNotificationService = $pushNotificationService;

        $this->userRepository = $userRepository;
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Get all notifications with user data.
     * 
     * @return Collection
     */
    public function getAllNotifications(): Collection
    {
        return $this->notificationRepository->getAllWithUser();
    }

    /**
     * Send messages to users
     * 
     * @param string $message
     * @param int $categoryId
     */
    public function sendMessageToUsers(string $message, int $categoryId)
    {
        $users = $this->userRepository->getUsersByCategoryId($categoryId);

        $users->each(function ($user) use ($message, $categoryId) {
            $delivered = true;
            collect($user->channels)->each(function ($channel) use ($user, $message, &$delivered) {
                try {
                    switch ($channel) {
                        case NotificationChannel::SMS->value:
                            $this->smsService->send($user->phone_number, $message);
                            break;
                        case NotificationChannel::EMAIL->value:
                            $this->emailService->send($user->email, $message);
                            break;
                        case NotificationChannel::PUSH->value:
                            $this->pushNotificationService->send($user->id, $message);
                            break;
                        default:
                            $delivered = false;
                            throw new \Exception("Invalid notification channel: {$channel}");
                    }
                } catch (\Exception $e) {
                    $delivered = false;
                    Log::error("Failed to send notification via {$channel} to user {$user->id}: " . $e->getMessage());
                }
            });

            $this->notificationRepository->create([
                'user_id' => $user->id,
                'message' => $message,
                'category_id' => $categoryId,
                'channel' => implode(',', $user->channels),
                'delivered' => $delivered, 
            ]);
        });
    }

}