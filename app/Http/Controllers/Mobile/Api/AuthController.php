<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Auth\LoginRequest;
use App\Http\Requests\Mobile\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{


    public function register(RegisterRequest $request)
    {

        $user = User::create($request->validated());

        $token = Auth::guard('api_user')->login($user);

        return Response::success(
            'admin login success',
            [
                'token' => $token,
                'admin' => new UserResource($user),
            ]
        );
    }

    public function login(LoginRequest $request)
    {
        $token = Auth::guard('api_user')->attempt($request->validated());

        if (!$token) {
            return response()->json([
                'message' => 'wrong credentials',
            ], 401);
        }

        $user = Auth::guard('api_user')->user();

        return response()->success(
            'admin login success',
            [
                'token' => $token,
                'admin' => new UserResource($user),
            ]
        );
    }

    public function logout()
    {
        Auth::guard('api_user')->logout();
        return response()->success(
            'Successfully logged out',
        );
    }

}

