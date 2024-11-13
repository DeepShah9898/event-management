{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5>Edit Profile</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT') <!-- This tells Laravel to treat the request as a PUT method -->
            
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
