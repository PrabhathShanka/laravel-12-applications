<?php

namespace App\Services;

use App\Models\Event;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventServices
{
    public function getUpcomingEvents()
    {
        try {
            return Event::where('date', '>=', today())
                ->orderBy('date')
                ->take(3)
                ->get();
        } catch (Exception $e) {
            Log::error('Error in EventServices::getUpcomingEvents: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getEvent()
    {
        try {
            return Event::orderBy('date')->get();
        } catch (Exception $e) {
            Log::error('Error in EventServices::getEvent: ' . $e->getMessage());
            throw $e;
        }
    }

    public function storeEvent($validated, $request)
    {
        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('events');
            }

            return Event::create($validated);
        } catch (Exception $e) {
            // Clean up if image was uploaded but event creation failed
            if (isset($validated['image']) && Storage::exists($validated['image'])) {
                Storage::delete($validated['image']);
            }
            Log::error('Error in EventServices::storeEvent: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateEvent($event, $request, $validated)
    {
        try {
            if ($request->hasFile('image')) {
                if ($event->image) {
                    Storage::delete($event->image);
                }
                $validated['image'] = $request->file('image')->store('events');
            }

            return $event->update($validated);
        } catch (Exception $e) {
            Log::error('Error in EventServices::updateEvent: ' . $e->getMessage());
            throw $e;
        }
    }

    public function deleteEvent($event)
    {
        try {
            if ($event->image) {
                Storage::delete($event->image);
            }
            return $event->delete();
        } catch (Exception $e) {
            Log::error('Error in EventServices::deleteEvent: ' . $e->getMessage());
            throw $e;
        }
    }
}
