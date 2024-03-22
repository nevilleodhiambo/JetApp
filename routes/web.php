<?php

use App\Http\Controllers\PDFController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/emailpdf', [PDFController::class, 'index']);
});

Route::get('/profile', function () {
    // ...
})->middleware(UserAccess::class);
