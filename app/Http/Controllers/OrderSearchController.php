<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderSearchController extends Controller {
    public function index() {
        return view('order_searches.index');
    }

    public function search(Request $request) {
        $request->validate([
            'serial_number' => "required|string|size:14",
            'captcha'       => "required|captcha",
        ]);

        try {
            $order = Order::where('serial_number', $request->input('serial_number'))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['order_not_found' => '訂單編號輸入錯誤'])->withInput();
        }

        return view('order_searches.search', ['order' => $order]);
    }
}
