<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('header') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    @livewireStyles

    @livewireScripts

</head>

<body class="bg-gray-50 text-base pt-14 lg:pl-60">

    <div id="app" class="w-screen transition-all lg:w-auto">
        @include('layouts.dashboard.navigation')

        <section class="p-6">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
                <p class="text-3xl font-bold ml-3 text-sky-700">@yield('header')</p>
            </div>
        </section>

        <section>
            @yield('content')
        </section>
    </div>



    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    {{-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"> --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <script>
        Livewire.on('closeModal', () => {
            const event = new Event('closeme')
            window.dispatchEvent(event)
        })
    </script>

    @stack('scripts')



</body>

</html>
