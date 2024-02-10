<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link');
    </x-slot>

    <div class="py-12 bg-slate-500">
        <x-order-step step='2'/>
        {{-- Bar Menu --}}
        <div class="flex text-black h-11 md:hidden">
            <a href="{{ route('order.index') }}" class="flex items-center justify-center w-1/3 bg-blue-400">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" aria-labelledby="previousAltIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" color="#000000"> <title id="previousAltIconTitle">Previous</title> <path d="M8 4L4 8L8 12"/> <path d="M4 8H14.5C17.5376 8 20 10.4624 20 13.5V13.5C20 16.5376 17.5376 19 14.5 19H5"/> </svg>
            </a>
            <button id="menuToggle" href="" class="flex items-center justify-center w-1/3 bg-orange-300">
                <span>主菜單</span>
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                    <path d="M20 7L4 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/><path d="M20 12L4 12" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/><path d="M20 17L4 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
            <button id="cartToggle" class="flex items-center justify-center w-1/3 bg-purple-400">
                <img src="{{ asset('image/cart.svg') }}" alt="cart">
            </button>
        </div>

        <div class="relative flex justify-between max-w-6xl py-6 mx-auto bg-purple-300 border-2">
            {{-- Menu --}}
            <ul id="mainMenu" class="absolute top-0 left-0 w-56 text-black transition-transform duration-300 -translate-x-full menu bg-rose-200 rounded-box md:translate-x-0 md:static">
                <!-- Delete button -->
                <button id="menuClose" class="ml-auto md:hidden w-7 h-7">
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
            {{-- Food area --}}
            <section class="w-full mx-0 text-black md:mx-4 md:w-2/4 bg-emerald-300">
                {{-- Food detail --}}
                <form action="" class="relative flex mb-5 border-4" method="post">
                    <button class="absolute top-0 right-0 w-7 h-7">
                        <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-case" fill="#000000" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg>
                    </button>
                    <div class="flex flex-col w-1/2">
                        <img src="https://fakeimg.pl/100x75/" class="w-full">
                        <span class="text-black">餡料...</span>
                        <span class="text-black">美味說明...</span>
                    </div>
                    <div class="relative flex flex-col w-1/2 pl-1">
                        <span class="text-lg font-bold">商品名稱</span>
                        <span class="text-pizza-red">$價格</span>
                        <hr>
                        <label for="">數量</label>
                        <select name="product_number" id="" class="w-20 rounded">
                            @for ($i = 1; $i < 11; $i++)
                            <option>{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit" class="absolute right-0 p-3 font-bold rounded-md bottom-1 bg-pizza-green hover:bg-pizza-orange hover:text-white">加入購物車</button>
                    </div>
                </form>
                {{-- Foods --}}
                @php
                    $collection = [1,2,3,4,5,6,7];
                @endphp
                <div class="flex flex-wrap">
                    @foreach ($collection as $item)
                    <div class="flex flex-col w-1/3 bg-white lg:w-1/4">
                        <figure class="relative w-full">
                            <img src="https://fakeimg.pl/100x75/" class="w-full">
                            <button class="absolute z-10 -right-2 -bottom-2 w-9 h-9">
                                <svg viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288"></g><g id="SVGRepo_iconCarrier"> <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16 12.75H12.75V16C12.75 16.41 12.41 16.75 12 16.75C11.59 16.75 11.25 16.41 11.25 16V12.75H8C7.59 12.75 7.25 12.41 7.25 12C7.25 11.59 7.59 11.25 8 11.25H11.25V8C11.25 7.59 11.59 7.25 12 7.25C12.41 7.25 12.75 7.59 12.75 8V11.25H16C16.41 11.25 16.75 11.59 16.75 12C16.75 12.41 16.41 12.75 16 12.75Z" fill="#3c3f44"></path> </g></svg>
                            </button>
                        </figure>
                        <span class="text-pizza-red">$價格</span>
                        <span class="font-bold text-black">大標</span>
                        <span class="font-bold text-black">小標</span>
                    </div>
                    @endforeach
                </div>
                main content
            </section>
            {{-- Cart --}}
            <div id="cartMenu" class="absolute top-0 right-0 transition-all duration-500 ease-in-out translate-x-full bg-gray-700 opacity-0 w-72 md:static md:opacity-100 md:translate-x-0">
                <button id="cartClose" class="flex items-center mb-2 font-medium text-pizza-orange bg-lime-500">
                    <svg class="w-7 h-7" fill="#E27127" height="94px" width="94px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" stroke="#E27127" stroke-width="0.00512" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="14.336000000000002"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M317.959,115.859H210.158V58.365h-44.864L0,223.66l165.294,165.294h44.864V331.46h136.548 c67.367,0,122.174,54.807,122.174,122.174H512V309.9C512,202.905,424.953,115.859,317.959,115.859z M468.88,342.412 c-30.253-33.206-73.82-54.071-122.174-54.071H167.038v41.378L60.981,223.661l106.057-106.057v41.375h150.921 c83.219,0,150.921,67.703,150.921,150.921V342.412z"></path> </g> </g> </g></svg>
                    <span>繼續點餐</span>
                </button>
                <hr>
                <div class="flex">
                    <ul>
                        <li>服務方式：外帶</li>
                        <li>取餐日期：{{ $delivery_time ?? '尚未選擇取餐日期' }}</li>
                        <li>服務門市：{{ $store_name ?? '尚未選擇服務門市' }}</li>
                    </ul>
                    <button class="p-3 ml-auto font-bold text-white bg-blue-700 rounded">
                        <svg class="w-11 h-11" width="150px" height="150px" viewBox="-3.2 -3.2 38.40 38.40" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="1.088"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_901_3095)"> <path d="M10 24L9 20L8 16L7 12L6 8H31L29 22C28.86 23.04 28.12 24 27 24H10Z" fill="#FFC44D"></path> <path d="M23 27C24.1 27 25 27.9 25 29C25 30.1 24.1 31 23 31C21.9 31 21 30.1 21 29C21 27.9 21.9 27 23 27ZM11 27C12.1 27 13 27.9 13 29C13 30.1 12.1 31 11 31C9.9 31 9 30.1 9 29C9 27.9 9.9 27 11 27Z" fill="#ffffff"></path> <path d="M8 16H2M9 20H3M7 12H1M26 16H11M25 20H12M27 12H10M10 24H27C28.125 24 28.862 23.038 29 22L31 8H6L4 1H1M13 29C13 27.896 12.104 27 11 27C9.896 27 9 27.896 9 29C9 30.104 9.896 31 11 31C12.104 31 13 30.104 13 29ZM25 29C25 27.896 24.104 27 23 27C21.896 27 21 27.896 21 29C21 30.104 21.896 31 23 31C24.104 31 25 30.104 25 29Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_901_3095"> <rect width="32" height="32" fill="white"></rect> </clipPath> </defs> </g></svg>
                        <span>結帳去</span>
                    </button>
                </div>
                <div class="p-2 bg-gray-300">
                    Cart items
                    <br>
                    Cart items
                    <br>
                    Cart items
                    <br>
                    Cart items
                    <br>
                    Cart items
                    <br>
                    Cart items
                    <br>
                </div>
            </div>
        </div>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
            initialOrderFoodPage("{{ route('api.product.show') }}");
        </script>
    @endsection
</x-online-order-layout>
