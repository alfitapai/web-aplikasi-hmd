<?php

use App\Http\Controllers\jq\ShiftController;
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
})->name('home');


Route::get('/penjualan', function () {
    return view('page.penjualan.penjualan');
})->name('lamanpenjualan');

Route::get('/user/setting', function () {
    return view('page.settings.pengaturan');
})->name('setting');

Route::get('/debug-log', function () {
    Log::error('Manual log test!');
    return 'Check the log file!';
});

Route::post('/masuk', [regisdanloginController::class, 'proslogin'])->name('proslogin');
Route::post('/regis', [regisdanloginController::class, 'prosdaftar'])->name('prosdaftar');
Route::get('/logout', [regisdanloginController::class, 'proslogout'])->name('proslogout');

Route::resource('/shiftList', ShiftController::class);
