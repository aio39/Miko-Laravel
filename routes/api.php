<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TwitterController;
use App\Models\User;

Route::get('/test',function (){ return 'Hello World';});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);


// socialite google login
Route::get('/login/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/login/google/callback', [GoogleController::class, 'callback']);
Route::post('/login/google/login', [GoogleController::class, 'login']);

// socialite twitter login
Route::get('/login/twitter', [TwitterController::class, 'redirect'])->name('twitter.login');
Route::get('/login/twitter/callback', [TwitterController::class, 'callback']);


Route::apiResource('/concerts', \App\Http\Controllers\ConcertController::class);
Route::apiResource('/tickets', \App\Http\Controllers\TicketController::class);
Route::apiResource('/user_tickets', \App\Http\Controllers\UserTicketController::class);

Route::apiResource('/chats', \App\Http\Controllers\ChatController::class);
Route::apiResource('/coin_histories',\App\Http\Controllers\CoinHistoryController::class);
Route::apiResource('/products',\App\Http\Controllers\ProductController::class);


Route::post('/users',function(Request $request){
    $data = $request->all();
    $data['password'] = \Hash::make($request->password);
    $user = User::create($data);

    return $user
        ? response()->json($user,201)
        : response()->json([],500);
});


Route::get('/users',function(Request $request){
    return  Auth::check() ? response()->json(Auth::user()) : response()->json('please login',404);
});
