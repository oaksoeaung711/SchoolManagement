<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('/');
        }else{
            return redirect()->route('login.index')->with('message',["color" => "red","icon" => "triangle-exclamation","info" => "Incorrect email or password."]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
