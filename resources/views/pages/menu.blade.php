<x-page-layout>
    <x-slot name="header">
        @include('pages.header-nav-link')
    </x-slot>
    <div class="flex flex-col justify-center p-4 mx-auto sm:p-6 max-w-7xl md:flex-row">
        {{-- side links --}}
        <div class="relative p-2 mb-3 bg-orange-200 shadow-lg md:min-w-44 grow md:mr-5 md:max-w-64 h-fit">
            <div class="relative flex items-center justify-center h-12 mb-4 bg-white shadow">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.00024000000000000003"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g > <path fill-rule="evenodd" clip-rule="evenodd" d="M8.18092 2.56556C7.90392 3.05195 7.65396 3.65447 7.416 4.36507C5.57795 9.34447 2.73476 16.6246 1.36225 20.12C0.73894 21.7073 2.25721 23.2963 3.87117 22.7465C7.38796 21.5484 14.6626 19.0869 19.6353 17.5194L19.6504 17.5145C20.3639 17.277 20.9659 17.0333 21.4491 16.7641C21.9273 16.4977 22.3551 16.1704 22.6426 15.7347C23.2987 14.7406 22.9351 13.6998 22.5012 12.8954C19.7712 7.83439 16.3585 4.2775 12.0968 1.5703C11.6898 1.31179 11.2341 1.09226 10.7418 1.02286C10.2141 0.948472 9.69595 1.05467 9.22968 1.36307C8.79315 1.65181 8.45686 2.08103 8.18092 2.56556ZM15.0912 9.09151C13.5105 7.4048 11.7893 5.97947 9.55526 4.3325C9.6817 4.01505 9.80284 3.75901 9.91885 3.55532C10.1115 3.21703 10.2575 3.08115 10.333 3.03119C10.3788 3.0009 10.4025 2.99481 10.4626 3.00327C10.5579 3.01672 10.7358 3.07517 11.0244 3.25848C14.994 5.78016 18.1714 9.08132 20.741 13.8449C21.0989 14.5085 20.9833 14.6233 20.9739 14.6325L20.9734 14.6331C20.9318 14.696 20.8089 14.8313 20.4757 15.017C20.2861 15.1226 20.0491 15.2333 19.7558 15.3501C18.0975 12.7134 16.6772 10.7839 15.0912 9.09151ZM13.6318 10.4591C15.0211 11.9415 16.2981 13.6452 17.8022 16.0033C12.9009 17.5716 6.46194 19.751 3.22621 20.8533L3.22459 20.8538L3.22391 20.8531L3.22329 20.8525L3.22387 20.851C4.48689 17.6345 7.00299 11.1934 8.83498 6.28876C10.7878 7.75003 12.2738 9.00998 13.6318 10.4591ZM10 13C11.1046 13 12 12.1046 12 11C12 9.89545 11.1046 9.00002 10 9.00002C8.89543 9.00002 8 9.89545 8 11C8 12.1046 8.89543 13 10 13ZM10 16C10 17.1046 9.10457 18 8 18C6.89543 18 6 17.1046 6 16C6 14.8954 6.89543 14 8 14C9.10457 14 10 14.8954 10 16ZM13 17C14.1046 17 15 16.1046 15 15C15 13.8954 14.1046 13 13 13C11.8954 13 11 13.8954 11 15C11 16.1046 11.8954 17 13 17Z" fill="#A0BC3A"></path> </g></svg><h2 class="text-xl font-bold text-pizza-green">美味MENU</h2>
                <div class="absolute down-triangle top-full"></div>
            </div>
            <ul class="mb-3 text-lg font-bold text-neutral-600">
                <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=pizza" class="inline-block w-full px-1 py-3 hover:text-green-800">披薩口味</a></li>
                <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=mini_pizza" class="inline-block w-full px-1 py-3 hover:text-green-800">MINI披薩</a></li>
                <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=chicken" class="inline-block w-full px-1 py-3 hover:text-green-800">獨門雞料理</a></li>
                <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=special" class="inline-block w-full px-1 py-3 hover:text-green-800">精選美食</a></li>
            </ul>
            <div class="absolute left-0 w-full h-2 bg-orange-600 rounded-b-lg top-full"></div>
        </div>

        {{-- food area --}}
        <div class="px-2 py-3 sm:px-5">
            <div class="flex items-center mb-3">
                <div class="relative w-1 h-10">
                    <span class="absolute top-0 w-2 h-5 bg-lime-700 left-full"></span>
                    <span class="absolute bottom-0 w-2 h-5 bg-red-600 left-full"></span>
                </div>
                <h3 class="ml-4 text-2xl font-medium text-gray-700">{{ $subtitle }}</h3>
            </div>
            {{-- food cards --}}
            <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $product)
                    <div class="flex flex-col px-3 py-2 mb-4 rounded-md shadow bg-pizza-white aspect-[7/10] md:max-w-64">
                        <figure class="w-full mb-2">
                            <img class="w-full" src="https://fakeimg.pl/220x220/">
                        </figure>
                        <h3 class="mb-2 text-lg font-medium text-center text-lime-700">{{ $product->name }}</h3>
                        <p class="text-gray-700 line-clamp-3 text-md">{{ $product->description }}</p>
                        <span class="mb-2 text-lg font-bold text-red-500">${{ number_format($product->price, 0, '.', ',') }} </span>
                        <a href="{{ route('order.index') }}" class="w-auto py-2 mx-3 text-center text-white bg-red-600 rounded" target="_blank">立即訂購</a>
                    </div>
                @endforeach
            </section>
            <button id="go-top" class="fixed w-10 h-10 p-2 transition-opacity duration-300 rounded opacity-0 bottom-1 right-1 bg-slate-800"><svg fill="#ffffff" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.00 512.00" xml:space="preserve" stroke="#ffffff" stroke-width="0.0051200099999999995"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M505.749,304.918L271.083,70.251c-8.341-8.341-21.824-8.341-30.165,0L6.251,304.918C2.24,308.907,0,314.326,0,320.001 v106.667c0,8.619,5.184,16.427,13.163,19.712c7.979,3.307,17.152,1.472,23.253-4.629L256,222.166L475.584,441.75 c4.075,4.075,9.536,6.251,15.083,6.251c2.752,0,5.525-0.512,8.171-1.621c7.979-3.285,13.163-11.093,13.163-19.712V320.001 C512,314.326,509.76,308.907,505.749,304.918z"></path> </g> </g> </g></svg></button>
        </div>
    </div>
    @section('inline_js')
        <script>
            initializeMenuPage();
        </script>
    @endsection
</x-page-layout>
