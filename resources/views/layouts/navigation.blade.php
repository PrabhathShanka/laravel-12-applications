<!-- Sidebar Navigation -->
<div class="flex flex-col w-64 h-full text-white bg-gradient-to-b from-indigo-700 to-indigo-900">

    <!-- Logo -->
    <div class="flex items-center h-16 px-4 border-b border-indigo-600">
        <i class="mr-2 text-xl fas fa-tasks"></i>
        <span class="text-lg font-semibold">Task Manager</span>
    </div>

    <!-- Profile -->
    <div class="flex items-center px-4 py-4 border-b border-indigo-600">
        <img class="w-10 h-10 rounded-full"
            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
            alt="{{ Auth::user()->name }}">
        <div class="ml-3">
            <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
            <p class="text-xs text-indigo-300">{{ Auth::user()->is_admin ? 'Administrator' : 'User' }}</p>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 mt-4 space-y-1">
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-4 py-3 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-indigo-200 hover:bg-indigo-600 hover:text-white' }}">
            <i class="mr-3 fas fa-tachometer-alt"></i> Dashboard
        </a>

        <a href="{{ route('tasks.index') }}"
           class="flex items-center px-4 py-3 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('tasks.*') ? 'bg-indigo-600 text-white' : 'text-indigo-200 hover:bg-indigo-600 hover:text-white' }}">
            <i class="mr-3 fas fa-list-check"></i> My Tasks
        </a>
        {{--  <a href="#"
           class="flex items-center px-4 py-3 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('tasks.*') ? 'bg-indigo-600 text-white' : 'text-indigo-200 hover:bg-indigo-600 hover:text-white' }}">
            <i class="mr-3 fas fa-list-check"></i> My Tasks
        </a>  --}}

        @if(Auth::user()->is_admin)
        <a href="{{ route('admin.users.index') }}"
           class="flex items-center px-4 py-3 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600 text-white' : 'text-indigo-200 hover:bg-indigo-600 hover:text-white' }}">
            <i class="mr-3 fas fa-users"></i> User Management
        </a>

        <a href="{{ route('admin.tasks.index') }}"
           class="flex items-center px-4 py-3 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('admin.tasks.*') ? 'bg-indigo-600 text-white' : 'text-indigo-200 hover:bg-indigo-600 hover:text-white' }}">
            <i class="mr-3 fas fa-clipboard-list"></i> All Tasks
        </a>

        <a href="{{ route('admin.reports.index') }}"
           class="flex items-center px-4 py-3 text-sm rounded-lg transition-all duration-200 {{ request()->routeIs('admin.reports.*') ? 'bg-indigo-600 text-white' : 'text-indigo-200 hover:bg-indigo-600 hover:text-white' }}">
            <i class="mr-3 fas fa-chart-bar"></i> Reports
        </a>
        @endif
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-indigo-600">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 text-sm text-left text-indigo-200 rounded-lg hover:bg-indigo-600 hover:text-white">
                <i class="mr-3 fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>
