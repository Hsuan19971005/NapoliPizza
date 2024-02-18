<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class OrderSearchController extends Controller {
    public function reloadCaptcha() {
        return response()->json([
            'success' => true,
            'message' => 'success',
            'data'    => captcha_src('math'),
        ]);
    }
}
