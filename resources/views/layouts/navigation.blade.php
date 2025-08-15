<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16"> <!-- Fixed height for header -->
            <!-- Logo -->
            <div>
                <a href="/" class="text-xl font-bold text-gray-800">My App</a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
                <a href="/about" class="text-gray-600 hover:text-gray-900">About</a>
                <a href="/contact" class="text-gray-600 hover:text-gray-900">Contact</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button class="text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
