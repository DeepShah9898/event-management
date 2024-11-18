<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('user', 'event')->get();
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $events = Event::all();
        return view('registrations.create', compact('events'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'payment_status' => 'required|string|in:pending,paid',
        ]);

        if (Auth::check()) {
            // Create a new registration
            $registration = Registration::create([
                'user_id' => Auth::id(),
                'event_id' => $request->event_id,
                'ticket_type' => $request->ticket_type,
                'quantity' => $request->quantity,
                'payment_status' => $request->payment_status,
            ]);

            // Send confirmation email
            $email = Auth::user()->email;
            Mail::to($email)->send(new RegistrationConfirmation($registration));

            return redirect()->route('registrations.create')
                ->with('success', 'Registration successful! A confirmation email has been sent.');
        }

        return redirect()->route('login')->with('error', 'Please log in to register.');
    }

    public function verifyEmail($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('success', 'Email verified successfully!');
    }
}
