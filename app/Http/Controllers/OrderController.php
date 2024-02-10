<?php

namespace App\Http\Controllers;
use App\Models\CityDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller {
    public function index() {
        $cities = CityDistrict::pluck('city_name')->all();
        return view('orders.index', ['cities' => $cities]);
    }

    public function updateShopCookie(Request $request) {
        $validated = $request->validate([
            'delivery_time' => 'required',
            'store_name'    => 'required',
        ]);

        Cookie::queue('deliveryInfo', json_encode($validated));

        return redirect(route('order.create'));
    }

    public function create() {
        $cookie = Cookie::get('deliveryInfo');
        // var_dump($cookie);
        return view('orders.create');
    }

    public function updateProdudctCookie() {}

    public function store() {}

    public function show() {}
}
