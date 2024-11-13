{{-- resources/views/events/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Create New Event</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($events->isEmpty())
        <div class="alert alert-info">
            No events available at the moment.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover shadow-sm rounded-3">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
