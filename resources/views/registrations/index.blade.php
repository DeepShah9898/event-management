{{-- resources/views/registrations/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 text-primary">Registrations</h1>
        <a href="{{ url('/register-events') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Register for an Event</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($registrations->isEmpty())
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            No registrations available at the moment.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Event</th>
                        <th>Ticket Type</th>
                        <th>Quantity</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $registration->id }}</td>
                            <td>{{ $registration->user->name }}</td>
                            <td>{{ $registration->event->title }}</td>
                            <td>{{ $registration->ticket_type }}</td>
                            <td>{{ $registration->quantity }}</td>
                            <td>
                                <!-- Payment Status Badge -->
                                @if($registration->payment_status == 'paid')
                                    <span class="badge bg-success text-white">Paid</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
