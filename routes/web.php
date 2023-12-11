<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('prevent.back.login.and.register')->group(function(){
    Route::get('/login',[AuthController::class,'index'])->name('login.index');
    Route::post('/login',[AuthController::class,'login'])->name('login');

    Route::get('/register',[RegisterController::class,'index'])->name('register.index');
    Route::post('/register',[RegisterController::class,'register'])->name('register');
});


Route::middleware('auth','check.user.status')->group(function(){
    Route::get('/',function(){
        return view('home');
    })->name('home');

    Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
    Route::get('profile/password/edit',[ProfileController::class,'passwordEdit'])->name('profile.password.edit');
    Route::put('profile/password/update',[ProfileController::class,'passwordUpdate'])->name('profile.password.update');
    Route::get('profile/image/edit',[ProfileController::class,'imageEdit'])->name("profile.image.edit");
    Route::put('profile/image/update',[ProfileController::class,'imageUpdate'])->name("profile.image.update");

    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit')->middleware('prevent.user.update');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update')->middleware('prevent.user.update');
    

    Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
    Route::put('/roles/{role}',[RoleController::class,'update'])->name('roles.update');

    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
