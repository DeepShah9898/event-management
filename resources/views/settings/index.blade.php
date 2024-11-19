<!-- resources/views/settings/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Settings</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    {{-- Settings Form --}}
    <div class="card shadow-sm rounded-lg">
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="app_name" class="form-label">App Name</label>
                    <input type="text" class="form-control" id="app_name" name="app_name" value="{{ $settings->where('key', 'app_name')->first()->value ?? '' }}">
                </div>

                <div class="form-group mb-3">
                    <label for="app_email" class="form-label">App Email</label>
                    <input type="email" class="form-control" id="app_email" name="app_email" value="{{ $settings->where('key', 'app_email')->first()->value ?? '' }}">
                </div>

                <div class="form-group mb-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $settings->where('key', 'contact_number')->first()->value ?? '' }}">
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address">{{ $settings->where('key', 'address')->first()->value ?? '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm mt-3"">Update Settings</button>
          
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .container {
            max-width: 800px;
        }

        .card {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .alert-success {
            font-size: 16px;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Enable Bootstrap tooltips if needed
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
