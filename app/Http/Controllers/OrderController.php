<?php

namespace App\Http\Controllers;
use App\Models\CityDistrict;

class OrderController extends Controller {
    public function index() {
        $cities = CityDistrict::pluck('city_name')->all();
        return view('orders.index', ['cities' => $cities]);
    }

    public function updateShopCookie() {}

    public function create() {}

    public function updateProdudctCookie() {}

    public function store() {}

    public function show() {}
}
