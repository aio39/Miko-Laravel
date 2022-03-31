<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return Auth::check() ? response()->json(Auth::user()) : response()->json('please login', 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = \Hash::make($request->password);
        $data['uuid'] = Str::orderedUuid();
        $user = User::create($data);

        return $user
            ? response()->json($data, 201)
            : response()->json([], 500);

    }

    public function getCoin(Request $request)
    {
        return Auth::check() ?  response()->json(["data"=>Auth::user()->coin]) : response()->json('please login', 404);
    }
}
