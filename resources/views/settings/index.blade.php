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
    @foreach ($settings as $setting)
        <div class="card shadow-sm rounded-lg mb-3">
            <div class="card-body">
                <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Spoof PUT method -->

                    <div class="form-group mb-3">
                        <label for="value-{{ $setting->id }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                        <input type="text" class="form-control" id="value-{{ $setting->id }}" name="value" value="{{ $setting->value }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm shadow-sm">Update</button>
                </form>
            </div>
        </div>
    @endforeach
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
    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }
    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }
</style>
@endsection
