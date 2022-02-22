<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TwitterController extends Controller
{
    CONST DRIVER_TYPE = 'twitter';

    public function redirect(){
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function callback(Request  $request){
        $tokens = [$request->oauth_token, $request->oauth_verifier ];
//        dd($tokens);
        $twitterUser = Socialite::driver(static::DRIVER_TYPE)->userFromTokenAndSecret($tokens[0], $tokens[1]);
//        $twitterUser = Socialite::driver('twitter')->user();


        dd($twitterUser);
        $eUser = User::where('email', $twitterUser->email)->first(); // laravel로 회원가입을 했을 경우
        $tUser = User::where('twitter_id', $twitterUser->id)->first(); // twitter_id가 있을 경우

        if($eUser){
            if($tUser){
                Auth::login($eUser);
                return redirect('/');
            }else{
                $eUser->update([
                    'twitter_id' => $twitterUser->id,
                    'avatar' => $twitterUser->avatar,
                ]);
                //로그인 처리
                Auth::login($eUser);
                //뷰를 반환, 사용자가 원래 요청했던 페이지로 redirection
                //원래 요청했던 페이지가 없으면 /dashboard로 redirection
                return redirect('/');
            }

        }else{

            $newUser = User::Create([
                'email' => $twitterUser->getEmail(),
                'password' => Hash::make(Str::random(24)), //24자 랜덤 비밀번호를 주세요.
                'name' => $twitterUser->getName(),
                'twitter_id' => $twitterUser->id,
                'avatar' => $twitterUser->avatar,
            ]);
            //로그인 처리
            Auth::login($newUser);

            return redirect(env('LOGIN_PAGE'));
        }
    }
}
