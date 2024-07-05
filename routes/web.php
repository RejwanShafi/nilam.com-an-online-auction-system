<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('users');
});

use App\Http\Controllers\UserController;

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');