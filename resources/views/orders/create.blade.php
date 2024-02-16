<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>

    <div class="py-5">
        <x-order-step step='4' class="mb-6"/>
        <section class="max-w-xl py-3 mx-auto shadow bg-gray-50">
            <form action="{{ route('order.store') }}" method="post" class="flex flex-col max-w-md p-2 m-2 mx-auto text-xl text-black ">
                @csrf
                <div class="mb-4">外帶時間：{{ $deliveryDate }}</div>
                <div class="mb-4">外帶門市：{{ $storeName }}</div>
                <div class="mb-4"><span class="after:content-['*'] after:ml-0.5 after:text-red-500 mr-2">付款方式</span>現金</div>
                <div class="flex flex-wrap items-center mb-4">
                    <label for="" class="after:content-['*'] after:ml-0.5 after:text-red-500 w-full sm:w-auto mb-2 sm:mb-0 mr-2">聯絡人</label>
                    <input type="text" name="customerName" maxlength="10" class="mr-3 rounded w-36" required>
                    <div>
                        <input type="radio" name="sex" id="" value="F" checked>
                        <label for="">小姐</label>
                        <input type="radio" name="sex" id="" value="M">
                        <label for="">先生</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="after:content-['*'] after:ml-0.5 after:text-red-500 mr-2">手機號碼</label>
                    <input type="tel" name="phoneNumber" id="" maxlength="10" pattern="^(09)[0-9]{8}$" class="text-black bg-white rounded" required>
                </div>
                <button id="filling-button" class="p-2 mx-auto font-bold text-white bg-orange-400 rounded shadow hover:bg-orange-500 w-36">填寫完成</button>
                {{-- Hidden --}}
                <section id="time-section" class="p-1 mb-4 shadow bg-pizza-green" hidden>
                    <div class="p-1 font-bold text-center text-white">請選擇取餐時間</div>
                    <div class="p-2 bg-white">
                        <span class="before:content-['*'] before:ml-0.5 before:text-red-500 w-full inline-block sm:w-auto">取餐時間</span>
                        <span class="mr-2 text-2xl font-bold">{{ $deliveryDate }}</span>
                        <select name="deliveryTime" id="time-select" class="w-32 rounded">
                        </select>
                    </div>
                </section>
                <button type="submit" class="p-2 mx-auto font-bold text-white bg-orange-400 rounded shadow hover:bg-orange-500 w-36" hidden>確認訂單</button>
            </form>
        </section>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initialCreateOrderPage();
        </script>
    @endsection
</x-online-order-layout>
