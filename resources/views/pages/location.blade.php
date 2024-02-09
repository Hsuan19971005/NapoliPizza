<x-page-layout>
    <x-slot name="header">
        @include('pages.header-nav-link')
    </x-slot>
    <div class="max-w-6xl mx-auto my-4 bg-white/75 sm:px-6 lg:px-8">
        <h1 class="mb-2 text-2xl font-bold border-b-2 text-lime-700 border-pizza-green">門市資訊</h1>
        <form action="" class="">
            <div class="flex flex-wrap py-3 mb-2">
                <select id="storeCity" name="city" class="text-gray-500 cursor-pointer w-72 bg-slate-50 border-pizza-orange hover:border-pizza-red">
                    <option value>請選擇縣市</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
                <select id="storeDistrict" name="district" class="mx-2 text-gray-500 cursor-pointer w-72 bg-slate-50 border-pizza-orange hover:border-pizza-red">
                    <option value>請選擇鄉鎮市區</option>
                </select>
                <button type="submit" class="px-4 py-2 text-white rounded w-60 bg-pizza-orange hover:bg-orange-600">查詢</button>
            </div>
        </form>

        @foreach ($stores as $store)
            <table class="table mb-3 border-0 rounded-none bg-pizza-white">
                <head>
                    <tr class="font-bold text-white bg-lime-700">
                        <th class="w-2/12">店名</th>
                        <th class="w-5/12">地址</th>
                        <th class="w-4/12">營業時間</th>
                        <th class="w-1/12">地圖</th>
                    </tr>
                </head>
                <tbody class="border-0">
                    <tr class="font-bold text-lime-700">
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->district . $store->address }}</td>
                        <td>{{ $store->opening_hours }}</td>
                        <td><a href='https://www.google.com.tw/maps?q="{{ $store->district . '+'. $store->address }}"' target="_blank" class="p-2 text-white bg-pizza-orange">MAP</a></td>
                    </tr>
                </tbody>
            </table>
        @endforeach
        {{ $stores->links() }}
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initializeStoreLocationPage("{{ route('api.shop.show') }}");
        </script>
    @endsection
</x-page-layout>
