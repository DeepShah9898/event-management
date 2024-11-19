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
        $upcomingEvents = Event::where('date', '>', now())  // Use the 'date' field from your migration
            ->orderBy('date', 'asc')  // Sort events by the 'date' field
            ->paginate(10);  // Paginate with 10 events per page

        return view('events.upcoming', compact('upcomingEvents'));
    }

    public function show($id)
    {
        // Retrieve the event by its ID
        $event = Event::findOrFail($id);

        // Return the view with the event data
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        // Find the event by its ID
        $event = Event::findOrFail($id);

        // Return the edit view with the event data
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);

        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|numeric|min:1',
        ]);

        // Update event details
        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->date = $validated['date'];
        $event->venue = $validated['venue'];
        $event->price = $validated['price'];
        $event->capacity = $validated['capacity'];

        // Save the updated event
        $event->save();

        // Redirect back to the events index with a success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id); // Find the event by ID
        $event->delete(); // Delete the event
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function getTicketPrice($event_id)
    {
        $event = Event::find($event_id);
    
        if ($event) {
            return response()->json(['price' => $event->price], 200);
        }
    
        return response()->json(['error' => 'Event not found'], 404); // Log this error
    }
    
}
