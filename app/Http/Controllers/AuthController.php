<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //membuat login token menggunakan sanctum
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $cridential = [
            'email'     => $username,
            'password'  => $password
        ];

        if(Auth::attempt($cridential)){
            $user = Auth::user();
            $ability  = ['create', 'read', 'update', 'delete'];    
            return response()->json([
                'status' => true,
                'user' => $user,
                'token' => $user->createToken("api-token", $ability)->plainTextToken,
                'abilities' => $ability
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Login failed"
            ]);
        }
    }
}
