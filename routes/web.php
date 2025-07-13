<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dua', function () {
    return view('claude');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});