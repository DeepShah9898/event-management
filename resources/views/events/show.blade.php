@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h2>{{ $event->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</p>
            <p><strong>Venue:</strong> {{ $event->venue }}</p>
            <p><strong>Description:</strong> {{ $event->description ?? 'No description provided.' }}</p>
            <p><strong>Price:</strong> ${{ $event->price ?? 'Free' }}</p>
            <p><strong>Capacity:</strong> {{ $event->capacity ?? 'Unlimited' }} people</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('events.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Events</a>
        </div>
    </div>
</div>
@endsection
