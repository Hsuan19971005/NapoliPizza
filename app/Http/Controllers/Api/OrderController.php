<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Category;
use App\Models\CityDistrict;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function showShop(Request $request) {
        $input = $request->all();

        if (array_key_exists('cityName', $input)) {
            $cityName = $request->input('cityName');
            $city     = CityDistrict::where('city_name', $cityName)->first();
            if (!is_null($city)) {
                return response()->json($this->successResponse($city->district_names ?? []));
            } else {
                return response()->json($this->errorResponse("City can't be found"), 404);
            }
        }

        if (array_key_exists('districtName', $input)) {
            $districtName = $request->input('districtName');
            $storeNames   = Store::where('district', $districtName)->pluck('name')->all();
            if (!empty($storeNames)) {
                return response()->json($this->successResponse($storeNames));
            } else {
                return response()->json($this->errorResponse("No store is found"), 404);
            }
        }

        return response()->json($this->errorResponse("Parameter is missing"), 404);
    }

    public function showProducts(Request $request) {
        if (!$request->has('categoryName')) {
            return response()->json($this->errorResponse("Parameter is missing"), 404);
        }

        $products = Category::where('name', $request->input('categoryName'))
            ->first()
            ->products()
            ->select('products.id', 'name', 'price', 'img_url')
            ->get();

        if (empty($products)) {
            return response()->json($this->errorResponse("No product is found"), 404);
        }
        return response()->json($this->successResponse($products));
    }

    public function showProduct(Request $request) {
        if (!$request->has('productId')) {
            return response()->json($this->errorResponse("Parameter is missing"), 404);
        }

        $product = Product::select('name', 'price', 'description', 'img_url')->find($request->input('productId'));

        return response()->json($this->successResponse($product));
    }
}
