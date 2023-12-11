<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    
    public function register(RegisterRequest $request)
    {
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            "phone" => $request->phone,
            "password" => Hash::make($request->password),
            "slug" => Str::slug($request->firstname),
        ]);

        return redirect()->route('login.index')->with('message',["color" => "green","icon" => "circle-check","info" => "Successfully registered. Please Login."]);;
    }
}
