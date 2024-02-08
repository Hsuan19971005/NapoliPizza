<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CityDistrict;
use App\Models\Store;
use Illuminate\Http\Request;

class OrderController extends Controller {

    public function showShop(Request $request) {
        if ($request->has('city_name')) {
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
        } elseif ($request->has('district_name')) {
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
        } else {
            return response()->json($this->errorResponse("Parameter is missing"), 404);
        }
    }

    public function showProduct() {
        //
    }

    private function errorResponse(string $message) {
        return [
            'success' => false,
            'message' => $message,
        ];
    }
}
