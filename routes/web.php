<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SponsorController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::get('/upcoming-events', [EventController::class, 'upcoming'])->name('upcoming.events');
    Route::get('/event-ticket-price/{event_id}', [EventController::class, 'getTicketPrice'])->name('event.ticket.price');

    // Route::get('/events/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
    // Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');


    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // Show profile details
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');  // Edit profile form
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  // Delete profile
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    // Route for updating the profile
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/register-events', [RegistrationController::class, 'create'])->name('register');
    Route::post('/register-store', [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/register-events', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::get('/verify-email/{id}', [RegistrationController::class, 'verifyEmail'])->name('verify.email');
    
    
    // Display the settings form
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    
    // Handle the update of settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    //Route::put('/settings/{setting}', [SettingsController::class, 'update'])->name('settings.update');
    Route::put('/settings/update-all', [SettingsController::class, 'updateAll'])->name('settings.updateAll');

    Route::resource('sponsors', SponsorController::class);

});

require __DIR__ . '/auth.php';
