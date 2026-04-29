<?php

namespace App\Traits;

use Illuminate\Support\MessageBag;
use phpDocumentor\Reflection\Types\Boolean;

trait HttpResponse
{
    public function response(string $message, int $status, mixed $data = [])
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'status' => $status,
            'data' => $data
        ], $status);
    }

    public function error(string $message, int $status, array|MessageBag $errors = [])
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'success' => false,
            'errors' => $errors
            
        ], $status);
    }
}