<?php

namespace App\Handlers;

use App\Models\Event;
use App\Services\EventServices;
use Exception;
use Illuminate\Support\Facades\Log;

class EventHandlers
{
    public function __construct(private EventServices $eventServices)
    {
        //
    }

    public function getUpcomingEvents()
    {
        try {
            return $this->eventServices->getUpcomingEvents();
        } catch (Exception $e) {
            Log::error('Error in EventHandlers::getUpcomingEvents: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getEvent()
    {
        try {
            return $this->eventServices->getEvent();
        } catch (Exception $e) {
            Log::error('Error in EventHandlers::getEvent: ' . $e->getMessage());
            throw $e;
        }
    }

    public function storeEvent($validated, $request)
    {
        try {
            return $this->eventServices->storeEvent($validated, $request);
        } catch (Exception $e) {
            Log::error('Error in EventHandlers::storeEvent: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateEvent($event, $request, $validated)
    {
        try {
            return $this->eventServices->updateEvent($event, $request, $validated);
        } catch (Exception $e) {
            Log::error('Error in EventHandlers::updateEvent: ' . $e->getMessage());
            throw $e;
        }
    }

    public function deleteEvent($event)
    {
        try {
            return $this->eventServices->deleteEvent($event);
        } catch (Exception $e) {
            Log::error('Error in EventHandlers::deleteEvent: ' . $e->getMessage());
            throw $e;
        }
    }
}
