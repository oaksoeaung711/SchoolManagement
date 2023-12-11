<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    public function update(Request $request,Role $role)
    {
        if(Auth::user()->roles->contains(1)){
            if($role->name !== "Global Administrator" && $role->name !== "Administrator"){
                $roleSlug = $role->slug;
                if(empty($request->$roleSlug)){
                    $role->status = "off";
                    $role->save();
                }else{
                    $role->status = "on";
                    $role->save();
                }
            }
            return redirect()->route('roles.index');
        }else{
            return redirect()->route('roles.index');
        }
    }
}
