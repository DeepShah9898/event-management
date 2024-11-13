<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System - Register</title>
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
                
                <!-- Form Title -->
                <h2 class="text-lg font-semibold text-center text-gray-800 mb-4">
                    Create an Account
                </h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-sm" />
                    </div>

                    <!-- Register Button & Login Link -->
                    <div class="flex items-center justify-between">
                        <a class="underline text-sm text-gray-500 hover:text-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition duration-300">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
