<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>
    <div class="pt-5 pb-12 bg-food">
        <x-order-step step='1'/>
        <div class="max-w-6xl py-6 mx-auto border-2 bg-stone-50 sm:px-6 lg:px-8">
            <div class="">
                <form action="{{ route('order.add-delivery') }}" class="text-black" method="post">
                    @csrf
                    <div class="flex items-center mb-3">
                        <img src="{{ asset('image/calendar.svg') }}" alt="" class="w-6 m-2">
                        <h2 class="text-xl">請選擇取餐日期</h2>
                        <input type="date" name="deliveryDate" class="h-8 ml-3 text-black bg-gray-300 border-none rounded text-md hover:cursor-pointer">
                    </div>
                    <hr>
                    <div class="flex flex-wrap items-center my-3">
                        <img src="{{ asset('image/truck.svg') }}" alt="" class="w-6 m-2">
                        <h2 class="mr-3 text-xl">請選擇外帶門市</h2>
                        <div class="flex items-center">
                            <select id="storeCity" name="city_name" class="w-full max-w-xs m-3 text-sm bg-gray-300 border-gray-400 rounded h-9 hover:cursor-pointer">
                                <option value>請選擇</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                            -
                            <select id="storeDistrict" name="store_district" class="w-full max-w-xs m-3 text-sm bg-gray-300 border-gray-400 rounded h-9 hover:cursor-pointer">
                                <option value>請選擇</option>
                            </select>
                            -
                            <select id="deliveryStore" name="storeName" class="w-full max-w-xs m-3 text-sm bg-gray-300 border-gray-400 rounded h-9 hover:cursor-pointer">
                                <option value>請選擇</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="flex items-center my-3">
                        <img src="{{ asset('image/file-check.svg') }}" alt="" class="w-6 m-2">
                        <h2 class="text-xl">網路訂購注意事項</h2>
                    </div>
                    <p class="mb-2 ml-3 text-lg font-bold text-pizza-red">除夕(2/9)當日線上訂餐網站及080客服暨訂餐中心 僅營業至15:00 (門市外送接單至14:00、外帶接單至14:30)</p>
                    <p class="mb-2 ml-3 text-lg font-bold text-pizza-orange">初一之後均正常營業~新年快樂!</p>
                    <p id="scrollable-content" class="p-5 mx-4 mb-3 overflow-y-auto text-gray-900 bg-white border border-gray-300 rounded h-80 overscroll-contain contract-content">
                        *Napoli門市營業時間：11：00 ~ 21：30（最後接受訂單時間為21：00）
                        <br>
                        *請確認本頁訂餐日期是否正確? 取/到餐時間會於點完餐點，輸入完手機號碼等資料，按下"填寫完成"後即出現讓您選擇。
                        <br>
                        *訂餐送出後15分鐘內會以簡訊告知您訂單成立! 取餐時，門市會請您出示訂餐成功的簡訊。
                        <br>
                        *21點後之非服務時間的預約訂單會於隔天早上10點前發送簡訊，部分未於線上付款的訂單，客服中心將於隔日早上去電確認，請留意您的手機收訊狀況，無法確認訂餐電話時訂單將無法成立，請與我們聯絡。
                        <br>
                        *若您收到簡訊內容為"訂單不成立"或收訊不良未收到簡訊，請與我們聯絡，我們將優先為您服務。
                        <br>
                        *您可於服務時間來電080-000-0000訂餐中心查詢您的訂單狀態或訂餐內容。
                        <br>
                        *訂餐系統僅能使用中信ATM優惠券，其他兌換券折扣優惠尚無法使用，欲使用優惠券請來電門市或080-000-0000訂餐中心訂餐。
                        <br>
                        外送/外帶服務注意事項
                        <br>
                        *外送服務為限區服務！新竹林森/汐止遠雄/忠孝愛買3家門市僅供內用/外帶，沒有外送服務。
                        <br>
                        *由於門市外送人力有限，目前有與外送平台配合協助送餐服務，您收餐時會收到到餐資訊簡訊(外送員即將抵達的訊息)，到餐時會遇到外送平台人員交付餐點給您喔！
                        <br>
                        *優惠套餐均有外帶優惠及外送原價之分，若您點選外送而最後結帳金額未滿$439元，會另加收80元外送服務費。
                        <br>
                        營業時間注意
                        <br>
                        *訂餐中心電話服務時間為9：00 ~ 21：00
                        <br>
                        *訂購系統最晚可訂購外送時間為20:30，外帶為21:00，系統會視各門市當日接單狀況而訂。若您於21:00前按下"開始訂餐"後出現門市已過服務時間的訊息，麻煩您直接來電門市詢問。</p>
                    <div class="flex items-center justify-center pb-1 mx-auto mb-5 border-b-2 border-stone-300 w-fit">
                        <input type="checkbox" name="checkNoteInfo" id="contract-checkbox" class="border-black border-1 checkbox checkbox-sm" disabled>
                        <label for="contract-checkbox" class="ml-2 font-bold">我已閱讀過訂購說明</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="btnSendOrder" class="py-2 mx-auto text-white rounded px-7 bg-pizza-brown hover:bg-pizza-orange">開始訂餐</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initializeDeliveryInfoPage("{{ route('api.shop.show') }}");
        </script>
    @endsection
</x-online-order-layout>
