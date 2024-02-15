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

    public function addDelivery(Request $request) {
        $validated = $request->validate([
            'delivery_time' => 'required',
            'store_name'    => 'required',
        ]);

        Cookie::queue('delivery-info', json_encode($validated));
        return redirect(route('order.menu'));
    }

    public function showMenu() {
        $cookie       = Cookie::get('delivery-info');
        $deliveryInfo = json_decode($cookie, true);

        return view('orders.showMenu', [
            'delivery_time' => $deliveryInfo['delivery_time'],
            'store_name'    => $deliveryInfo['store_name'],
        ]);
    }

    public function addToCart(Request $request) {
        // [products] => [ 'Mini海鮮' => [4], '總匯 大披薩' => [2,1]]
        $validated = $request->validate([
            'products' => 'required|array',
        ]);

        $cartItems = [];
        foreach ($validated['products'] as $productName => $quantity) {
            $product     = Product::where('name', $productName)->first();
            $cartItems[] = ['productId' => $product->id, 'quantity' => array_sum($quantity)];
        }
        Cookie::queue('cart', json_encode($cartItems));

        return redirect(route('order.check-cart'));
    }

    public function checkCart(Request $request) {
        $cookie = Cookie::get('cart');
        if (is_null($cookie)) {
            return redirect(route('order.menu'));
        }

        $cookie    = json_decode($cookie, true);
        $cartItems = [];
        foreach ($cookie as $item) {
            $product     = Product::find($item['productId']);
            $cartItems[] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $item['quantity'],
            ];
        }

        return view('orders.checkCart', ['cartItems' => $cartItems]);
    }

    public function updateCart(Request $request) {
        $validated = $request->validate(['cartItems' => 'required']);

        $cartItems = [];
        foreach ($validated['cartItems'] as $productId => $quantity) {
            $cartItems[] = ['productId' => $productId, 'quantity' => $quantity];
        }
        Cookie::queue('cart', json_encode($cartItems));

        redirect(route('order.create'));
    }

    public function create() {
        return view('orders.create');
    }

    public function store() {}

    public function show() {}
}
