<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TwitterController;
use App\Models\User;
use Illuminate\Support\Str;

Route::get('/test',function (){ return 'Hello World';});
Route::get('/health-check',function (){ return 'ok';});


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

Route::apiResource('/orders',\App\Http\Controllers\OrderController::class);
Route::apiResource('/order_products',\App\Http\Controllers\OrderProductController::class);
Route::apiResource('/carts',\App\Http\Controllers\CartController::class);
Route::apiResource('/cart_products',\App\Http\Controllers\CartProductController::class);

Route::apiResource('/recordings',\App\Http\Controllers\RecordingController::class);


Route::prefix('/data')->group(function (){
    Route::get('caspt',[\App\Http\Controllers\DataController::class,'concertAddedScorePerTime']);
    Route::get('ctacpt',[\App\Http\Controllers\DataController::class,'coTiAddedChatPerTime']);
    Route::get('ctadpt',[\App\Http\Controllers\DataController::class,'coTiAmountDonePerTime']);
    Route::get('ctascpt',[\App\Http\Controllers\DataController::class,'coTiAmountSuperChatPerTime']);
    Route::get('ctceun',[\App\Http\Controllers\DataController::class,'coTiCurEnterUserNum']);
});

Route::prefix('/users')->group(function(){
    Route::get('coin',[\App\Http\Controllers\UserController::class,'getCoin']);
});
Route::apiResource('/users',\App\Http\Controllers\UserController::class);

