<div {{ $attributes->merge(['class'=>'flex items-center justify-center']) }}>
    @php
        $class = 'px-2 py-1 m-2 text-base font-bold text-center text-white hover:text-gray-800';
    @endphp
    <a href="{{ route('menu') }}" class="{{ $class }}">
        <img src="{{ asset('image/menu-svgrepo-com.svg') }}" class="w-16">
        <span>美味Menu</span>
    </a>
    <a href="" class="{{ $class }}">
        <img src="{{ asset('image/store-shop-svgrepo-com.svg') }}" class="w-16">
        <span>門市查詢</span>
    </a>
    <a href="" class="{{ $class }}">
        <img src="{{ asset('image/loudspeaker-svgrepo-com.svg') }}" class="w-16">
        <span>關於我們</span>
    </a>
    <a href="" class="flex items-center justify-center px-4 py-3 ml-10 shadow-2xl rounded-xl text-stone-50 bg-lime-500 hover:bg-lime-600">
        <img src="{{ asset('image/light-bulb-idea-svgrepo-com.svg') }}" alt="" class="w-auto h-11">
        <i>快速訂購</i>
    </a>
</div>
