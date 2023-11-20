<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard("admin")->attempt(["username" => $request->username, "password" => $request->password])) {

            $admin = auth("admin")->user();
            $token = $admin->createToken("api_token")->plainTextToken;

            return response()->json(["token" => $token]);
        }

        if (Auth::guard("sekolah")->attempt(["npsn" => $request->username, "password" => $request->password])) {

            $sekolah = auth("sekolah")->user();
            $token = $sekolah->createToken("api_token")->plainTextToken;

            return response()->json(["token" => $token]);
        }

        throw new HttpResponseException(response()->json([
            "error" => [
                "message" => "Username atau password Salah"
            ]
        ], 401));
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Token Berhasil Dihapus']);
    }
}
