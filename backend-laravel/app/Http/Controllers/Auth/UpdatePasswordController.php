<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\OtpCode;
use App\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdatePasswordController extends Controller
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
        $validator = Validator::make($request->all(), [
            'email'   => 'required',
            'password' => 'required|confirmed|6',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        User::where('email' , $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'email tidak ditemukan'
            ], 400);
        }

            $user->update([
              'password' => Hash::make($request->password)  
            ]);

            return response()->json([
                'success' => true,
                'message' => 'password berhasil diubah'
            ]);
        
    }
}
