<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <i class="fas fa-calendar-alt brand-icon"></i> <!-- Symbol for Event Management -->
        <span class="brand-text font-weight-light text-white">Event Manager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Events Link with Submenu -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Events
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('events.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Create Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('upcoming.events') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Upcoming Events</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Registrations Link with Submenu -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Registrations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('registrations.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Add Registration</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sponsors Link with Submenu -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Sponsors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sponsors.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Add Sponsor</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings Link with Submenu -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- General Settings Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('settings') }}" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<!-- CSS for a Modern and Sleek Sidebar -->
<style>
    /* General Sidebar styling */
    .main-sidebar {
        background-color: #121212; /* Dark background for a modern look */
        color: #dcdde1; /* Soft text color */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
    }
    .brand-link {
        background-color: #1e1e2d; /* Darker background for the brand section */
        border-bottom: 2px solid #333;
        color: #ffffff;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        transition: background-color 0.3s;
    }
    .brand-link:hover {
        background-color: #2b2b3d;
    }
    .brand-icon {
        margin-right: 10px;
        font-size: 30px;
    }

    /* Sidebar Link Styling */
    .sidebar-dark-primary .nav-link {
        color: #b8c7d3; /* Light grey text for links */
        font-size: 16px;
        padding: 12px 18px;
        transition: background-color 0.3s, color 0.3s;
    }
    .sidebar-dark-primary .nav-link:hover {
        background-color: #495057; /* Darker background on hover */
        color: #ffffff; /* White text on hover */
    }

    /* Active Link */
    .sidebar .nav-pills .nav-item > .nav-link.active {
        background-color: #1f8ef1;
        color: #ffffff;
    }

    /* Treeview submenu */
    .nav-treeview {
        padding-left: 20px;
        background-color: #2b2b3d;
        border-left: 3px solid #00ff15;
    }
    .nav-treeview .nav-link {
        font-size: 15px;
        padding-left: 30px;
    }

    /* Hover Animation */
    .sidebar .nav-link i {
        transition: transform 0.3s ease;
    }
    .sidebar .nav-link:hover i {
        transform: scale(1.1); /* Slight zoom on icon hover */
    }

    /* Brand Logo in collapsed sidebar */
    .main-sidebar.sidebar-collapse .brand-text {
        display: none; /* Hide brand text when sidebar is collapsed */
    }
    .main-sidebar.sidebar-collapse .brand-icon {
        margin: 0 auto; /* Center the icon */
        font-size: 24px;
    }

    /* Sidebar collapse button */
    .main-sidebar.sidebar-collapse .nav-link {
        padding-left: 20px;
    }

    /* General padding and layout */
    .nav-link {
        font-weight: 600;
    }
    .nav-item > .nav-link {
        border-radius: 8px;
    }
    .nav-item > .nav-link:hover {
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow on hover */
    }
</style>
