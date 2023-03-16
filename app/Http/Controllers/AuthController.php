<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //TRY #1
        // $credentials = $request->only('email', 'password');
        // if (auth()->attempt($credentials)) {
        //     $user = User::where('email', $request->email)->first();
        //     $token = $user->createToken('authToken')->accessToken;
        //     return response()->json(['token' => $token], 200);
        // } else {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }




        //TRY #2
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     $user = User::where('email', $request->email)->first();
        //     $request->session()->put('user', $user);

        //     return response()->json([
        //         'session' => $request->session()->getId()
        //     ]);
        // }

        // return response()->json([
        //     'message' => 'Las credenciales son incorrectas.'
        // ], 401);






        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['user_id' => $user->id]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        // TRY #2
        // Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return response()->json([
        //     'message' => 'Has cerrado sesión exitosamente.'
        // ]);



        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
}