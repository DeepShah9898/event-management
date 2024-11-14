{{-- resources/views/sponsors/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h2>{{ $sponsor->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Sponsor Details --}}
                <div class="col-md-8">
                    <p><strong>Website:</strong> <a href="{{ $sponsor->website }}" target="_blank">{{ $sponsor->website }}</a></p>
                    <p><strong>Description:</strong> {{ $sponsor->description ?? 'No description provided.' }}</p>
                    <p><strong>Contact Email:</strong> {{ $sponsor->email ?? 'Not available' }}</p>
                    <p><strong>Phone:</strong> {{ $sponsor->phone ?? 'Not available' }}</p>
                    <p><strong>Address:</strong> {{ $sponsor->address ?? 'Not available' }}</p>
                </div>

                {{-- Logo Section --}}
                <div class="col-md-4 text-center mb-4">
                    <img src="{{ asset($sponsor->logo) }}" alt="Sponsor Logo" class="img-fluid rounded shadow-sm" width="170">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Sponsors
            </a>
        </div>
    </div>
</div>
@endsection
