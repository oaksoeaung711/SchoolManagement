<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacher\StoreTeacherRequest;
use App\Http\Requests\teacher\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers =  Teacher::when(request('SearchTeacher'),function($query){
            $query->whereRaw("name LIKE ?", ["%".request('SearchTeacher')."%"])->orWhereRaw("email LIKE ?", ["%".request('SearchTeacher')."%"]);
        })->paginate(10);
        return view('teachers.index',compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $newSignName = null;
        if($request->hasFile('sign')){
            $sign = $request->file('sign');
            $newSignName = uniqid().'.'.$sign->getClientOriginalExtension();
            Storage::disk('sign')->put("$newSignName",$sign->get());
        }

        Teacher::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "keyword" => explode("@",$request->email)[0],
            "sign" => $newSignName,
        ]);

        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show',compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        if($request->hasFile('sign')){
            if(!empty($teacher->sign)){
                Storage::disk('sign')->delete($teacher->sign);
            }

            $sign = $request->file('sign');
            $newSignName = uniqid().'.'.$sign->getClientOriginalExtension();
            Storage::disk('sign')->put("$newSignName",$sign->get());
            $teacher->sign = $newSignName;
        }

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->keyword = explode("@",$request->email)[0];
        $teacher->save();

        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        Storage::disk('sign')->delete($teacher->sign);
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
