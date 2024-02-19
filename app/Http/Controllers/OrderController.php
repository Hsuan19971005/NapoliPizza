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
        // ['delivery_date' => '2024-02-18', 'store_name'=>'八德店']
        $validated = $request->validate([
            'delivery_date' => 'required|string',
            'store_name'    => 'required|string',
        ]);
        $deliveryInfo = ['deliveryDate' => $validated['delivery_date'], 'storeName' => $validated['store_name']];

        Cookie::queue('deliveryInfo', json_encode($deliveryInfo));
        return redirect(route('order.menu'));
    }

    public function showMenu() {
        $cookie = Cookie::get('deliveryInfo');
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
            $cartItems[] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'imgUrl'   => $product->img_url,
                'price'    => $product->price,
                'quantity' => array_sum($quantity),
            ];
        }
        Cookie::queue('cart', json_encode($cartItems), 60, null, null, false, false);
        $request->session()->put('from_add_to_cart', true);

        return redirect(route('order.check-cart'));
    }

    public function checkCart() {
        $cookie = Cookie::get('cart');
        if (is_null($cookie)) {
            return redirect(route('order.menu'));
        }

        $cartItems = json_decode($cookie, true);

        return view('orders.check-cart', ['cartItems' => $cartItems]);
    }

    public function updateCart(Request $request) {
        // ['51' => 1, '41' => 3...]
        $validated = $request->validate(['cart_items' => 'required|array']);

        $cartItems = [];
        foreach ($validated['cart_items'] as $productId => $quantity) {
            $product     = Product::find($productId);
            $cartItems[] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'imgUrl'   => $product->img_url,
                'price'    => $product->price,
                'quantity' => $quantity,
            ];
        }

        Cookie::queue('cart', json_encode($cartItems), 60, null, null, false, false);
        $request->session()->put('from_update_cart', true);

        return redirect(route('order.create'));
    }

    public function create() {
        $cookie = Cookie::get('deliveryInfo');
        if (is_null($cookie)) {
            return redirect(route('order.check-cart'));
        }

        $deliveryInfo = json_decode($cookie, true);

        return view('orders.create', [
            'deliveryDate' => $deliveryInfo['deliveryDate'],
            'storeName'    => $deliveryInfo['storeName'],
        ]);
    }

    public function store(Request $request) {
        // ["customer_name" => "Jack", "gender" => "Female", "phone_number" => "0928420187", "delivery_time" => "下午07:00"];
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'gender'        => 'required|string',
            'phone_number'  => 'required|string|size:10',
            'delivery_time' => 'required|string',
        ]);
        $cartCookie     = Cookie::get('cart');
        $deliveryCookie = Cookie::get('deliveryInfo');
        if (is_null($cartCookie) || is_null($deliveryCookie)) {
            return redirect(route('order.index'));
        }

        // [['productId' => 50, 'quantity' => 2], ['productId' => 32, 'quantity' => 1]...]
        $cartCookie = json_decode($cartCookie, true);
        // ['deliveryDate' => '2024-02-15', 'storeName' => '基隆愛買店']
        $deliveryCookie = json_decode($deliveryCookie, true);

        $totalPrice = 0;
        foreach ($cartCookie as $cartItem) {
            $totalPrice += intval($cartItem['price']) * intval($cartItem['quantity']);
        }

        $order                  = new Order();
        $order->delivery_time   = $deliveryCookie['deliveryDate'] . $validated['delivery_time'];
        $order->customer_name   = $validated['customer_name'];
        $order->customer_gender = $validated['gender'];
        $order->phone           = $validated['phone_number'];
        $order->total_price     = $totalPrice;
        $order->items           = $cartCookie;
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
