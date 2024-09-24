<?php

namespace App\Http\Controllers;

use App\Enums\NotificationChannel;
use App\Helpers\ApiResponse;
use App\Http\Requests\SendMessageRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;

/**
 * Class NotificationController
 *
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    protected $notificationService;

    /**
     * NotificationController constructor.
     * 
     * @param NotificationService $notificationService
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Returns a json with all notifications
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $notifications = $this->notificationService->getAllNotifications();

        $formattedNotifications = $notifications->map(function ($notification) {
            $channelIds = explode(',', $notification->channel);
            $channelNames = array_map(function ($channelId) {
                return NotificationChannel::from((int)$channelId)->label();
            }, $channelIds);

            return [
                'id' => $notification->id,
                'user' => $notification->user->name, 
                'message' => $notification->message,
                'channels' => implode(', ', $channelNames),
                'delivered' => $notification->delivered,
                'created_at' => $notification->created_at,
                'updated_at' => $notification->updated_at,
            ];
        });

        return ApiResponse::success($formattedNotifications->toArray());
    }

    /**
     * Send message to user
     * 
     * @param SendMessageRequest $request
     * @return JsonResponse
     */
    public function send(SendMessageRequest $request): JsonResponse
    {
        try {
            
            $validated = $request->validated();

            $this->notificationService->sendMessageToUsers(
                $validated['message'], 
                $validated['category_id']
            );

            return ApiResponse::success([], 'Messages sent successfully');
    
        } catch (\Illuminate\Validation\ValidationException $e) {

            $errorMessage = 'Validation failed';
            return ApiResponse::error($errorMessage, 400, $e->errors());

        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            return ApiResponse::error($errorMessage, 500);

        }
    }
}
