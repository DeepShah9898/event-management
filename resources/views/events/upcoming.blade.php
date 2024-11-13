@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Upcoming Events</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($upcomingEvents as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
