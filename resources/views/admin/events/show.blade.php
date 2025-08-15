@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="container mx-auto">
    <div class="p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between mb-6">
            <h2 class="text-2xl font-bold">{{ $event->title }}</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.events.edit', $event) }}"
                   class="px-3 py-1 text-sm text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-3 py-1 text-sm text-white bg-red-500 rounded-md hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete this event?')">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div class="md:col-span-2">
                @if($event->image)
                    <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}"
                         class="object-cover w-full rounded-lg h-96">
                @endif

                <div class="mt-6">
                    <h3 class="text-lg font-semibold">Event Details</h3>
                    <p class="mt-2 text-gray-600">{{ $event->description }}</p>
                </div>
            </div>

            <div>
                <div class="p-4 border rounded-lg">
                    <h3 class="text-lg font-semibold">Event Information</h3>

                    <div class="mt-4 space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Date</h4>
                            <p>{{ $event->date->format('F j, Y') }}</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Time</h4>
                            <p>{{ $event->time }}</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Venue</h4>
                            <p>{{ $event->venue }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
