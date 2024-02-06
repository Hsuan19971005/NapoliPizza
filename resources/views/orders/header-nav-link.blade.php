<div class="flex items-center text-black" >
    <a href="{{ route('order.index') }}" alt="" class="w-56">
        <img src="https://fakeimg.pl/300x80/">
    </a>
    <h1 class="ml-2 text-xl font-bold grow">線上訂餐系統</h1>
    <a href="{{ route('orderSearch.index') }}" class="flex items-center hover:text-white">
        <img src="{{ asset('image/magnifier.svg') }}" alt="" class="h-11">
        <span class="ml-1 font-mono text-xl">訂單查詢</span>
    </a>
    <div class="flex items-center ml-4">
        <img src="{{ asset('image/phone-calling.svg') }}" alt="" class="h-11">
        <div class="flex flex-col ml-2">
            <span class="font-medium text-md">媽媽咪呀!我的Napoli</span>
            <span class="text-2xl font-bold">080-00X-XXXX</span>
        </div>
    </div>
</div>
