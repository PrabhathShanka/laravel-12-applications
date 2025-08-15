@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<div class="container mx-auto">
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="mb-6 text-2xl font-bold">Edit Event: {{ $event->title }}</h2>

        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                    <input type="text" name="title" id="title"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           value="{{ old('title', $event->title) }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                    <input type="text" name="venue" id="venue"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           value="{{ old('venue', $event->venue) }}">
                    @error('venue')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           value="{{ old('date', $event->date->format('Y-m-d')) }}">
                    @error('date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                    <input type="time" name="time" id="time"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           value="{{ old('time', $event->time) }}">
                    @error('time')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Event Image</label>
                    @if($event->image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($event->image) }}" alt="Current image" class="object-cover w-32 h-32 rounded">
                            <p class="mt-1 text-sm text-gray-500">Current image</p>
                        </div>
                    @endif
                    <input type="file" name="image" id="image"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           accept="image/*">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6 space-x-4">
                <a href="{{ route('admin.events.index') }}"
                   class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                    Update Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
