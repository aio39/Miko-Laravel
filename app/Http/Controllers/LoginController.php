<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{


    protected function setUserSession($user)
    {
        session(
            [
                'id' => $user->id,
                "email" => $user->email,
                "name" => $user->name
            ]
        );
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->setUserSession(Auth::user());
            return  response()->json(Auth::user());
        }

        return  response()->json([],401);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $cookie =  Cookie::forget('isLogin');

        return response()->json(true)->withCookie($cookie);

    }
}
