<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        if (Auth::guard("sekolah")->attempt(["npsn" => $request->username, "password" => $request->password])) {

            $sekolah = auth("sekolah")->user();
            $token = $sekolah->createToken("api_token")->plainTextToken;

            return new LoginResource(["token" => $token]);
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
