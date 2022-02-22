<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Socialite;

class GoogleController extends Controller
{

    const DRIVER_TYPE = 'google';

    public function redirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function callback()
    {

        $token = Socialite::driver(static::DRIVER_TYPE)->stateless()->user()->token;
        return redirect(env('LOGIN_PAGE').'?token='.$token);

    }


    public function login(Request $request)
    {
        $token = $request->token;

        $oauthUser = Socialite::driver(static::DRIVER_TYPE)->userFromToken($token);


        $isUser = User::where('email', $oauthUser->email)->first(); // laravel에서 같은 이메일로 로그인 했을 경우
        $isLoggedByGoogleUser = User::where('google_id', $oauthUser->id)->first(); // google_id가 있을 경우

        if ($isUser) {
            if ($isLoggedByGoogleUser) {
                Auth::login($isUser);
            } else {

                $isUser->update([
                    'google_id' => $oauthUser->id,
                    'avatar' => $oauthUser->avatar,
                ]);
                Auth::login($isUser);
            }
        } else {
            // $googleUser에서 avatar도 받아올 수 있다.
            $isUser = User::Create([
                'name' => $oauthUser->getName(),
                'email' => $oauthUser->getEmail(),
                'password' => Hash::make(Str::random(24)), //24자 랜덤 비밀번호를 주세요.
                'avatar' => $oauthUser->avatar,
                'google_id' => $oauthUser->id,
            ]);
            //로그인 처리
            Auth::login($isUser);
        }

        $cookie = cookie('isLogin', true, 3000,'/','localhost',null,false);

        return response()->json($isUser)->withCookie($cookie);
    }
}
