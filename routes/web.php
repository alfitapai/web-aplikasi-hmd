<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/register',function(){
    return view('register');
})->name('daftar');

Route::get('/home',function(){
    return view('page.home');
});


