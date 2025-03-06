<?php

use App\Http\Controllers\regisdanloginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register',function(){
    return view('register');
})->name('daftar');

Route::get('/home',function(){
    return view('page.home');
});


Route::post('/masuk',[regisdanloginController::class,'proslogin'])->name('proslogin');
Route::post('/register',[regisdanloginController::class,'prosdaftar'])->name('prosdaftar');
Route::get('/logout',[regisdanloginController::class,'proslogout'])->name('proslogout');


