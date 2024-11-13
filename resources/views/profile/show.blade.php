{{-- resources/views/profile/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container profile-container mt-5">
    <div class="card profile-card shadow-sm border-light rounded-3">
        <div class="card-header bg-primary text-white text-center">
            <h4><i class="fas fa-user"></i> Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <!-- Profile Image -->
                    <img src="https://via.placeholder.com/150" alt="Profile Image" class="img-fluid rounded-circle mb-3 profile-image">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                </div>
                <div class="col-md-8">
                    <h5>Profile Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Name:</strong> {{ Auth::user()->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </li>
                        <!-- You can add more fields as necessary -->
                        <li class="list-group-item">
                            <strong>Joined:</strong> {{ Auth::user()->created_at->format('d M, Y') }}
                        </li>
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit Profile</a>
                        <a href="{{ route('password.request') }}" class="btn btn-secondary btn-sm ms-2"><i class="fas fa-key"></i> Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .profile-container {
            max-width: 960px;
            margin: 0 auto;
        }
        .profile-card {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
        }
        .profile-card .card-header {
            font-size: 24px;
            padding: 20px;
            background-color: #007bff;
            color: white;
        }
        .profile-card .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card h5 {
            font-size: 22px;
            margin-top: 15px;
        }
        .profile-card .list-group-item {
            font-size: 16px;
            padding: 15px;
        }
        .profile-card .list-group-item strong {
            color: #007bff;
        }
        .profile-card .btn {
            font-size: 14px;
            padding: 8px 15px;
            border-radius: 25px;
        }
        .profile-card .btn-warning {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }
        .profile-card .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
@endsection
