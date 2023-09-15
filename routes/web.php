<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfExtractionController;

Route::view('/', 'auth.login')->name('root');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/acceuil', [HomeController::class, 'index'])->name('home');

    Route::post('/pdf-extraction', [PdfExtractionController::class, 'extract'])->name('pdf-extraction.extract');
});
