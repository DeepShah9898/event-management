{{-- resources/views/sponsors/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 text-primary">Sponsors</h1>
            <a href="{{ route('sponsors.create') }}" class="btn btn-outline-success">
                <i class="fas fa-plus"></i> Add New Sponsor
            </a>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- No Sponsors Available Alert --}}
        @if($sponsors->isEmpty())
            <div class="alert alert-info text-center">
                No sponsors available.
            </div>
        @else
            {{-- Sponsors Table --}}
            <div class="table-responsive shadow-lg rounded-lg">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="thead-dark"> <!-- Changed from 'thead-light' to 'thead-dark' -->
                        <tr>
                            <th>Name</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Description</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sponsors as $sponsor)
                            <tr>
                                <td>{{ $sponsor->name }}</td>
                                <td><a href="{{ $sponsor->website }}" target="_blank">{{ $sponsor->website }}</a></td>
                                <td><img src="{{ asset($sponsor->logo) }}" alt="Logo" class="img-fluid rounded-circle" width="80"></td>
                                <td>{{ $sponsor->description }}</td>
                                <td>{{ $sponsor->phone }}</td>
                                <td class="d-flex justify-content-center"> 
                                    {{-- View Button --}}
                                    <a href="{{ route('sponsors.show', $sponsor->id) }}" class="btn btn-info btn-sm mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View Sponsor Details">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    {{-- Edit Button --}}
                                    <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-warning btn-sm mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Sponsor">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('sponsors.destroy', $sponsor->id) }}" method="POST" class="ms-2" onsubmit="return confirm('Are you sure you want to delete this sponsor?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Sponsor">
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
        /* Table Styling */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #343a40; /* Dark background for table header */
            color: white;
            font-weight: bold;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .alert-info {
            font-size: 16px;
            text-align: center;
        }

        .btn-info, .btn-warning, .btn-danger {
            padding: 8px 12px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .table-responsive {
            margin-top: 20px;
        }

        /* Pagination */
        .pagination {
            margin-top: 20px;
        }

        .pagination li a {
            color: #007bff;
            transition: background-color 0.3s;
        }

        .pagination li a:hover {
            background-color: #007bff;
            color: white;
        }

        .table img {
            border-radius: 8px;
        }
        
        /* Tooltips */
        .btn:hover {
            transform: scale(1.05);
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
