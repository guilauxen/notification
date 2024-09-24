<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * Find users by category ID.
     * 
     * @param int $categoryId
     * @return Collection
     */
    public function getUsersByCategoryId(int $categoryId): Collection
    {
        return User::whereJsonContains('subscribed', $categoryId)->get();
    }
}