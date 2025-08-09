<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController; // <-- IMPORTANT: Import your controller

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route #1: When a user visits the homepage ('/'), show the form.
// This calls the 'create' method in your UrlController.
Route::get('/', [UrlController::class, 'create']);

// Route #2: When the form is submitted to '/shorten', process it.
// This calls the 'store' method in your UrlController.
Route::post('/shorten', [UrlController::class, 'store'])->name('shorten.url');

// Route #3: When a user visits a short URL like '/aB1cD2', redirect them.
// This calls the 'redirect' method in your UrlController.
// This MUST be the last route definition to act as a catch-all.
Route::get('/{short_code}', [UrlController::class, 'redirect']);