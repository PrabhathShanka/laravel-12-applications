<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <p>Welcome back, {{ Auth::user()->name }}!</p>
</x-app-layout>
