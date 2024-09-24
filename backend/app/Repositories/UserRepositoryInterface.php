<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Interface UserRepositoryInterface
 * 
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * Find users by category ID.
     * 
     * @param int $categoryId
     * @return Collection
     */
    public function getUsersByCategoryId(int $categoryId): Collection;
}