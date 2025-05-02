<?php

use App\Http\Controllers\LibrarySearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

// Public routes
Route::controller(LibrarySearchController::class)->group(function() {
    Route::get('/', 'index')->name('home');

    // MOVE create route ABOVE {resource}
    Route::get('/resources', 'index')->name('resources.index');

    // Important: Create must be defined first otherwise 'create' will be treated as {resource}
    Route::get('/resources/create', 'create')->name('resources.create');

    Route::get('/resources/{resource}', 'show')->name('resources.show');
});

// Admin-only routes (require authentication)
Route::middleware(['auth'])->controller(LibrarySearchController::class)->group(function() {
    // No need to move inside auth for create if you want form public. Otherwise fine here.
    Route::post('/resources', 'store')->name('resources.store');
    Route::get('/resources/{resource}/edit', 'edit')->name('resources.edit');
    Route::put('/resources/{resource}', 'update')->name('resources.update');
    Route::delete('/resources/{resource}', 'destroy')->name('resources.destroy');
});
