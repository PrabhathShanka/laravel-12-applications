@extends('layouts.app')

@section('title', 'Events Management')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Events Management</h2>
        <a href="{{ route('admin.events.create') }}"
           class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
            <i class="mr-1 fas fa-plus"></i> Create Event
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Date & Time</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Venue</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($events as $event)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($event->image)
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full" src="{{ Storage::url($event->image) }}" alt="">
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                                        <div class="text-sm text-gray-500 line-clamp-1">{{ Str::limit($event->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $event->date->format('M d, Y') }}</div>
                                <div class="text-sm text-gray-500">{{ $event->time }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $event->venue }}</td>
                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <a href="{{ route('admin.events.show', $event) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.events.edit', $event) }}" class="ml-2 text-yellow-600 hover:text-yellow-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Are you sure you want to delete this event?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No events found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
