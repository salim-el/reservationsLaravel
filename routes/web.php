<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;




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
Route::get('/price', [PriceController::class, 'index'])->name('price.index');
Route::get('/price/{id}', [PriceController::class, 'show'])
    ->where('id', '[0-9]+')->name('price.show');

Route::get('/locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality.show');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}', [RoleController::class, 'show'])
    ->where('id', '[0-9]+')->name('role.show');


require __DIR__.'/auth.php';
