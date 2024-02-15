<?php

namespace App\Http\Controllers;
use App\Models\CityDistrict;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller {
    public function index() {
        $cities = CityDistrict::pluck('city_name')->all();
        return view('orders.index', ['cities' => $cities]);
    }

    public function storeDeliveryCookie(Request $request) {
        $validated = $request->validate([
            'delivery_time' => 'required',
            'store_name'    => 'required',
        ]);

        Cookie::queue('deliveryInfo', json_encode($validated));

        return redirect(route('order.create'));
    }

    public function create() {
        $cookie       = Cookie::get('deliveryInfo');
        $deliveryInfo = json_decode($cookie, true);
        return view('orders.create', [
            'delivery_time' => $deliveryInfo['delivery_time'],
            'store_name'    => $deliveryInfo['store_name'],
        ]);
    }

    public function storeCartCookie(Request $request) {
        // [products] => [ 'Mini海鮮' => [4], '總匯 大披薩' => [2,1]]
        $validated = $request->validate([
            'products' => 'required|array',
        ]);
        Cookie::queue('cart', json_encode($validated));

        $cartItems = [];
        foreach ($validated['products'] as $productName => $quantity) {
            $product     = Product::where('name', $productName)->first();
            $cartItems[] = ['product' => $product, 'quantity' => array_sum($quantity)];
        }
        return view('orders.check', ['cartItems' => $cartItems]);

    }

    public function store() {}

    public function show() {}
}
