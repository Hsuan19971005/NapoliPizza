<x-page-layout>
    <x-slot name="header">
        @include('pages.header-nav-link')
    </x-slot>

    <div class="max-w-6xl mx-auto">
        <img src="{{ asset('/image/ad1.jpg') }}" alt="ad">
        <div class="relative">
          <img src="{{ asset('/image/ad2.jpg') }}" alt="ad">
          <a href="{{ route('order.index') }}" target="_blank" class="absolute px-5 py-2 text-lg italic font-medium rounded-lg shadow-md sm:px-10 sm:py-5 sm:text-3xl top-1/3 left-1/2 text-amber-900 hover:from-orange-400 hover:to-amber-200 bg-gradient-to-b to-orange-400 from-amber-200">線上訂購</a>
        </div>
    </div>
</x-page-layout>
