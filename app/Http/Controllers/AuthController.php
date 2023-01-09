<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateInfoRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 1,
        ]);

        return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            return response([
               'error' => 'Invalid Credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $jwt = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $jwt, 60 * 24);

        return response([
           'jwt' => $jwt
        ])->withCookie($cookie);
    }

    public function user(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function updateInfo(UserUpdateInfoRequest $request): \Illuminate\Http\Response
    {
        $user = $request->user();
        $user->update($request->only('first_name', 'last_name', 'email'));
        return \response($user, Response::HTTP_ACCEPTED);
    }

    public function updatePassword(UserUpdatePasswordRequest $request): \Illuminate\Http\Response
    {
        $user = $request->user();
        $user->update([
            'password' => Hash::make($request->input('password'),)
        ]);
        return \response($user, Response::HTTP_ACCEPTED);
    }

    public function logout(){
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }
}
