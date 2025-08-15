<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col h-full min-h-screen">
    <!-- Fixed Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
        @include('layouts.navigationTemplate')
    </header>

    <!-- Scrollable Content -->
    <main class="flex-grow pt-16 pb-20"> <!-- pt-16 accounts for header height, pb-20 for footer -->
        @yield('content')
    </main>

    <!-- Fixed Footer -->
    <footer class="fixed bottom-0 left-0 right-0 z-50 py-4 text-white bg-gray-800">
        @include('layouts.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>
