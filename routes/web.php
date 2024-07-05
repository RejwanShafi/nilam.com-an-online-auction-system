<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/redirect', 'GoogleAuthController@redirect')->name('google.redirect');
Route::get('/callback/google', 'GoogleAuthController@callbackGoogle')->name('google.callback');
