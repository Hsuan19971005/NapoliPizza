<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>

    <div class="py-5">
        <h2 class="flex items-center justify-center mb-3 text-3xl font-bold text-black">
            <svg class="w-8 h-8" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M3.624,15a8.03,8.03,0,0,0,10.619.659l5.318,5.318a1,1,0,0,0,1.414-1.414l-5.318-5.318A8.04,8.04,0,0,0,3.624,3.624,8.042,8.042,0,0,0,3.624,15Zm1.414-9.96a6.043,6.043,0,1,1-1.77,4.274A6,6,0,0,1,5.038,5.038ZM4.622,9.311a1,1,0,0,1,2,0A2.692,2.692,0,0,0,9.311,12a1,1,0,0,1,0,2A4.7,4.7,0,0,1,4.622,9.311Z"></path></g></svg>
            訂單查詢</h2>
        <form action="{{ route('order_search.search') }}" method="get" class="max-w-sm px-5 py-4 mx-auto text-lg text-black rounded shadow bg-gray-50">
            <div class="mb-7 form-group">
                <label for="" class="block w-full h-8">訂單編號：</label>
                <input type="text" name="serial_number" class="block w-full rounded h-9" maxlength="14" placeholder="請輸入14位訂單編號" value="{{ old('serial_number') }}">
                @if ($errors->has('serial_number') || $errors->has('order_not_found'))
                    <label class="text-base text-red-600">
                        @if ($errors->has('serial_number'))
                            {{ $errors->first('serial_number') }}
                        @elseif ($errors->has('order_not_found'))
                            {{ $errors->first('order_not_found') }}
                        @endif
                    </label>
                @endif
            </div>
            <div class="flex items-end h-10 mb-1 form-group">
                <label for="">驗證碼：</label>
                <span class="h-full mr-3"><img id="captcha-img" src="{{ captcha_src('math') }}" alt="captcha-img" class="h-full"></span>
                <button type="button" id="reload" class="h-full text-3xl text-white bg-red-500 rounded aspect-square hover:bg-red-600">&#x21bb;</button>
            </div>

            <div class="mb-7 form-group">
                <input type="text" name="captcha" placeholder="請輸入驗證碼" class="block w-full rounded h-9">
                @error('captcha')
                    <label class="text-base text-red-600">{{ $message }}</label>
                @enderror
            </div>
            <button type="submit" class="block w-full py-2 mx-auto font-bold text-white bg-orange-500 rounded-md text-md hover:bg-orange-600">查詢</button>

        </form>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initialOrderSearchPage("{{ route('api.reload_captcha') }}");
        </script>
    @endsection
</x-online-order-layout>
