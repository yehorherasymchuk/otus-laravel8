<?php

namespace App\Http\Controllers;


use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getCurrentUser(): ?User
    {
        return Auth::user();
    }

    protected function errorResponse(string $message, array $data): JsonResponse
    {
        return response()->json([
            'error' => $message,
            'data' => $data,
        ]);

    }
}
