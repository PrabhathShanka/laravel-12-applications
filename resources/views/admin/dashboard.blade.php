@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-indigo-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                <i class="fas fa-users text-lg"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Users</p>
                <p class="text-2xl font-semibold text-gray-800">1,248</p>
                <p class="text-xs text-green-500 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 12.5% from last month
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <i class="fas fa-shopping-cart text-lg"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Orders</p>
                <p class="text-2xl font-semibold text-gray-800">324</p>
                <p class="text-xs text-green-500 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 8.2% from last month
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fas fa-dollar-sign text-lg"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Revenue</p>
                <p class="text-2xl font-semibold text-gray-800">$12,845</p>
                <p class="text-xs text-red-500 mt-1">
                    <i class="fas fa-arrow-down mr-1"></i> 3.1% from last month
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                <i class="fas fa-chart-line text-lg"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Conversion</p>
                <p class="text-2xl font-semibold text-gray-800">3.6%</p>
                <p class="text-xs text-green-500 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 1.2% from last month
                </p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">View All</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-start pb-4 border-b border-gray-100">
                <img class="h-10 w-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                <div>
                    <p class="text-sm font-medium text-gray-800">Sarah Johnson <span class="text-gray-500 font-normal">created a new order</span></p>
                    <p class="text-xs text-gray-500 mt-1">Order #1245 - 15 minutes ago</p>
                </div>
            </div>
            <div class="flex items-start pb-4 border-b border-gray-100">
                <img class="h-10 w-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                <div>
                    <p class="text-sm font-medium text-gray-800">Michael Chen <span class="text-gray-500 font-normal">updated profile information</span></p>
                    <p class="text-xs text-gray-500 mt-1">User profile - 2 hours ago</p>
                </div>
            </div>
            <div class="flex items-start pb-4 border-b border-gray-100">
                <img class="h-10 w-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/women/68.jpg" alt="User">
                <div>
                    <p class="text-sm font-medium text-gray-800">Emily Wilson <span class="text-gray-500 font-normal">completed payment</span></p>
                    <p class="text-xs text-gray-500 mt-1">Order #1244 - 5 hours ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <img class="h-10 w-10 rounded-full mr-3" src="https://randomuser.me/api/portraits/men/75.jpg" alt="User">
                <div>
                    <p class="text-sm font-medium text-gray-800">David Kim <span class="text-gray-500 font-normal">registered new account</span></p>
                    <p class="text-xs text-gray-500 mt-1">New user - 1 day ago</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Stats</h3>
        <div class="space-y-4">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Active Users</p>
                <div class="flex items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 72%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-800">72%</span>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Storage Usage</p>
                <div class="flex items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-800">45%</span>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Task Completion</p>
                <div class="flex items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 89%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-800">89%</span>
                </div>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Bandwidth Usage</p>
                <div class="flex items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 63%"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-800">63%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">View All Orders</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#1245</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                <div class="text-sm text-gray-500">sarah@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 May 2023</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$245.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#1244</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Emily Wilson</div>
                                <div class="text-sm text-gray-500">emily@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14 May 2023</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$189.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#1243</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                <div class="text-sm text-gray-500">michael@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13 May 2023</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$320.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    alert('Script loaded for this page!');
</script>
@endpush

