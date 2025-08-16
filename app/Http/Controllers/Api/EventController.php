<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Public list & view
    public function index()
    {
        return Event::latest('date')->paginate(10);
    }

    public function show(Event $event)
    {
        return $event;
    }

    // Protected: create/update/delete
    public function store(Request $request)
    {info($request->all());
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'venue'       => 'required|string|max:255',
            'date'        => 'required|date',
            'time'        => 'required', // HH:MM or HH:MM:SS
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event = Event::create($validated);

        return response()->json($event, 201);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'venue'       => 'sometimes|required|string|max:255',
            'date'        => 'sometimes|required|date',
            'time'        => 'sometimes|required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // delete old if exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        return response()->json($event);
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
