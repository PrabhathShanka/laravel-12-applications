<?php

namespace App\Http\Controllers;

use App\Handlers\EventHandlers;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function __construct(private EventHandlers $eventHandler)
    {
        //
    }

    public function home()
    {
        try {
            $events = $this->eventHandler->getUpcomingEvents();
            return view('home', compact('events'));
        } catch (Exception $e) {
            Log::error('Error fetching upcoming events: ' . $e->getMessage());
            return back()->with('error', 'Failed to load upcoming events. Please try again later.');
        }
    }

    public function index()
    {
        try {
            $events = $this->eventHandler->getEvent();
            return view('admin.events.index', compact('events'));
        } catch (Exception $e) {
            Log::error('Error fetching events: ' . $e->getMessage());
            return back()->with('error', 'Failed to load events. Please try again later.');
        }
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(StoreEventRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->eventHandler->storeEvent($validated, $request);

            return redirect()->route('admin.events.index')
                ->with('success', 'Event created successfully.');
        } catch (Exception $e) {
            Log::error('Error storing event: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create event. Please try again.');
        }
    }
    public function show(Event $event)
    {
        try {
            return view('admin.events.show', compact('event'));
        } catch (Exception $e) {
            Log::error('Error showing event: ' . $e->getMessage());
            return back()->with('error', 'Failed to load event details. Please try again later.');
        }
    }

    public function edit(Event $event)
    {
        try {
            return view('admin.events.edit', compact('event'));
        } catch (Exception $e) {
            Log::error('Error editing event: ' . $e->getMessage());
            return back()->with('error', 'Failed to load event for editing. Please try again later.');
        }
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        try {
            $validated = $request->validated();
            $this->eventHandler->updateEvent($event, $request, $validated);

            return redirect()->route('admin.events.index')
                ->with('success', 'Event updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating event: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to update event. Please try again.');
        }
    }

    public function destroy(Event $event)
    {
        try {
            $this->eventHandler->deleteEvent($event);
            return redirect()->route('admin.events.index')
                ->with('success', 'Event deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting event: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete event. Please try again.');
        }
    }
}
