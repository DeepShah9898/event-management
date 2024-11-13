{{-- resources/views/profile/change-password.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-light rounded-3">
        <div class="card-header bg-primary text-white text-center">
            <h4>Change Password</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form action="{{ route('profile.updatePassword') }}" method="POST">
                @csrf
                @method('PUT') <!-- This tells Laravel to treat the request as a PUT request -->
                
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
