<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- Head --}}
    <x-partials._head />
    <body class="leading-normal tracking-normal text-white gradient">

        {{-- Nav --}}
        <x-partials._nav />

        <x-ui.alerts />

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        {{-- Footer --}}
        <x-partials._footer />
        @livewireScripts
    </body>
</html>