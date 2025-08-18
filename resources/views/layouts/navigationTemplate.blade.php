<nav class="bg-white shadow-lg">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-between h-16"> <!-- Fixed height for header -->
            <!-- Logo -->
            <div>
                <a href="/" class="text-xl font-bold text-gray-800">Task Manager</a>
            </div>

            <!-- Navigation Links -->


            <!-- Login & Register Buttons (Improved Design) -->
            <div class="items-center hidden space-x-3 md:flex">
                <a href="/login"
                    class="px-4 py-2 font-medium text-gray-700 transition duration-200 rounded-md hover:text-gray-900 hover:bg-gray-100">
                    Login
                </a>
                <a href="/register"
                    class="px-4 py-2 font-medium text-white transition duration-200 bg-blue-600 rounded-md shadow-sm hover:bg-blue-700 hover:shadow-md">
                    Register
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button class="text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
