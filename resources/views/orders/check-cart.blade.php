<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>

    <div class="py-5">
        <x-order-step step='3' class="mb-6"/>
        <section class="">
            <form action="{{ route('order.update-cart') }}" method="post" class="max-w-xl m-2 mx-auto text-xl text-black">
                @csrf
                @method('patch')
                @foreach ($cartItems as $item)
                    <div class="mb-1 overflow-x-auto border-2 food-card border-stone-500">
                        <input name="cart_items[{{ $item['id'] }}]" data-product-id="{{ $item['id'] }}" type="number" value="{{ $item['quantity'] }}" hidden>
                        <div class="flex px-3 py-2 bg-white">餐點：<span class="ml-auto">{{ $item['name'] ?? 'name' }}</span></div>
                        <div class="flex px-3 py-2 bg-gray-100 ">數量：<span class="ml-auto">{{ $item['quantity'] ?? 'quantity' }}</span></div>
                        <div class="flex px-3 py-2 bg-white">小計：<span class="ml-auto unit-price" data-unit-price="{{ $item['price'] }}" data-quantity="{{ $item['quantity'] }}">${{ floor($item['price'] * $item['quantity']) }}</span></div>
                        <div class="p-1 bg-gray-100">
                            <button class="block w-8 h-8 ml-auto">
                                <svg fill="#000000" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-198.13 -198.13 857.03 857.03" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" stroke="#000000" stroke-width="0.00460775"><g stroke-width="0" transform="translate(0,0), scale(1)"><rect x="-198.13" y="-198.13" width="857.03" height="857.03" rx="428.515" fill="#fff8ed" strokewidth="0"></rect></g><g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="23.9603"></g><g> <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path> </g></svg>
                            </button>
                        </div>
                  </div>
                @endforeach
                <div class="mt-5 mb-8 ml-auto mr-2 text-lg w-fit">總金額<span id="total-price" class="ml-2 text-3xl text-red-600">$</span></div>
                <div class="flex flex-col sm:flex-row">
                    <a href="{{ route('order.menu') }}" class="flex items-center justify-center p-2 mb-3 text-lg bg-purple-300 rounded-md sm:w-full sm:mb-0 sm:mr-2">
                        <svg class="w-5 h-5 mr-2" fill="#222" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 472.615 472.615" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)" stroke="#ffffff"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M167.158,117.315l-0.001-77.375L0,193.619l167.157,153.679v-68.555c200.338,0.004,299.435,153.932,299.435,153.932 c3.951-19.967,6.023-40.609,6.023-61.736C472.615,196.295,341.8,117.315,167.158,117.315z"></path> </g> </g> </g></svg>
                        繼續點餐</a>
                    <button type="submit" class="flex items-center justify-center p-2 text-lg bg-purple-300 rounded-md sm:w-full">付款結帳
                        <svg class="w-5 h-5 ml-2" fill="#222" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 472.615 472.615" xml:space="preserve" transform="matrix(-1, 0, 0, 1, 0, 0)" stroke="#000000"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M167.158,117.315l-0.001-77.375L0,193.619l167.157,153.679v-68.555c200.338,0.004,299.435,153.932,299.435,153.932 c3.951-19.967,6.023-40.609,6.023-61.736C472.615,196.295,341.8,117.315,167.158,117.315z"></path> </g> </g> </g></svg>
                    </button>
                </div>
            </form>
        </section>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initialCheckFoodPage();
        </script>
    @endsection
</x-online-order-layout>
