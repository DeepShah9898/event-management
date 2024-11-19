@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 text-primary">Registrations</h1>
            <a href="{{ url('/register-events') }}" class="btn btn-outline-success">
                <i class="fas fa-plus"></i> Register for an Event
            </a>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- No Registrations Available Alert --}}
        @if($registrations->isEmpty())
            <div class="alert alert-warning text-center">
                No registrations available at the moment.
            </div>
        @else
            {{-- Registrations Table --}}
            <div class="table-responsive shadow-sm rounded-lg">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
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
                                <td>{{ $registration->user->name }}</td>
                                <td>{{ $registration->event->title }}</td>
                                <td>{{ $registration->ticket_type }}</td>
                                <td>{{ $registration->quantity }}</td>
                                <td>
                                    {{-- Payment Status Badge --}}
                                    @if($registration->payment_status == 'paid')
                                        <span class="badge bg-success text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Paid">Paid</span>
                                    @else
                                        <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Pending">Pending</span>
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

@section('styles')
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .alert-warning {
            font-size: 16px;
            text-align: center;
        }

        .btn-outline-success {
            border-color: #28a745;
            color: #28a745;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination li a {
            color: #007bff;
        }

        .pagination li a:hover {
            background-color: #007bff;
            color: white;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Enable Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
