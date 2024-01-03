<?php

namespace App\Http\Controllers;

use App\Http\Requests\classroom\StoreClassroomRequest;
use App\Http\Requests\classroom\UpdateClassroomRequest;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms =  Classroom::when(request('SearchClassroom'),function($query){
            $query->whereRaw("name LIKE ?", ["%".request('SearchClassroom')."%"]);
        })->paginate(10);
        return view('classrooms.index',compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(StoreClassroomRequest $request)
    {
        Classroom::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('classrooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit',compact('classroom'));
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update([
            'name' => $request->name
        ]);

        return redirect()->route('classrooms.index');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index');
    }
}
