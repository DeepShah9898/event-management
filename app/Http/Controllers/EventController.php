<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to create an event.');
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
        ]);
    
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'venue' => $request->venue,
            'created_by' => Auth::id(),
            'price' => $request->price,
            'capacity' => $request->capacity,
        ]);
    
        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function upcoming()
    {
        dd("asd");
        $upcomingEvents = Event::where('date', '>', now())->get();

        return view('events.upcoming', compact('upcomingEvents'));
    }

    public function show($id)
    {
        // Retrieve the event by its ID
        $event = Event::findOrFail($id);
        
        // Return the view with the event data
        return view('events.show', compact('event'));
    }
}    
