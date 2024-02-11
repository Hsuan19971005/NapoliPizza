<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CityDistrict;
use App\Models\Store;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function showShop(Request $request) {
        $input = $request->all();

        if (array_key_exists('city_name', $input)) {
            $city_name = $request->input('city_name');
            $city      = CityDistrict::where('city_name', $city_name)->first();
            if (!is_null($city)) {
                return response()->json([
                    'success' => true,
                    'message' => 'success',
                    'data'    => $city->district_names ?? [],
                ]);
            } else {
                return response()->json($this->errorResponse("City can't be found"), 404);
            }
        }

        if (array_key_exists('district_name', $input)) {
            $district_name = $request->input('district_name');
            $store_names   = Store::where('district', $district_name)->pluck('name')->all();
            if (!empty($store_names)) {
                return response()->json([
                    'success' => true,
                    'message' => 'success',
                    'data'    => $store_names,
                ]);
            } else {
                return response()->json($this->errorResponse("No store is found"), 404);
            }
        }

        return response()->json($this->errorResponse("Parameter is missing"), 404);
    }

    public function showProducts(Request $request) {
        if (!$request->has('category_name')) {
            return response()->json($this->errorResponse("Parameter is missing"), 404);
        }

        $products = Category::where('name', $request->input('category_name'))
            ->first()
            ->products()
            ->select('name', 'price')
            ->get();

        if (empty($products)) {
            return response()->json($this->errorResponse("No product is found"), 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data'    => $products,
        ]);
    }

    private function errorResponse(string $message) {
        return [
            'success' => false,
            'message' => $message,
        ];
    }
}
