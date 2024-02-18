<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function errorResponse(string $message) {
        return [
            'success' => false,
            'message' => $message,
        ];
    }

    protected function successResponse($data, string $message = 'success') {
        return [
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ];
    }
}
