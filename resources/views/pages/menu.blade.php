<x-page-layout>
    <x-slot name="header">
        @include('pages.header-nav-link');
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Top pic --}}
            <figure class="mb-4">
                <img src="https://fakeimg.pl/1300x200/">
            </figure>
            <div class="flex overflow-hidden shadow-sm">
                {{-- side links --}}
                <div class="relative w-1/4 p-4 bg-orange-200 ml-7 lg:w-1/5 h-4/5">
                    <div class="relative flex items-center justify-center h-12 mb-4 bg-white">
                        <img src="{{ asset('image/pizza-slice-svgrepo-com.svg') }}" alt="" class="w-8">
                        <h2 class="text-xl font-bold text-lime-700">美味MENU</h2>
                        <div class="absolute down-triangle top-full"></div>
                    </div>
                    <ul class="text-lg font-bold text-neutral-600">
                        <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=pizza" class="inline-block w-full px-1 py-3 hover:text-green-800">披薩口味</a></li>
                        <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=mini_pizza" class="inline-block w-full px-1 py-3 hover:text-green-800">MINI披薩</a></li>
                        <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=chicken" class="inline-block w-full px-1 py-3 hover:text-green-800">獨門雞料理</a></li>
                        <li class="mx-1 border-b-2 border-white hover:border-red-400"><a href="{{ request()->path() }}?type=special" class="inline-block w-full px-1 py-3 hover:text-green-800">精選美食</a></li>
                    </ul>
                    <div class="absolute left-0 w-full h-2 bg-orange-600 rounded-b-lg top-full"></div>

                </div>

                {{-- food area --}}
                <div class="w-3/4 px-5 py-3 ml-2 lg:w-4/5 mr-7">
                    <div class="flex items-center mb-3">
                        <div class="relative w-1 h-10">
                            <span class="absolute top-0 w-2 h-5 bg-lime-700 left-full"></span>
                            <span class="absolute bottom-0 w-2 h-5 bg-red-600 left-full"></span>
                        </div>
                        <h3 class="ml-4 text-2xl font-medium text-gray-700">新品嚐鮮</h3>
                    </div>
                    {{-- food cards --}}
                    <section class="flex flex-wrap justify-between">
                        @foreach ($products as $product)
                            <div class="flex flex-col items-center w-64 px-3 py-2 mb-4 border-2 border-gray-200 rounded-md">
                                <figure class="mb-2">
                                    <img src="https://fakeimg.pl/220x220/">
                                </figure>
                                <h3 class="text-lg font-medium text-lime-700">{{ $product->name }}</h3>
                                <p class="text-gray-700 text-md">English item name</p>
                                <span class="text-lg font-bold text-red-500">${{ floor($product->price) }} </span>
                                <a href="{{ route('order.index') }}" class="w-5/6 py-2 m-auto text-center text-white bg-red-600 rounded" target="_blank">立即訂購</a>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-page-layout>
