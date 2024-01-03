<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::when(request('SearchUser'),function($query){
            $query->whereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", ["%".request('SearchUser')."%"]);
        })->with('roles')->paginate(10);
        return view('users.index',compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(Request $request,User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $roles = collect($request->roles);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password !== null){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->save();
        if($roles->contains(1) && Auth::user()->roles->contains(1)){ // To promote Global administrator
            if($user->status === 'inactive' || $request->status === 'inactive'){ // target user must active
                return redirect()->route('users.index')->with('message',["color" => "red","icon" => "triangle-exclamation","info" => "Need to be an active user."]);
            }elseif($user->status === 'active' || $request->status === 'active'){
                if($user->roles->contains(2)){
                    $user->roles()->sync(1);
                }elseif(!$user->roles->contains(2)){
                    return redirect()->route('users.index')->with('message',["color" => "red","icon" => "triangle-exclamation","info" => "Need to be an administrator."]);
                }
            }
            return redirect()->route('users.index');
        }elseif($roles->contains(2) && !$user->roles->contains(1) && Auth::user()->roles->contains(1)){ // To promote Administrator target user must not have global administrator role.
            $user->roles()->sync(2);
            return redirect()->route('users.index');
        }elseif(!$user->roles->contains(1) && !$user->roles->contains(2) && !$roles->contains(1) && !$roles->contains(2) && (Auth::user()->roles->contains(1) || Auth::user()->roles->contains(2))){
            $user->roles()->sync($request->roles);
            return redirect()->route('users.index');
        }elseif(empty($request->roles) && (Auth::user()->roles->contains(1) || Auth::user()->roles->contains(2))){
            $user->roles()->sync($request->roles);
            return redirect()->route('users.index');
        }else{
            return redirect()->route('users.index');
        }
    }

    public function destroy(User $user)
    {
        if(Auth::user()->roles->contains(1)){
            if(!empty($user->image)){
                Storage::disk('profile')->deleteDirectory(explode('@',$user->email)[0]);
            }
            $user->delete();
            return redirect()->route('users.index');
        }else{
            return redirect()->route('users.index');
        }
    }
}
