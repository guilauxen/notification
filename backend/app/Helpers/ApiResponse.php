<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * Returns a success response in JSON format.
     * 
     * @param array $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function success(
        array $data = [], 
        string $message = 'Success', 
        int $statusCode = 200
    ): JsonResponse
    {
        return response()->json([
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public static function error(
        string $message = 'An error ocurred', 
        int $statusCode = 400, 
        array $error = []
    ): JsonResponse
    {   
        return response()->json([
            'status_code' => $statusCode,
            'message' => $message,
            'error' => $error,
        ], $statusCode);
    }
}