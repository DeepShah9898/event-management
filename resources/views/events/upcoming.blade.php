@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Upcoming Events</h2>

        {{-- Check if there are any upcoming events --}}
        @if($upcomingEvents->isEmpty())
            <div class="alert alert-warning">
                No upcoming events available at the moment.
            </div>
        @else
            {{-- Display Events in a Table --}}
            <table class="table table-striped table-bordered">
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
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</td>
                            <td>{{ $event->location }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination links if there are many events --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $upcomingEvents->links() }}
            </div>
        @endif
    </div>
@endsection

@section('styles')
    <style>
        .table th, .table td {
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .alert-warning {
            text-align: center;
        }
    </style>
@endsection
