<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingsController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // Show profile details
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');  // Edit profile form
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  // Delete profile
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/register-events', [RegistrationController::class, 'create'])->name('register');
    Route::post('/register-store', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/register-events', [RegistrationController::class, 'create'])->name('registrations.create');

    // Example routes for profile, settings, and logout
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    // Display the settings form
    // Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    // Handle the update of settings
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    
    


});

require __DIR__ . '/auth.php';
