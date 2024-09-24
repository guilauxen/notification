<?php

namespace App\Repositories;

use App\Models\Notification;
use Illuminate\Support\Collection;

/**
 * Interface NotificationRepositoryInterface
 * 
 * @package App\Repositories
 */
interface NotificationRepositoryInterface
{
    /**
     * Create a new notification.
     *
     * @param array $data
     * @return Notification
     */
    public function create(array $data): Notification;

    /**
     * Get all notifications
     * 
     * @return Collection
     */
    public function getAllWithUser(): Collection;
}