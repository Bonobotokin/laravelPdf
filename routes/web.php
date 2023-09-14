<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfExtractionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'loginStart'])->name('auth.login');

Route::post('/login', [AuthController::class, 'loginStart']);
Route::get('/acceuil', [HomeController::class, 'index'])->name('home');

// Route::get('/pdf-extraction', 'PdfExtractionController@index')->name('pdf-extraction.index');
Route::post('/pdf-extraction', [PdfExtractionController::class, 'extract'])->name('pdf-extraction.extract');
