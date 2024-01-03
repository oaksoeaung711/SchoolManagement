@extends('layouts.main')

@section('content')
<div>
    <form action="{{ route('times.update',$time->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-1/2 mx-auto mt-10 p-10 shadow-lg rounded-lg bg-slate-100 space-y-10">
            <h4>Edit Time</h4>
            <div class="">
                <x-input type="time" name="from" icon="clock" label="From" value="{{ $time->from }}" />
                <x-input type="time" name="to" icon="clock" label="To" value="{{ $time->to }}" />
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('times.index') }}" class="btn-red">Cancle</a>
                <button class="btn-dark">Edit</button>
            </div>
        </div>
    </form>
</div>
@endsection