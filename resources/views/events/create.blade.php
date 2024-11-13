{{-- resources/views/events/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Create a New Event</h1>
        <a href="{{ route('events.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back to Events</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg rounded-3 border-0 p-3">
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label fs-5 text-muted">Event Title</label>
                <input type="text" name="title" id="title" class="form-control form-control-sm shadow-sm" placeholder="Enter the event's title" required value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fs-5 text-muted">Event Description</label>
                <textarea name="description" id="description" class="form-control form-control-sm shadow-sm" rows="3" placeholder="Write a brief description of the event">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label fs-5 text-muted">Event Date</label>
                <input type="date" name="date" id="date" class="form-control form-control-sm shadow-sm" required value="{{ old('date') }}">
            </div>

            <div class="mb-3">
                <label for="venue" class="form-label fs-5 text-muted">Event Venue</label>
                <input type="text" name="venue" id="venue" class="form-control form-control-sm shadow-sm" placeholder="Where will the event take place?" required value="{{ old('venue') }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label fs-5 text-muted">Ticket Price (Optional)</label>
                    <input type="number" name="price" id="price" class="form-control form-control-sm shadow-sm" placeholder="Ticket price (if any)" value="{{ old('price') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="capacity" class="form-label fs-5 text-muted">Event Capacity (Optional)</label>
                    <input type="number" name="capacity" id="capacity" class="form-control form-control-sm shadow-sm" placeholder="Max number of attendees" value="{{ old('capacity') }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm mt-3">Create Event</button>
        </form>
    </div>
</div>
@endsection
