<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShowController;

// tes routes
Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])->where('id', '[0-9]+')->name('type.show');

Route::get('/price', [PriceController::class, 'index'])->name('price.index');
Route::get('/price/{id}', [PriceController::class, 'show'])->where('id', '[0-9]+')->name('price.show');

Route::get('/locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('/locality/{postal_code}', [LocalityController::class, 'show'])->where('postal_code', '[0-9]+')->name('locality.show');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}', [RoleController::class, 'show'])->where('id', '[0-9]+')->name('role.show');

Route::get('/location', [LocationController::class, 'index'])
        ->name('location.index');

Route::get('/location/{id}', [LocationController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('location.show');

Route::get('/show', [ShowController::class, 'index'])
        ->name('show.index');

Route::get('/show/{id}', [ShowController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('show.show');
