<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Task Manager Admin Panel">

    <title>{{ config('app.name', 'Task Manager') }} - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" />


    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Custom Select2 styling to match Tailwind */
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #d1d5db !important;
            border-radius: 0.375rem !important;
            min-height: 38px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #e5e7eb !important;
            border: 1px solid #d1d5db !important;
            border-radius: 0.25rem !important;
            padding: 0 5px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #6b7280 !important;
            margin-right: 5px !important;
        }
    </style>

</head>

<body class="font-sans antialiased text-gray-800 bg-gray-50">

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
                        class="p-2 text-gray-500 rounded-md md:hidden hover:bg-gray-100">
                        <i class="text-lg fas fa-bars"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notifications -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="relative text-gray-500 hover:text-indigo-600">
                            <i class="text-lg fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- Notifications Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 z-50 w-64 mt-2 bg-white border rounded-lg shadow-lg">
                            <div class="p-3 border-b">
                                <h3 class="text-sm font-medium">Notifications</h3>
                            </div>
                            <div class="p-2">
                                <a href="#" class="flex items-start p-2 text-sm rounded hover:bg-gray-50">
                                    <div class="flex-shrink-0 mt-1 mr-3 text-indigo-600">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">New task assigned</p>
                                        <p class="text-xs text-gray-500">2 minutes ago</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

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
                <!-- Breadcrumbs -->
                <div class="flex items-center mb-4 text-sm text-gray-600">
                    <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                    @hasSection('breadcrumbs')
                        <i class="mx-2 text-xs fas fa-chevron-right"></i>
                        @yield('breadcrumbs')
                    @endif
                </div>

                <!-- Page Header -->
                @hasSection('header')
                    <div class="flex flex-col justify-between mb-6 md:flex-row md:items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">@yield('header')</h2>
                            <p class="text-sm text-gray-500">@yield('subheader')</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            @yield('header-actions')
                        </div>
                    </div>
                @endif

                <!-- Alerts -->
                @if (session('success'))
                    <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg">
                        <i class="mr-2 fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 mb-6 text-sm text-red-700 bg-red-100 rounded-lg">
                        <i class="mr-2 fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                <!-- Main Content -->
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('scripts')
</body>

</html>
