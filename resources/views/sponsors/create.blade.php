{{-- resources/views/sponsors/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Add New Sponsor</h1>
        <a href="{{ route('sponsors.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back to Sponsors</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg rounded-3 border-0 p-3">
        <form action="{{ route('sponsors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fs-5 text-muted">Sponsor Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm shadow-sm" placeholder="Enter sponsor name" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="website" class="form-label fs-5 text-muted">Website</label>
                <input type="url" name="website" id="website" class="form-control form-control-sm shadow-sm" placeholder="https://example.com" value="{{ old('website') }}">
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label fs-5 text-muted">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control form-control-sm shadow-sm">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label fs-5 text-muted">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-sm shadow-sm" placeholder="contact@example.com" value="{{ old('email') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label fs-5 text-muted">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-sm shadow-sm" placeholder="123-456-7890" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label fs-5 text-muted">Address</label>
                <textarea name="address" id="address" class="form-control form-control-sm shadow-sm" rows="2" placeholder="Enter address">{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fs-5 text-muted">Description</label>
                <textarea name="description" id="description" class="form-control form-control-sm shadow-sm" rows="2" placeholder="Write a brief description">{{ old('description') }}</textarea>
            </div>

            {{-- Uncomment if using social media JSON --}}
            {{-- <div class="mb-3">
                <label for="social_media" class="form-label fs-5 text-muted">Social Media (JSON)</label>
                <textarea name="social_media" id="social_media" class="form-control form-control-sm shadow-sm" placeholder="Add social media JSON">{{ old('social_media') }}</textarea>
            </div> --}}

            <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm mt-3">Save Sponsor</button>
        </form>
    </div>
</div>
@endsection
