<?php

namespace App\Http\Controllers;
use App\Models\CityDistrict;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller {
    public function __construct() {
        $this->middleware('ensure.get.request:from_add_to_cart')->only('checkCart');
        $this->middleware('ensure.get.request:from_update_cart')->only('create');
        $this->middleware('ensure.get.request:from_store')->only('show');
    }

    public function index() {
        $cities = CityDistrict::pluck('city_name')->all();
        return view('orders.index', ['cities' => $cities]);
    }

    public function addDelivery(Request $request) {
        $validated = $request->validate([
            'deliveryDate' => 'required',
            'storeName'    => 'required',
        ]);

        Cookie::queue('delivery-info', json_encode($validated));
        return redirect(route('order.menu'));
    }

    public function showMenu() {
        $cookie = Cookie::get('delivery-info');
        if (is_null($cookie)) {
            return redirect(route('order.index'));
        }

        $deliveryInfo = json_decode($cookie, true);

        return view('orders.showMenu', [
            'deliveryDate' => $deliveryInfo['deliveryDate'],
            'storeName'    => $deliveryInfo['storeName'],
        ]);
    }

    public function addToCart(Request $request) {
        // [products] => [ 'Mini海鮮' => [4], '總匯 大披薩' => [2,1]]
        $validated = $request->validate(['products' => 'required|array']);

        $cartItems = [];
        foreach ($validated['products'] as $productName => $quantity) {
            $product     = Product::where('name', $productName)->first();
            $cartItems[] = ['productId' => $product->id, 'quantity' => array_sum($quantity)];
        }
        Cookie::queue('cart', json_encode($cartItems));
        $request->session()->put('from_add_to_cart', true);

        return redirect(route('order.check-cart'));
    }

    public function checkCart() {
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

        return view('orders.check-cart', ['cartItems' => $cartItems]);
    }

    public function updateCart(Request $request) {
        $validated = $request->validate(['cartItems' => 'required']);

        $cartItems = [];
        foreach ($validated['cartItems'] as $productId => $quantity) {
            $cartItems[] = ['productId' => $productId, 'quantity' => $quantity];
        }
        Cookie::queue('cart', json_encode($cartItems));
        $request->session()->put('from_update_cart', true);

        return redirect(route('order.create'));
    }

    public function create() {
        $cookie       = Cookie::get('delivery-info');
        $deliveryInfo = json_decode($cookie, true);

        return view('orders.create', [
            'deliveryDate' => $deliveryInfo['deliveryDate'],
            'storeName'    => $deliveryInfo['storeName'],
        ]);
    }

    public function store(Request $request) {
        // ["customerName" => "Jack", "gender" => "Female", "phoneNumber" => "0928420187", "deliveryTime" => "下午07:00"];
        $validated = $request->validate([
            'customerName' => 'required',
            'gender'       => 'required',
            'phoneNumber'  => 'required',
            'deliveryTime' => 'required',
        ]);
        $cartCookie     = Cookie::get('cart');
        $deliveryCookie = Cookie::get('delivery-info');
        if (is_null($cartCookie) || is_null($deliveryCookie)) {
            return redirect(route('order.index'));
        }

        // [['productId' => 50, 'quantity' => 2], ['productId' => 32, 'quantity' => 1]...]
        $cartCookie = json_decode($cartCookie, true);
        // ['deliveryDate' => '2024-02-15', 'storeName' => '基隆愛買店']
        $deliveryCookie = json_decode($deliveryCookie, true);

        $items      = [];
        $totalPrice = 0;
        foreach ($cartCookie as $cartItem) {
            $product = Product::find($cartItem['productId']);
            $totalPrice += $product->price * intval($cartItem['quantity']);
            $items[] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => intval($cartItem['quantity']),
            ];
        }

        $order                  = new Order();
        $order->delivery_time   = $deliveryCookie['deliveryDate'] . $validated['deliveryTime'];
        $order->customer_name   = $validated['customerName'];
        $order->customer_gender = $validated['gender'];
        $order->phone           = $validated['phoneNumber'];
        $order->total_price     = $totalPrice;
        $order->items           = $items;
        $order->store_id        = Store::where('name', $deliveryCookie['storeName'])->first()->id;

        if ($order->save()) {
            $request->session()->put('from_store', true);
            return redirect(route('order.show', $order->serial_number));

        } else {
            return redirect('order.create');
        }
    }

    public function show($serialNumber) {
        $order = Order::where('serial_number', $serialNumber)->first();
        return view('orders.show', ['order' => $order]);
    }
}
