<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link');
    </x-slot>

    <div class="py-12 bg-slate-500">
        <div class="max-w-6xl py-6 mx-auto border-2 bg-stone-50 sm:px-6 lg:px-8">
            <div class="">

            </div>
        </div>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
        </script>
    @endsection
</x-online-order-layout>
