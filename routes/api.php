<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TwitterController;


Route::get('/test',function (){ return 'Hello World';});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');


// socialite google login
Route::get('/login/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/login/google/callback', [GoogleController::class, 'callback']);

// socialite twitter login
Route::get('/login/twitter', [TwitterController::class, 'redirect'])->name('twitter.login');
Route::get('/login/twitter/callback', [TwitterController::class, 'callback']);
