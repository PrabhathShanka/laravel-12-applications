<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventRegistrationConfirmation;

class EventController extends Controller
{

    public function home()
    {
        $events = Event::where('date', '>=', today())
            ->orderBy('date')
            ->take(3)
            ->get();

        return view('home', compact('events'));
    }
    public function index()
    {
        $events = Event::orderBy('date')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events');
        }

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image) {
                Storage::Delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events');
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::Delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    // public function register(Request $request, Event $event)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'name' => 'required'
    //     ]);

    //     // In a real app, you'd save this to a registrations table
    //     // For now, we'll just send the email

    //     Mail::to($request->email)->send(new EventRegistrationConfirmation($event, $request->name));

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Registration successful! Check your email for confirmation.'
    //     ]);
    // }

    // public function dailyReport()
    // {
    //     $events = Event::whereDate('date', today())->get();

    //     return view('admin.events.report', compact('events'));
    // }
}
