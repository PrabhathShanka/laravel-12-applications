@extends('layouts.main')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative flex items-center justify-center h-screen text-white bg-gradient-to-r from-indigo-600 to-purple-600">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full bg-opacity-10 filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 bg-purple-400 rounded-full w-96 h-96 bg-opacity-10 filter blur-3xl"></div>
    </div>
    <div class="relative z-10 px-4 text-center sm:px-6 lg:px-8">
        <h1 class="mb-6 text-4xl font-bold md:text-6xl">Manage Your Tasks <span class="text-indigo-200">Effortlessly</span></h1>
        <p class="max-w-3xl mx-auto mb-8 text-xl md:text-2xl">
            Stay on top of your work with our intuitive task management platform.
        </p>
        <div class="flex flex-col justify-center gap-4 sm:flex-row">
            <a href="/register" class="px-8 py-3 font-semibold text-indigo-600 transition duration-300 bg-white rounded-lg shadow-lg hover:bg-gray-100">
                Get Started Free
            </a>
            <a href="#features" class="px-8 py-3 font-semibold text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white hover:bg-opacity-10">
                Learn More
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gray-50">
    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Features</h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">Everything you need to organize your tasks and projects efficiently.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 transition bg-white rounded-lg shadow hover:shadow-lg">
                <h3 class="mb-2 text-xl font-semibold text-gray-900">Task Management</h3>
                <p class="text-gray-600">Create, assign, and track tasks with ease.</p>
            </div>
            <div class="p-6 transition bg-white rounded-lg shadow hover:shadow-lg">
                <h3 class="mb-2 text-xl font-semibold text-gray-900">Team Collaboration</h3>
                <p class="text-gray-600">Collaborate in real-time and stay updated on progress.</p>
            </div>
            <div class="p-6 transition bg-white rounded-lg shadow hover:shadow-lg">
                <h3 class="mb-2 text-xl font-semibold text-gray-900">Analytics & Reports</h3>
                <p class="text-gray-600">Track productivity and performance with clear insights.</p>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Preview Section -->
<section class="py-20 bg-white">
    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Dashboard Preview</h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">Visualize your tasks and progress at a glance.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2">
            <div class="p-6 rounded-lg shadow bg-gray-50">
                <h3 class="mb-2 font-semibold text-gray-900">Upcoming Tasks</h3>
                <ul class="text-gray-700 list-disc list-inside">
                    <li>Design homepage UI - Due Today</li>
                    <li>Team meeting - 2 PM</li>
                    <li>Client feedback review - Tomorrow</li>
                </ul>
            </div>
            <div class="p-6 rounded-lg shadow bg-gray-50">
                <h3 class="mb-2 font-semibold text-gray-900">Statistics</h3>
                <p class="text-gray-700">Tasks Completed: 14 / 20</p>
                <p class="text-gray-700">Pending Tasks: 6</p>
                <p class="text-gray-700">Overdue: 2</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 text-white bg-indigo-600">
    <div class="container px-4 mx-auto text-center sm:px-6 lg:px-8">
        <h2 class="mb-6 text-3xl font-bold md:text-4xl">Ready to Boost Your Productivity?</h2>
        <p class="max-w-2xl mx-auto mb-8 text-lg">Sign up now and take control of your tasks and projects like never before.</p>
        <a href="/register" class="px-8 py-4 font-semibold text-indigo-600 transition bg-white rounded-lg shadow hover:bg-gray-100">
            Get Started Free
        </a>
    </div>
</section>
@endsection
