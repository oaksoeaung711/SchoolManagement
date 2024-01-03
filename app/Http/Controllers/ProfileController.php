<?php

namespace App\Http\Controllers;

use App\Http\Requests\profile\UpdateProfileImageRequest;
use App\Http\Requests\profile\UpdateProfilePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function passwordEdit()
    {
        return view('profile.passwordedit');
    }

    public function passwordUpdate(UpdateProfilePasswordRequest $request)
    {
        $oldPassword = $request->old_password;
        if(Hash::check($oldPassword,Auth::user()->password)){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
        }else{
            return redirect()->route('profile.password.edit')->with('message',["color" => "red","icon" => "triangle-exclamation","info" => "Incorrect old password."]);
        }

        return redirect()->route('profile.index')->with('message',["color" => "green","icon" => "circle-check","info" => "Password updated successfully."]);
    }

    public function imageEdit()
    {
        return view('profile.imageedit');
    }

    public function imageUpdate(UpdateProfileImageRequest $request)
    {
        if($request->hasFile('image')){
            if(!empty(Auth::user()->image)){
                Storage::disk('profile')->delete(Auth::user()->image);
            }

            $user = User::findOrFail(Auth::user()->id);
            $image = $request->file('image');
            $newImageName = uniqid().'.'.$image->getClientOriginalExtension();
            $imagePath = explode('@',Auth::user()->email)[0]."/".$newImageName;
            Storage::disk('profile')->put("$imagePath",$image->get());
            $user->image = $imagePath;
            $user->save();
            return redirect()->route('profile.index');
        }
    }
}
