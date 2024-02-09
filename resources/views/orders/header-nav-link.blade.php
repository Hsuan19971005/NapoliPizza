<div class="flex flex-wrap items-center justify-center text-black md:justify-normal" >
    <div class="flex items-center mr-2 md:grow">
        <x-logo class="mb-2 sm:mb-0"/>
        <h1 class="ml-2 text-xl font-bold">線上訂餐系統</h1>
    </div>
    <div class="flex">
        <a href="{{ route('orderSearch.index') }}" class="flex items-center hover:text-white">
            <img src="{{ asset('image/magnifier.svg') }}" alt="" class="h-11">
            <span class="ml-1 font-mono text-xl">訂單查詢</span>
        </a>
        <div class="flex items-center ml-4">
            <img src="{{ asset('image/phone-calling.svg') }}" alt="" class="h-11">
            <div class="flex flex-col ml-2">
                <span class="font-medium text-md">媽媽咪呀!我的Napoli</span>
                <span class="text-xl font-bold">080-000-0000</span>
            </div>
        </div>
    </div>
</div>
