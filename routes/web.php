<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimeController;
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

    Route::get('classrooms',[ClassroomController::class,'index'])->name('classrooms.index');
    Route::get('classrooms/create',[ClassroomController::class,'create'])->name('classrooms.create')->middleware('timetable.manage');
    Route::post('classrooms',[ClassroomController::class,'store'])->name('classrooms.store')->middleware('timetable.manage');
    Route::get('classrooms/{classroom}/edit',[ClassroomController::class,'edit'])->name('classrooms.edit')->middleware('timetable.manage');
    Route::put('classrooms/{classroom}',[ClassroomController::class,'update'])->name('classrooms.update')->middleware('timetable.manage');
    Route::delete('classrooms/{classroom}',[ClassroomController::class,'destroy'])->name('classrooms.destroy')->middleware('timetable.manage');

    Route::get('subjects',[SubjectController::class,'index'])->name('subjects.index');
    Route::get('subjects/create',[SubjectController::class,'create'])->name('subjects.create')->middleware('timetable.manage');
    Route::post('subjects',[SubjectController::class,'store'])->name('subjects.store')->middleware('timetable.manage');
    Route::get('subjects/{subject}/edit',[SubjectController::class,'edit'])->name('subjects.edit')->middleware('timetable.manage');
    Route::put('subjects/{subject}',[SubjectController::class,'update'])->name('subjects.update')->middleware('timetable.manage');
    Route::delete('subjects/{subject}',[SubjectController::class,'destroy'])->name('subjects.destroy')->middleware('timetable.manage');

    Route::get('teachers',[TeacherController::class,'index'])->name('teachers.index');
    Route::get('teachers/{teacher}',[TeacherController::class,'show'])->name('teachers.show');
    Route::get('teachers/create',[TeacherController::class,'create'])->name('teachers.create')->middleware('timetable.manage');
    Route::post('teachers',[TeacherController::class,'store'])->name('teachers.store')->middleware('timetable.manage');
    Route::get('teachers/{teacher}/edit',[TeacherController::class,'edit'])->name('teachers.edit')->middleware('timetable.manage');
    Route::put('teachers/{teacher}',[TeacherController::class,'update'])->name('teachers.update')->middleware('timetable.manage');
    Route::delete('teachers/{teacher}',[TeacherController::class,'destroy'])->name('teachers.destroy')->middleware('timetable.manage');

    Route::get('times',[TimeController::class,'index'])->name('times.index');
    Route::get('/times/create',[TimeController::class,'create'])->name('times.create')->middleware('timetable.manage');
    Route::post('times',[TimeController::class,'store'])->name('times.store')->middleware('timetable.manage');
    Route::get('times/{time}/edit',[TimeController::class,'edit'])->name('times.edit')->middleware('timetable.manage');
    Route::put('times/{time}',[TimeController::class,'update'])->name('times.update')->middleware('timetable.manage');
    Route::delete('times/{time}',[TimeController::class,'destroy'])->name('times.destroy')->middleware('timetable.manage');

    Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
    Route::get('profile/password/edit',[ProfileController::class,'passwordEdit'])->name('profile.password.edit');
    Route::put('profile/password/update',[ProfileController::class,'passwordUpdate'])->name('profile.password.update');
    Route::get('profile/image/edit',[ProfileController::class,'imageEdit'])->name("profile.image.edit");
    Route::put('profile/image/update',[ProfileController::class,'imageUpdate'])->name("profile.image.update");
    
    Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
    Route::put('/roles/{role}',[RoleController::class,'update'])->name('roles.update');
    
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit')->middleware('prevent.user.update');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update')->middleware('prevent.user.update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');

    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
