<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>

    <div class="py-5">
        <h2 class="flex items-center justify-center mb-3 text-3xl font-bold text-black">
            <svg class="w-8 h-8" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M3.624,15a8.03,8.03,0,0,0,10.619.659l5.318,5.318a1,1,0,0,0,1.414-1.414l-5.318-5.318A8.04,8.04,0,0,0,3.624,3.624,8.042,8.042,0,0,0,3.624,15Zm1.414-9.96a6.043,6.043,0,1,1-1.77,4.274A6,6,0,0,1,5.038,5.038ZM4.622,9.311a1,1,0,0,1,2,0A2.692,2.692,0,0,0,9.311,12a1,1,0,0,1,0,2A4.7,4.7,0,0,1,4.622,9.311Z"></path></g></svg>
            訂單查詢</h2>
        <section class="max-w-xl px-2 py-3 mx-auto text-black shadow bg-gray-50">
            <ul class="">
                @foreach ($order->items as $item)
                    <li class="mb-1 border-2 divide-y shadow border-slate-500">
                        <div class="p-2">餐點：<span>{{ $item['name'] }}</span></div>
                        <div class="p-2">數量：<span>{{ $item['quantity'] }}</span></div>
                        <div class="p-2">小記：<span>${{ number_format($item['price'] * $item['quantity'], 0, '.', ',')  }}</span></div>
                    </li>
                @endforeach
            </ul>
            <ul class="divide-y">
                <li class="p-2">訂單編號：<span>{{ $order->serial_number }}</span></li>
                <li class="p-2">服務方式：<span>外帶</span></li>
                <li class="p-2">服務門市：<span>{{ $order->store->name }}</span></li>
                <li class="p-2">取餐時間：<span>{{ $order->delivery_time }}</span></li>
                <li class="p-2">付款方式：<span>現金</span></li>
                <li class="p-2">訂單金額：<span>${{ number_format($order->total_price, 0, '.', ',') }}</span></li>
                <li class="p-2">聯絡人：<span>{{ $order->customer_name . ($order->customer_gender == 'Male' ? '先生' : '小姐') }}</span></li>
                <li class="p-2">聯絡電話：<span>{{ $order->phone }}</span></li>
            </ul>
            <a href="{{ route('home') }}" class="block px-8 py-2 mx-auto my-3 rounded hover:bg-green-600 w-fit bg-pizza-green">回首頁</a>
        </section>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
        </script>
    @endsection
</x-online-order-layout>
