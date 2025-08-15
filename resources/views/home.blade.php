@extends('layouts.main')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 to-purple-600 text-white overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white bg-opacity-10 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400 bg-opacity-10 rounded-full filter blur-3xl"></div>
    </div>

    <div class="relative z-10 px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">
            Welcome to <span class="text-indigo-200">ModernApp</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto animate-fade-in-up">
            The most intuitive platform for managing your business with cutting-edge features and analytics.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up">
            <a href="/register" class="px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 transform hover:-translate-y-1 shadow-lg">
                Get Started Free
            </a>
            <a href="/features" class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:bg-opacity-10 transition duration-300 transform hover:-translate-y-1">
                Explore Features
            </a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#features" class="text-white">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Powerful Features
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Everything you need to streamline your workflow and boost productivity
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Analytics</h3>
                <p class="text-gray-600">
                    Real-time data visualization and insights to help you make informed decisions.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-cog text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Customizable Dashboard</h3>
                <p class="text-gray-600">
                    Tailor your workspace to focus on what matters most to your business.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-users text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Team Collaboration</h3>
                <p class="text-gray-600">
                    Work seamlessly with your team through shared projects and real-time updates.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Enterprise Security</h3>
                <p class="text-gray-600">
                    Bank-grade security to protect your sensitive business data.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-mobile-alt text-yellow-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Mobile Ready</h3>
                <p class="text-gray-600">
                    Full functionality on any device, anywhere you need to work.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-plug text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">API Integrations</h3>
                <p class="text-gray-600">
                    Connect with your favorite tools and services effortlessly.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Trusted by Thousands
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Join companies of all sizes who are already transforming their business
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-8 rounded-xl shadow-sm">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah Johnson">
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-900">Sarah Johnson</h4>
                        <p class="text-indigo-600">CEO, TechSolutions</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "ModernApp has completely transformed how we manage our projects. The analytics dashboard alone has saved us hundreds of hours in reporting."
                </p>
                <div class="mt-4 flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-xl shadow-sm">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/men/54.jpg" alt="Michael Chen">
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-900">Michael Chen</h4>
                        <p class="text-indigo-600">CTO, DigitalAgency</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "The team collaboration features are game-changing. We've seen a 40% increase in productivity since switching to ModernApp."
                </p>
                <div class="mt-4 flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white p-8 rounded-xl shadow-sm">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily Wilson">
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-900">Emily Wilson</h4>
                        <p class="text-indigo-600">Marketing Director, BrandCo</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">
                    "The customizable dashboards give each team exactly what they need. Implementation was seamless and the support team is fantastic."
                </p>
                <div class="mt-4 flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <!-- Client Logos -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/150x60?text=Client+1" alt="Client Logo" class="h-12 opacity-60 hover:opacity-100 transition">
            </div>
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/150x60?text=Client+2" alt="Client Logo" class="h-12 opacity-60 hover:opacity-100 transition">
            </div>
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/150x60?text=Client+3" alt="Client Logo" class="h-12 opacity-60 hover:opacity-100 transition">
            </div>
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/150x60?text=Client+4" alt="Client Logo" class="h-12 opacity-60 hover:opacity-100 transition">
            </div>
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/150x60?text=Client+5" alt="Client Logo" class="h-12 opacity-60 hover:opacity-100 transition">
            </div>
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/150x60?text=Client+6" alt="Client Logo" class="h-12 opacity-60 hover:opacity-100 transition">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-indigo-600 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to transform your business?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Join thousands of companies already using ModernApp to streamline their operations
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/register" class="px-8 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 shadow-lg">
                Start Free Trial
            </a>
            <a href="/demo" class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:bg-opacity-10 transition duration-300">
                Request Demo
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    alert('Script loaded for this page!');
</script>
@endpush
