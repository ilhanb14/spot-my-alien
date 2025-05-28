<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Models\Sighting;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/waarnemingen', function () {
    try {
        $sightings = Sighting::orderBy('id', 'desc')->take(5)->get();

        return view('sightings', ['sightings' => $sightings]);
        
    } catch (\Exception $e) {
        abort(500, 'Fout: ' . $e->getMessage());
    }
})->name('sightings');

Route::get('/over-ons', function () {
    return view('about');
})->name('about');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Payment Routes
    Route::get('/doneer', [PaymentController::class, 'showDonationForm']);
    Route::post('/doneer', [PaymentController::class, 'process']);
    
});
// Registration Routes
Route::get('/registreer', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registreer', [AuthController::class, 'register']);

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/loguit', [AuthController::class, 'logout']);
