<?php

namespace App\Repositories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class NotificationRepository
 *
 * @package App\Repositories
 */
class NotificationRepository implements NotificationRepositoryInterface
{
    /**
     * Create a new notification.
     *
     * @param array $data
     * @return Notification
     */
    public function create(array $data): Notification
    {
        return Notification::create($data);
    }

    /** 
     * Get all notifications
     * 
     * @return Collection
    */
    public function getAllWithUser(): Collection
    {
        return Notification::with(['user'])
            ->orderBy('created_at', 'desc')
            ->get();
    } 
}