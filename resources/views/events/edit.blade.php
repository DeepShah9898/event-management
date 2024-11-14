{{-- resources/views/events/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Edit Event</h1>
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
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fs-5 text-muted">Event Title</label>
                <input type="text" name="title" id="title" class="form-control form-control-sm shadow-sm" placeholder="Enter event title" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fs-5 text-muted">Event Description</label>
                <textarea name="description" id="description" class="form-control form-control-sm shadow-sm" rows="3" placeholder="Write a brief description">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label fs-5 text-muted">Event Date</label>
                <input type="date" name="date" id="date" class="form-control form-control-sm shadow-sm" value="{{ old('date', $event->date) }}" required>
            </div>

            <div class="mb-3">
                <label for="venue" class="form-label fs-5 text-muted">Event Venue</label>
                <input type="text" name="venue" id="venue" class="form-control form-control-sm shadow-sm" placeholder="Enter venue" value="{{ old('venue', $event->venue) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fs-5 text-muted">Event Price</label>
                <input type="number" name="price" id="price" class="form-control form-control-sm shadow-sm" value="{{ old('price', $event->price) }}" min="0" step="0.01">
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label fs-5 text-muted">Event Capacity</label>
                <input type="number" name="capacity" id="capacity" class="form-control form-control-sm shadow-sm" value="{{ old('capacity', $event->capacity) }}" min="1">
            </div>

            <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm mt-3">Update Event</button>
        </form>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 0.375rem;
            padding: 0.75rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.375rem;
            padding: 1rem 2rem;
            font-size: 1.25rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .card-footer {
            background-color: #f8f9fa;
        }

        .form-group.text-center {
            margin-top: 20px;
        }
    </style>
@endsection
