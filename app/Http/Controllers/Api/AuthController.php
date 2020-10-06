<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'text|required'
        ]);

        try {

            if(Auth::attempt($credentials))
            {
                $token = Auth::user()->createToken('Token Name')->accessToken;
                return response([
                    'User' => Auth::user(),
                    'Access Token' => $token
                ]);
            }

        } catch (\Exception $exception) {

            return response([
                'message' => $exception->getMessage()
            ]);
        }

    }

    public function register(UserRequest $request)
    {
        try {

            $user = \App\User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            
            $token = $user->createToken('Token Name')->accessToken;

            return response([
                'Registerd User' => $user,
                'Access Token' => $token
            ]);
        } catch (\Exception $exception) {
            
            return response([
                'message' => $exception->getMessage()
            ]);
        }

    }
}
