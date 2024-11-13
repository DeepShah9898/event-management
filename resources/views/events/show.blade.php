@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Venue:</strong> {{ $event->venue }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <p><strong>Price:</strong> ${{ $event->price }}</p>
    <p><strong>Capacity:</strong> {{ $event->capacity }}</p>
    <p><strong>Created By:</strong> {{ $event->user->name }}</p> 
</div>
@endsection
