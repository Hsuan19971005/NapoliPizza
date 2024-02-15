<x-online-order-layout>
    <x-slot name="header">
        @include('orders.header-nav-link')
    </x-slot>

    <div class="py-12 bg-slate-500">
        <x-order-step step='3'/>
    </div>

    {{-- inline js --}}
    @section('inline_js')
        <script>
        </script>
    @endsection
</x-online-order-layout>
