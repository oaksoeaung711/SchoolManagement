<?php

namespace App\Http\Controllers;

use App\Http\Requests\time\StoreTimeRequest;
use App\Http\Requests\time\UpdateTimeRequest;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times =  Time::paginate(10);
        return view('times.index',compact('times'));
    }

    public function create()
    {
        return view('times.create');
    }

    public function store(StoreTimeRequest $request)
    {
        Time::create([
            'from' => $request->from,
            'to' => $request->to,
        ]);
        return redirect()->route('times.index');
    }

    public function edit(Time $time)
    {
        return view('times.edit',compact('time'));
    }

    public function update(UpdateTimeRequest $request, Time $time)
    {
        $time->update([
            "from" => $request->from,
            "to" => $request->to,
        ]);

        return redirect()->route('times.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time)
    {
        $time->delete();
        return redirect()->route('times.index');
    }
}
