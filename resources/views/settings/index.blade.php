@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Settings</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg rounded-3 border-0 p-4">
        <form action="{{ route('settings.updateAll') }}" method="POST">
            @csrf
            @method('PUT')

            @foreach ($settings as $setting)
                <div class="mb-3">
                    <label for="value-{{ $setting->id }}" class="form-label fs-5 text-muted">
                        {{ ucfirst(str_replace('_', ' ', $setting->key)) }}
                    </label>
                    <input type="text" 
                           class="form-control form-control-sm shadow-sm" 
                           id="value-{{ $setting->id }}" 
                           name="settings[{{ $setting->id }}]" 
                           value="{{ $setting->value }}" 
                           placeholder="Enter {{ str_replace('_', ' ', $setting->key) }}">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm mt-3">
                <i class="fas fa-save me-2"></i> Update All
            </button>
        </form>
    </div>
</div>
@endsection
