<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-screen">
    <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <header class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                {{ __('Dashboard') }}
            </h2>
        </header>

        <!-- Total Registrations Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-100">Total Registrations</h5>
                <p class="text-2xl font-bold text-indigo-500">{{ $totalRegistrations }}</p>
            </div>
        </div>

        <!-- Welcome Message Card -->
        <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</body>
</html>
