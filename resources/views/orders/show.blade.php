<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>

    <div class="py-5">
        <x-order-step step='5' class="mb-6"/>
        <h2 class="flex items-center justify-center mb-3 text-3xl font-bold text-black">
            <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#F27127"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#F27127" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
             完成訂餐 🎉</h2>
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
            <a href="{{ route('home') }}" class="block px-8 py-2 mx-auto my-3 rounded hover:bg-lime-700 w-fit bg-pizza-green">回首頁</a>
        </section>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
        </script>
    @endsection
</x-online-order-layout>
