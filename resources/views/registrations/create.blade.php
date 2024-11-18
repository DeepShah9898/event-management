{{-- resources/views/registrations/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 text-primary font-weight">Event Registration</h1>
            <a href="{{ route('registrations.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>
                Back to registrations</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg rounded-3 border-0 p-3">
            <!-- Registration Form -->
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <!-- Event Selection -->
                <div class="form-group mb-3">
                    <label for="event" class="font-weight-semibold">Select Event</label>
                    <select name="event_id" id="event"
                        class="form-control form-control-sm shadow-sm @error('event_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Select an event</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                    @error('event_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ticket Type Input -->
                <div class="form-group mb-3">
                    <label for="ticket_type" class="font-weight-semibold">Ticket Type</label>
                    <input type="text" name="ticket_type" id="ticket_type"
                        class="form-control form-control-sm shadow-sm @error('ticket_type') is-invalid @enderror" required>
                    @error('ticket_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quantity Input -->
                <div class="form-group mb-3">
                    <label for="quantity" class="font-weight-semibold">Quantity</label>
                    <input type="number" name="quantity" id="quantity"
                        class="form-control form-control-sm shadow-sm @error('quantity') is-invalid @enderror"
                        min="1" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="form-group mb-3">
                    <label for="email" class="font-weight-semibold">Email Address</label>
                    <input type="email" name="email" id="email"
                        class="form-control form-control-sm shadow-sm @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Payment Status Selection -->
                <div class="form-group mb-4">
                    <label for="payment_status" class="font-weight-semibold">Payment Status</label>
                    <select name="payment_status" id="payment_status"
                        class="form-control form-control-sm shadow-sm @error('payment_status') is-invalid @enderror"
                        required>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                    </select>
                    @error('payment_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-sm w-100 shadow-sm mt-3">Register</button>
            </form>
        </div>
    </div>
@endsection
