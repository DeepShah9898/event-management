@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 text-primary">Events</h1>
            <a href="{{ route('events.create') }}" class="btn btn-outline-success">
                <i class="fas fa-plus"></i> Create New Event
            </a>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- No Events Available Alert --}}
        @if($events->isEmpty())
            <div class="alert alert-warning text-center">
                No events available at the moment.
            </div>
        @else
            {{-- Events Table --}}
            <div class="table-responsive shadow-sm rounded-lg">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</td>
                                <td>{{ $event->venue }}</td>
                                <td>
                                    {{-- View Button --}}
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Event Details">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    {{-- Edit Button --}}
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Event">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;" class="ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Event">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
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

        /* Colorful Transparent Buttons */
        .btn-primary {
            background-color: transparent;
            border-color: #007bff;
            color: #007bff;
        }

        .btn-primary:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-warning {
            background-color: transparent;
            border-color: #ffc107;
            color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #ffc107;
            color: white;
        }

        .btn-danger {
            background-color: transparent;
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .btn-outline-success {
            background-color: transparent;
            border-color: #28a745;
            color: #28a745;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
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
