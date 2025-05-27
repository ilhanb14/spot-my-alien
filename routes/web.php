<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/waarnemingen', function () {
    try {
        $json = Storage::disk('public')->get('sightings.json');
        
        if (!$json) abort(404, 'Bestand niet gevonden');
        $sightings = json_decode($json, true);

        return view('sightings', ['sightings' => $sightings]);
        
    } catch (\Exception $e) {
        abort(500, 'Fout: ' . $e->getMessage());
    }
})->name('sightings');

Route::get('/over-ons', function () {
    return view('about');
})->name('about');

// Authentication routes
require __DIR__.'/auth.php';

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware('verified')
        ->name('dashboard');

    Route::prefix('settings')->group(function () {
        Route::redirect('', 'settings/profile');
        Route::get('profile', Profile::class)->name('settings.profile');
        Route::get('password', Password::class)->name('settings.password');
        Route::get('appearance', Appearance::class)->name('settings.appearance');
    });
});