<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link');
    </x-slot>

    <div class="py-12 bg-slate-500">
        <x-order-step step='2'/>
        {{-- Bar Menu --}}
        <div class="flex text-black h-11 sm:hidden">
            <a href="{{ route('order.index') }}" class="flex items-center justify-center w-1/3 bg-blue-400">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" aria-labelledby="previousAltIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" color="#000000"> <title id="previousAltIconTitle">Previous</title> <path d="M8 4L4 8L8 12"/> <path d="M4 8H14.5C17.5376 8 20 10.4624 20 13.5V13.5C20 16.5376 17.5376 19 14.5 19H5"/> </svg>
            </a>
            <button id="menuToggle" href="" class="flex items-center justify-center w-1/3 bg-orange-300">
                <span>主菜單</span>
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                    <path d="M20 7L4 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/><path d="M20 12L4 12" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/><path d="M20 17L4 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
            <button class="flex items-center justify-center w-1/3 bg-purple-400">
                <img src="{{ asset('image/cart.svg') }}" alt="cart">
            </button>
        </div>
        <div class="relative max-w-6xl py-6 mx-auto border-2 bg-stone-50 sm:px-6 lg:px-8">
            {{-- Menu --}}
            <ul id="mainMenu" class="absolute top-0 left-0 w-56 text-black transition-transform duration-300 -translate-x-full menu bg-rose-200 rounded-box sm:translate-x-0 sm:static">
                <!-- Delete button -->
                <button id="menuClose" class="ml-auto sm:hidden w-7 h-7">
                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-198.13 -198.13 857.03 857.03" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" stroke="#000000" stroke-width="0.00460775"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"><rect x="-198.13" y="-198.13" width="857.03" height="857.03" rx="428.515" fill="#fff8ed" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="23.9603"></g><g id="SVGRepo_iconCarrier"> <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path> </g></svg>
                </button>
                <li>
                    <details open>
                        <summary>超值套餐Set</summary>
                        <ul>
                        <li><a>套餐1</a></li>
                        <li><a>套餐2</a></li>
                        <li><a>套餐3</a></li>
                        </ul>
                    </details>
                    </li>
                <li>
                <li>
                    <details open>
                        <summary>好披薩Pizza</summary>
                        <ul>
                        <li><a>大披薩(12")</a></li>
                        <li><a>大披薩(9")</a></li>
                        <li><a>Mini披薩(6")</a></li>
                        </ul>
                    </details>
                    </li>
                <li>
                    <details open>
                    <summary>獨門雞料理Chicken</summary>
                    <ul>
                        <li><a>炸雞 Fried Chicken</a></li>
                        <li><a>烤雞 Roast Chicken</a></li>
                    </ul>
                    </details>
                </li>
                <li>
                    <details open>
                        <summary>精選加點Snack</summary>
                        <ul>
                        <li><a>烘烤美味 Roast</a></li>
                        <li><a>酥炸好料 Fried</a></li>
                        <li><a>超值拼盤 Mix</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details open>
                        <summary>飲料Drinks</summary>
                        <ul>
                        <li><a>碳酸&茶 Soft & Tea</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
            <section>main content</section>
        </div>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initialOrderFoodPage("{{ route('api.product.show') }}");
        </script>
    @endsection
</x-online-order-layout>
