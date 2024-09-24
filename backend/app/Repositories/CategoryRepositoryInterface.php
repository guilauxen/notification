<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

/**
 * Interface CategoryRepositoryInterface
 * 
 * @package App\Repositories
 */
interface CategoryRepositoryInterface
{
    /**
     * Get all categories.
     *
     * @return Collection
     */
    public function all(): Collection;
}