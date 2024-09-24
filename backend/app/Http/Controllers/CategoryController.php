<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * 
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Returns a json with Categories
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryRepository->all()->toArray();

        return ApiResponse::success($categories);
    }
}
