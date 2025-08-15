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
<body class="bg-gray-50 font-sans antialiased text-gray-800">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gradient-to-b from-indigo-700 to-indigo-900">
                <div class="flex items-center justify-center h-16 px-4 border-b border-indigo-500">
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-white mr-2 text-xl"></i>
                        <span class="text-white text-xl font-semibold">AdminPro</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <!-- User Profile -->
                    <div class="flex items-center px-2 py-4 border-b border-indigo-500">
                        <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">Admin User</p>
                            <p class="text-xs font-medium text-indigo-200">Administrator</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="mt-6 flex-1 space-y-1">
                        <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-white bg-indigo-600 bg-opacity-75">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="/admin/users" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="fas fa-users mr-3"></i>
                            Users
                        </a>
                        <a href="/admin/settings" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="fas fa-cog mr-3"></i>
                            Settings
                        </a>
                        <a href="/admin/reports" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="fas fa-chart-bar mr-3"></i>
                            Reports
                        </a>
                        <a href="/admin/notifications" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                            <i class="fas fa-bell mr-3"></i>
                            Notifications
                            <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">3</span>
                        </a>
                    </nav>
                </div>
                <div class="p-4 border-t border-indigo-500">
                    <a href="/logout" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Mobile Header -->
            <header class="md:hidden bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button id="mobile-menu-button" class="text-gray-500 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <span class="ml-3 text-lg font-semibold">@yield('header')</span>
                    </div>
                    <div class="flex items-center">
                        <button class="text-gray-500 focus:outline-none mr-4">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-2 right-3 h-2 w-2 rounded-full bg-red-500"></span>
                        </button>
                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                    </div>
                </div>
            </header>

            <!-- Desktop Header -->
            <header class="hidden md:block bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-3">
                    <h1 class="text-xl font-semibold text-gray-800">@yield('header')</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                            </button>
                        </div>
                        <div class="relative">
                            <button class="flex items-center focus:outline-none">
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                                <span class="ml-2 text-sm font-medium text-gray-700">Admin</span>
                                <i class="fas fa-chevron-down ml-1 text-gray-500 text-xs"></i>
                            </button>
                        </div>
                        <a href="/" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-external-link-alt mr-1"></i> View Site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
                <!-- Breadcrumbs -->
                <div class="mb-6 hidden md:block">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                                    <i class="fas fa-home mr-2"></i>
                                    Home
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">@yield('header')</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <!-- Page Heading -->
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">@yield('header')</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-filter mr-2"></i> Filter
                        </button>
                        <button class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus mr-2"></i> New
                        </button>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-600 bg-opacity-75" id="sidebar-backdrop"></div>
        <div class="relative flex flex-col w-72 max-w-xs h-full bg-gradient-to-b from-indigo-700 to-indigo-900">
            <div class="flex items-center justify-between h-16 px-4 border-b border-indigo-500">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt text-white mr-2 text-xl"></i>
                    <span class="text-white text-xl font-semibold">AdminPro</span>
                </div>
                <button id="close-mobile-menu" class="text-white focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto py-4">
                <!-- User Profile -->
                <div class="flex items-center px-4 py-4 border-b border-indigo-500">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Admin+User&background=random" alt="Admin User">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs font-medium text-indigo-200">Administrator</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="mt-4 px-2 space-y-1">
                    <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-white bg-indigo-600 bg-opacity-75">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="/admin/users" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="fas fa-users mr-3"></i>
                        Users
                    </a>
                    <a href="/admin/settings" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="fas fa-cog mr-3"></i>
                        Settings
                    </a>
                    <a href="/admin/reports" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="fas fa-chart-bar mr-3"></i>
                        Reports
                    </a>
                    <a href="/admin/notifications" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                        <i class="fas fa-bell mr-3"></i>
                        Notifications
                        <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">3</span>
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t border-indigo-500">
                <a href="/logout" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-indigo-200 hover:text-white hover:bg-indigo-600 hover:bg-opacity-75">
                    <i class="fas fa-sign-out-alt mr-3"></i>
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
