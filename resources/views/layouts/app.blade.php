<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" />
</head>

<body class="font-sans antialiased text-gray-800 bg-gray-100">

    <div class="flex h-screen overflow-hidden">

        {{-- Desktop Sidebar --}}
        <div class="hidden md:flex md:flex-shrink-0">
            @include('layouts.navigation')
        </div>

        {{-- Mobile Sidebar --}}
        <div x-show="sidebarOpen" @click.away="sidebarOpen = false" class="fixed inset-0 z-40 flex md:hidden">
            <!-- Overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-50" @click="sidebarOpen = false"></div>
            <!-- Sidebar content -->
            <div class="relative flex flex-col w-64 text-white bg-gradient-to-b from-indigo-700 to-indigo-900">
                @include('layouts.navigation')
            </div>
        </div>

        {{-- Main Content --}}
        <div class="flex flex-col flex-1 overflow-hidden">

            {{-- Topbar --}}
            <header
                class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200 shadow-sm sm:px-6 lg:px-8">
                <div class="flex items-center gap-2">
                    <!-- Mobile hamburger -->
                    <button @click="sidebarOpen = true"
                        class="p-2 text-gray-500 rounded-md md:hidden hover:bg-gray-200">
                        <i class="text-lg fas fa-bars"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search..."
                            class="py-2 pl-10 pr-4 text-sm border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                    </div>

                    <!-- Notifications -->
                    <button class="relative text-gray-500 hover:text-indigo-600">
                        <i class="text-lg fas fa-bell"></i>
                        <span class="absolute top-0 right-0 px-1 text-xs text-white bg-red-500 rounded-full">3</span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
                                class="w-8 h-8 rounded-full" alt="">
                            <span class="hidden text-sm md:inline">{{ Auth::user()->name }}</span>
                            <i class="text-xs fas fa-chevron-down"></i>
                        </button>

                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 z-50 mt-2 bg-white border rounded-lg shadow-lg w-44">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="mr-2 text-gray-500 fas fa-user"></i> Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                    <i class="mr-2 text-gray-500 fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-6 overflow-y-auto">
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    @isset($header)
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $header }}</h2>
                        </div>
                    @endisset

                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
