<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    
    <style>
        /* Style for the hamburger icon to ensure it's white */
        #sidebarToggle i.fas.fa-bars {
            color: white !important;
            margin-top: 5px; /* Add margin to the top of the icon */
        }

        /* Set the username text color to white */
        .navbar .nav-link span {
            color: white !important;
        }

        /* Align items vertically in the navbar */
        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.25rem; /* Slightly larger font for visibility */
            margin-left: 10px; /* Add space between hamburger and title */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark bg-primary">
    <!-- Left Side: Hamburger and Brand -->
    <ul class="navbar-nav">
        <!-- Hamburger toggle button with black icon -->
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0);" id="sidebarToggle" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <!-- Brand/logo -->
        <li class="nav-item">
            <a class="navbar-brand font-weight-bold">
                <span class="text-light">Event Management System</span>
            </a>
        </li>
    </ul>

    <!-- Right Side: User Account Dropdown with User's Name -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0);">
                <i class="fas fa-user-circle"></i> 
                <!-- Display user's name if logged in, otherwise show 'Guest' -->
                <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Guest' }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- Profile Link -->
                <a href="{{ route('profile.show') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <!-- Settings Link -->
                {{-- <a href="{{ route('settings') }}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a> --}}
                <div class="dropdown-divider"></div>
                <!-- Logout Link -->
                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                    @csrf
                    <a href="javascript:void(0);" class="dropdown-item text-danger" onclick="document.getElementById('logoutForm').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                </form>
            </div>
        </li>
    </ul>
</nav>

<!-- JavaScript for Sidebar Toggle and Bootstrap Dropdown -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar toggle functionality
    $('#sidebarToggle').on('click', function() {
        $('.sidebar').toggleClass('active'); // Add 'active' class toggle for your sidebar
    });
</script>

</body>
</html>
