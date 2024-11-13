<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration; // Assuming you have a Registration model for event attendees
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the total number of events
        $totalEvents = Event::count();

        // Fetch the number of upcoming events (assuming you have a date field for event dates)
        $upcomingEvents = Event::where('date', '>=', now())->count();

        // Fetch the total number of registrations or attendees
        $totalRegistrations = Registration::count(); // Change this model name if you use something else

        // Calculate total revenue (if you have a price field in the events)
        $totalRevenue = Event::where('date', '>=', now())->sum('price');

        return view('dashboard.index', compact('totalEvents', 'upcomingEvents', 'totalRegistrations', 'totalRevenue'));
    }
}
