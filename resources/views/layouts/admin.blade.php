<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gradient-to-b from-indigo-700 to-indigo-900">
                <div class="flex items-center justify-center h-16 px-4 border-b border-indigo-500">
                    <div class="flex items-center">
                        <i class="mr-2 text-xl text-white fas fa-shield-alt"></i>
                        <span class="text-xl font-semibold text-white">AdminPro</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <!-- User Profile -->
                    <div class="flex items-center px-2 py-4 border-b border-indigo-500">
                        <img class="object-cover w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">Admin User</p>
                            <p class="text-xs font-medium text-indigo-200">Administrator</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="flex-1 mt-6 space-y-1">
                        <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-indigo-600 bg-opacity-75 rounded-lg">
                            <i class="mr-3 fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                        <a href="/admin/users" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="mr-3 fas fa-users"></i>
                            Users
                        </a>
                        <a href="/admin/settings" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="mr-3 fas fa-cog"></i>
                            Settings
                        </a>
                        <a href="/admin/reports" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="mr-3 fas fa-chart-bar"></i>
                            Reports
                        </a>

                    </nav>
                </div>
                <div class="p-4 border-t border-indigo-500">
                    <a href="/logout" class="flex items-center px-4 py-2 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="mr-3 fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Mobile Header -->
            <header class="bg-white shadow-sm md:hidden">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button id="mobile-menu-button" class="text-gray-500 focus:outline-none">
                            <i class="text-xl fas fa-bars"></i>
                        </button>
                        <span class="ml-3 text-lg font-semibold">@yield('header')</span>
                    </div>
                    <div class="flex items-center">
                        <button class="mr-4 text-gray-500 focus:outline-none">
                            <i class="text-xl fas fa-bell"></i>
                            <span class="absolute w-2 h-2 bg-red-500 rounded-full top-2 right-3"></span>
                        </button>
                        <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                    </div>
                </div>
            </header>

            <!-- Desktop Header -->
            <header class="hidden bg-white shadow-sm md:block">
                <div class="flex items-center justify-between px-6 py-3">
                    <h1 class="text-xl font-semibold text-gray-800">@yield('header')</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="text-xl fas fa-bell"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                        <div class="relative">
                            <button class="flex items-center focus:outline-none">
                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                                <span class="ml-2 text-sm font-medium text-gray-700">Admin</span>
                                <i class="ml-1 text-xs text-gray-500 fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <a href="/" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            <i class="mr-1 fas fa-external-link-alt"></i> View Site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 overflow-y-auto md:p-6 bg-gray-50">
                <!-- Breadcrumbs -->
                <div class="hidden mb-6 md:block">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                                    <i class="mr-2 fas fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <i class="mx-2 text-gray-400 fas fa-chevron-right"></i>
                                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">@yield('header')</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <!-- Page Heading -->
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">@yield('header')</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="mr-2 fas fa-filter"></i> Filter
                        </button>
                        <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="mr-2 fas fa-plus"></i> New
                        </button>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-4 bg-white rounded-lg shadow-sm md:p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-600 bg-opacity-75" id="sidebar-backdrop"></div>
        <div class="relative flex flex-col h-full max-w-xs w-72 bg-gradient-to-b from-indigo-700 to-indigo-900">
            <div class="flex items-center justify-between h-16 px-4 border-b border-indigo-500">
                <div class="flex items-center">
                    <i class="mr-2 text-xl text-white fas fa-shield-alt"></i>
                    <span class="text-xl font-semibold text-white">AdminPro</span>
                </div>
                <button id="close-mobile-menu" class="text-white focus:outline-none">
                    <i class="text-xl fas fa-times"></i>
                </button>
            </div>
            <div class="flex-1 py-4 overflow-y-auto">
                <!-- User Profile -->
                <div class="flex items-center px-4 py-4 border-b border-indigo-500">
                    <img class="object-cover w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs font-medium text-indigo-200">Administrator</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="px-2 mt-4 space-y-1">
                    <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-indigo-600 bg-opacity-75 rounded-lg">
                        <i class="mr-3 fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                    <a href="/admin/users" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="mr-3 fas fa-users"></i>
                        Users
                    </a>
                    <a href="/admin/settings" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="mr-3 fas fa-cog"></i>
                        Settings
                    </a>
                    <a href="/admin/reports" class="flex items-center px-4 py-3 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="mr-3 fas fa-chart-bar"></i>
                        Reports
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t border-indigo-500">
                <a href="/logout" class="flex items-center px-4 py-2 text-sm font-medium text-indigo-200 rounded-lg hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                    <i class="mr-3 fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.remove('hidden');
        });

        document.getElementById('close-mobile-menu').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('hidden');
        });

        document.getElementById('sidebar-backdrop').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('hidden');
        });
    </script>

    @stack('scripts')


</body>
</html>
