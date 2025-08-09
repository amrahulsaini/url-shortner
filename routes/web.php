<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'create']);

Route::post('/shorten', [UrlController::class, 'store'])->name('shorten.url');

Route::get('/{short_code}', [UrlController::class, 'redirect']);