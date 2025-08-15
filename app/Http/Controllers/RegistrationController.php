<?php

// app/Http/Controllers/RegistrationController.php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $registration = $event->registrations()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'registration' => $registration
        ]);
    }

    public function index(Event $event)
    {
        $registrations = $event->registrations()->latest()->get();
        return response()->json($registrations);
    }
}
