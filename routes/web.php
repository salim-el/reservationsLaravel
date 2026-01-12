<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');

Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('artist.show');


Route::get('/type', [TypeController::class, 'index'])->name('type.index');

Route::get('/type/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('type.show');

require __DIR__.'/auth.php';
