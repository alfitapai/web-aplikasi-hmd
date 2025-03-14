<?php

use App\Http\Controllers\jq\PenjualanController;
use App\Http\Controllers\jq\ShiftController;
use App\Http\Controllers\jq\StokController;
use App\Http\Controllers\regisdanloginController;
use App\Models\Shift;
use App\Models\User;
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
    $shift = Shift::all();
    $pengawas = User::where('role','Pengawas')->get();
    return view('page.penjualan.penjualan',['pengawas'=>$pengawas,'shift'=>$shift]);
})->name('lamanpenjualan');

Route::get('/user/setting', function () {
    return view('page.settings.pengaturan');
})->name('setting');

Route::get('/stok', function () {
    return view('page.stok.stokitem');
})->name('stok');

Route::get('/debug-log', function () {
    Log::error('Manual log test!');
    return 'Check the log file!';
});

Route::post('/masuk', [regisdanloginController::class, 'proslogin'])->name('proslogin');
Route::post('/regis', [regisdanloginController::class, 'prosdaftar'])->name('prosdaftar');
Route::get('/logout', [regisdanloginController::class, 'proslogout'])->name('proslogout');

Route::resource('/shiftList', ShiftController::class);
Route::resource('/penjualanList', PenjualanController::class);
Route::resource('/stokList', StokController::class);
