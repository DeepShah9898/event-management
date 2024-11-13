<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-500 to-white-600 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg text-center">
        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4">
            Welcome to the Event Management System
        </h1>
        
        <!-- Subtitle -->
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">
            Your one-stop solution for organizing and managing events seamlessly.
        </p>

        <!-- Buttons -->
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-300">
                Log In
            </a>
            <a href="{{ route('register') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-2 rounded-lg transition duration-300">
                Register
            </a>
        </div>

        <!-- Additional Info -->
        <div class="mt-8 text-gray-500 dark:text-gray-400">
            <p>Manage events, attendees, and more with ease.</p>
            <p>Already have an account? Log in to access your dashboard.</p>
        </div>
    </div>
</body>
</html>
