<!-- resources/views/settings/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Settings</h2>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="app_name">App Name</label>
            <input type="text" class="form-control" id="app_name" name="app_name" value="{{ $settings->where('key', 'app_name')->first()->value ?? '' }}">
        </div>
        
        <div class="form-group">
            <label for="app_email">App Email</label>
            <input type="email" class="form-control" id="app_email" name="app_email" value="{{ $settings->where('key', 'app_email')->first()->value ?? '' }}">
        </div>
        
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $settings->where('key', 'contact_number')->first()->value ?? '' }}">
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address">{{ $settings->where('key', 'address')->first()->value ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>
</div>
@endsection
