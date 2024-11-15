<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        // Fetch all registrations
        $registrations = Registration::with('user', 'event')->get();

        // Return the view with registrations data
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        // Fetch all available events to display in the registration form
        $events = Event::all();

        return view('registrations.create', compact('events'));
    }

    public function store(Request $request)
{
    // Validate the data
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'ticket_type' => 'required|string',
        'quantity' => 'required|integer',
        'payment_status' => 'required|string',
    ]);

    // Create the registration
    if(auth()->check){
        
        Registration::create([
            'user_id' => auth()->id(), // Store user ID
            'event_id' => $request->event_id,
            'ticket_type' => $request->ticket_type,
            'quantity' => $request->quantity,
            'payment_status' => $request->payment_status,
        ]);
    }

    // Redirect back with a success message
    return redirect()->route('register')->with('success', 'Registration successful!');
}

}
