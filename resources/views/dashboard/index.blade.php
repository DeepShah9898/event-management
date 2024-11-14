@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Dashboard</h2>
        </div>

        <!-- Statistics Cards Section -->
        <div class="row">
            <!-- Total Events Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow border-0 rounded-lg h-100">
                    <div class="card-header bg-primary-gradient text-white d-flex align-items-center">
                        <i class="fas fa-calendar-alt icon-spacing"></i>
                        <h6 class="mb-0">Total Events</h6>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="fw-bold display-6">{{ $totalEvents }}</h3>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow border-0 rounded-lg h-100">
                    <div class="card-header bg-warning-gradient text-white d-flex align-items-center">
                        <i class="fas fa-calendar-check icon-spacing"></i>
                        <h6 class="mb-0">Upcoming Events</h6>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="fw-bold display-6">{{ $upcomingEvents }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Registrations Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow border-0 rounded-lg h-100">
                    <div class="card-header bg-info-gradient text-white d-flex align-items-center">
                        <i class="fas fa-users icon-spacing"></i>
                        <h6 class="mb-0">Total Registrations</h6>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="fw-bold display-6">{{ $totalRegistrations }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Sponsors Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow border-0 rounded-lg h-100">
                    <div class="card-header bg-dark-gradient text-white d-flex align-items-center">
                        <i class="fas fa-handshake icon-spacing"></i>
                        <h6 class="mb-0">Total Sponsors</h6>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="fw-bold display-6">{{ $totalSponsors }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Revenue Card -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow border-0 rounded-lg h-100">
                    <div class="card-header bg-success-gradient text-white d-flex align-items-center">
                        <i class="fas fa-dollar-sign icon-spacing"></i>
                        <h6 class="mb-0">Total Revenue</h6>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="fw-bold display-6">₹{{ number_format($totalRevenue, 2) }}</h3>
                    </div>
                </div>
            </div>

        </div>

        <!-- Quick Actions Section -->
        <div class="row mt-4">
            {{-- <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('events.create') }}" class="btn btn-primary btn-block py-3 shadow rounded-lg text-uppercase fw-bold">
                    <i class="fas fa-plus-circle me-2"></i> Create New Event
                </a>
            </div> --}}
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('events.index') }}" class="btn btn-info btn-block py-3 shadow rounded-lg text-uppercase fw-bold">
                    <i class="fas fa-list me-2"></i> View All Events
                </a>
            </div>
            {{-- <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('registrations.create') }}" class="btn btn-success btn-block py-3 shadow rounded-lg text-uppercase fw-bold">
                    <i class="fas fa-address-book me-2"></i> Register Event
                </a>
            </div> --}}
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('registrations.index') }}" class="btn btn-secondary btn-block py-3 shadow rounded-lg text-uppercase fw-bold">
                    <i class="fas fa-list me-2"></i> View Registrations
                </a>
            </div>

            <!-- Add Sponsor Button -->
            {{-- <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('sponsors.create') }}" class="btn btn-dark btn-block py-3 shadow rounded-lg text-uppercase fw-bold">
                    <i class="fas fa-handshake me-2"></i> Add Sponsor
                </a>
            </div> --}}

            <!-- View Sponsor Button -->
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('sponsors.index') }}" class="btn btn-warning btn-block py-3 shadow rounded-lg text-uppercase fw-bold">
                    <i class="fas fa-list me-2"></i> View Sponsors
                </a>
            </div>
        </div>
    </div>
@endsection

<!-- Custom CSS for Professional Look -->
<style>
    /* Gradient backgrounds for headers */
    .bg-primary-gradient { background: linear-gradient(45deg, #007bff, #0056b3); }
    .bg-warning-gradient { background: linear-gradient(45deg, #ffc107, #e0a800); }
    .bg-info-gradient { background: linear-gradient(45deg, #17a2b8, #117a8b); }
    .bg-success-gradient { background: linear-gradient(45deg, #28a745, #1c7430); }
    .bg-dark-gradient { background: linear-gradient(45deg, #343a40, #212529); }

    /* General Card Styling */
    .card-header {
        display: flex;
        align-items: center;
        font-size: 1.1rem;
        padding: 1rem;
        border-bottom: none;
    }
    .card-body h3 {
        font-size: 2rem;
        margin-top: 15px;
        font-weight: 700;
    }

    /* Custom icon spacing */
    .icon-spacing {
        margin-right: 0.5rem; /* Increases space between icon and text */
        font-size: 1.3rem;
    }

    /* Button Styling */
    .btn {
        font-size: 1rem;
        transition: transform 0.2s ease-in-out;
    }
    .btn:hover {
        transform: scale(1.05);
    }
</style>
