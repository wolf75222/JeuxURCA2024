{{-- resources/views/layouts/dashboard.blade.php --}}

<!-- Status : clean -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? '' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-white dark:bg-gray-900">
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Nav -->
        <x-layout.nav-dashboard />

        <!-- Sidebar -->
        <x-layout.sidebar />

        <div class="min-h-screen bg-white dark:bg-gray-900">
            <!-- Contenu de la Page -->
            <main>
                @yield('content')
            </main>
            <!--<x-layout.footer :year="date('2024')" />-->
        </div>


        @stack('modals')

        @livewireScripts


        <!-- Flowbite js -->
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>