<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/{name}', [CountryController::class, 'show'])->name('countries.show');

Route::get('/about', function () {
    return view('about'); 
});

Route::fallback(function () {
    return view('errors.404');
});
