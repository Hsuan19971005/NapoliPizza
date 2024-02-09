<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function index() {
        return view('pages.index');
    }

    public function menu(Request $request) {
        $products = Product::all();
        switch ($request->input('type')) {
        case 'pizza':
            $products = Product::getPizza();
            break;
        case 'mini_pizza':
            $products = Product::getMiniPizza();
            break;
        case 'chicken':
            $products = Product::getChicken();
            break;
        case 'special':
            break;
        }
        return view('pages.menu', ['products' => $products]);
    }

    public function location() {
        $stores = Store::paginate(10);
        return view('pages.location', ['stores' => $stores]);
    }
}
