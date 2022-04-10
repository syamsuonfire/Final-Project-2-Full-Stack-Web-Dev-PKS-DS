<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\OtpCode;
use App\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $allRequest = $request->all();

        //set validation
        $validator = Validator::make($allRequest, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password tidak ditemukan'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'User berhasil login',
            'data' => [
                'user' => auth()->user(),
                'token' => $token
            ]
        ], 401);
    }
}
