<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\LocalityController;

Route::get('/locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id','[0-9]+')->name('locality.show');


Route::get('/', function () {
    return view('welcome');
});

// Dashboard Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');

Route::middleware('auth')->group(function () {
    Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
    Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');

    Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
        ->where('id', '[0-9]+')->name('artist.edit');
    Route::put('/artist/{id}', [ArtistController::class, 'update'])
        ->where('id', '[0-9]+')->name('artist.update');
    Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
        ->where('id', '[0-9]+')->name('artist.delete');
});

Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id', '[0-9]+')->name('artist.show');

// SHOW
Route::get('/show', [ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')->name('show.show');

// LOCATION
Route::get('/location', [LocationController::class, 'index'])->name('location.index');
Route::get('/location/{id}', [LocationController::class, 'show'])
    ->where('id', '[0-9]+')->name('location.show');

// REPRESENTATION
Route::get('/representation', [RepresentationController::class, 'index'])->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])
    ->where('id', '[0-9]+')->name('representation.show');

// Breeze auth routes (/login, /register, /logout...)
require __DIR__.'/auth.php';
