<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System - Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-500 to-white-700 h-screen flex items-center justify-center">
    <div class="w-full max-w-sm">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-4 sm:p-6">
                <!-- Title -->
                <h1 class="text-2xl font-semibold text-center text-gray-700 mb-4">
                    Event Management System
                </h1>

                <!-- Instructions -->
                <p class="text-sm text-gray-600 text-center mb-4">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition duration-300">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
