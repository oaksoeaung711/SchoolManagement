<?php

namespace App\Http\Controllers;

use App\Http\Requests\subject\StoreSubjectRequest;
use App\Http\Requests\subject\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects =  Subject::when(request('SearchSubject'),function($query){
            $query->whereRaw("name LIKE ?", ["%".request('SearchSubject')."%"]);
        })->paginate(10);
        return view('subjects.index',compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        Subject::create([
            "name" => $request->name,
        ]);

        return redirect()->route('subjects.index');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit',compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update([
            'name' => $request->name
        ]);

        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }
}
