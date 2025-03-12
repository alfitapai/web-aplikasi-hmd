<?php

use App\Http\Controllers\regisdanloginController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('daftar');

Route::get('/home', function () {
    return view('page.home');
});

Route::get('/debug-log', function () {
    Log::error('Manual log test!');
    return 'Check the log file!';
});

Route::post('/masuk', [regisdanloginController::class, 'proslogin'])->name('proslogin');
Route::post('/regis', [regisdanloginController::class, 'prosdaftar'])->name('prosdaftar');
Route::get('/logout', [regisdanloginController::class, 'proslogout'])->name('proslogout');
