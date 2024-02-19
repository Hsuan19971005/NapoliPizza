<?php

namespace App\Http\Controllers;
use App\Models\CityDistrict;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function index() {
        return view('pages.index');
    }

    public function menu(Request $request) {
        $products = Product::take(15)->get();
        $subtitle = '多樣口味';
        switch ($request->input('type')) {
        case 'pizza':
            $products = Product::getPizza();
            $subtitle = '新品嚐鮮';
            break;
        case 'mini_pizza':
            $products = Product::getMiniPizza();
            $subtitle = 'MINI披薩';
            break;
        case 'chicken':
            $products = Product::getChicken();
            $subtitle = '獨門雞料理';
            break;
        case 'special':
            $products = Product::getSpecial();
            $subtitle = '精選美食';
            break;
        }

        return view('pages.menu', [
            'products' => $products,
            'subtitle' => $subtitle,
        ]);
    }

    public function location(Request $request) {
        $cities          = CityDistrict::pluck('city_name')->all();
        $requestCity     = $request->input('city');
        $requestDistrict = $request->input('district');

        $query = Store::query();
        if (!is_null($requestDistrict)) {
            $query = Store::where('district', $requestDistrict);
        } elseif (!is_null($requestCity)) {
            $districts = CityDistrict::where('city_name', $requestCity)->first()->district_names;
            $query     = Store::whereIn('district', $districts);
        }
        $stores = $query->paginate(10);

        return view('pages.location', ['stores' => $stores, 'cities' => $cities]);
    }
}
