<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16"> <!-- Fixed height for header -->
            <!-- Logo -->
            <div>
                <a href="/" class="text-xl font-bold text-gray-800">My App</a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-600 hover:text-gray-900 transition duration-200">Home</a>
                <a href="/about" class="text-gray-600 hover:text-gray-900 transition duration-200">About</a>
                <a href="/contact" class="text-gray-600 hover:text-gray-900 transition duration-200">Contact</a>
            </div>

            <!-- Login & Register Buttons (Improved Design) -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="/login"
                    class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium rounded-md transition duration-200 hover:bg-gray-100">
                    Login
                </a>
                <a href="/register"
                    class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-200 shadow-sm hover:shadow-md">
                    Register
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button class="text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
