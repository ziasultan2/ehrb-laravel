<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string',
            'blood_group' => 'required',
            'district_id' => 'required',
            'thana_id' => 'required',
            'password' => 'required|string'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => 'user',
            'blood_group' => $request->blood_group,
            'blood_status' => 0,
            'district_id' => $request->district_id,
            'thana_id' => $request->thana_id,
            'password' => bcrypt($request->password),
            'api_token' => Str::random(20),
        ]);
        $user->save();
        return response()->json([
            'success' => 'true'
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'success' => 'false'
            ], 401);

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json([
            'access_token' => $accessToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'success' => 'true'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
