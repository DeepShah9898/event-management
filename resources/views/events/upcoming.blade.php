@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="my-4 text-center text-primary">Upcoming Events</h2>

        {{-- Check if there are any upcoming events --}}
        @if($upcomingEvents->isEmpty())
            <div class="alert alert-warning text-center">
                No upcoming events available at the moment.
            </div>
        @else
            {{-- Display Events in a Table --}}
            <div class="table-responsive shadow-sm rounded-lg">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($upcomingEvents as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</td>
                                <td>{{ $event->venue }}</td>
                                <td>
                                    {{-- View Button --}}
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination links if there are many events --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $upcomingEvents->links('pagination::bootstrap-4') }}
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
        }

        .table-responsive {
            margin-top: 20px;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
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

        .card-header, .card-body {
            padding: 20px;
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
