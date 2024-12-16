<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($message = 'Request successful', $data = [], $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error($message = 'Something went wrong', $errors = [], $status = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
