@extends('layouts.main')

@section('content')
<div>
    <div class="my-5">
        <a href="{{ route('teachers.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
    <div class="w-full md:w-1/2 p-5 rounded-lg shadow-lg bg-slate-100">
        <div class="space-y-10">
            <h4 class="">Teacher Information</h4>

            <div class="w-1/2 grid grid-cols-3">
                <p class="font-semibold">Name</p>
                <p>:</p>
                <p>{{ $teacher->name }}</p>
            </div>

            <div class="w-1/2 grid grid-cols-3">
                <p class="font-semibold">Email</p>
                <p>:</p>
                <p>{{ $teacher->email }}</p>
            </div>

            <div class="w-1/2 grid grid-cols-3">
                <p class="font-semibold">Phone</p>
                <p>:</p>
                <p>{{ $teacher->phone }}</p>
            </div>

            <div class="w-1/2 grid grid-cols-3">
                <p class="font-semibold">Keyword</p>
                <p>:</p>
                <p>{{ $teacher->keyword }}</p>
            </div>

            <div class="w-1/2 grid grid-cols-3">
                <p class="self-center font-semibold">Sign</p>
                <p class="self-center">:</p>
                <div class="w-20 h-20">
                    <img src="{{ asset("storage/signs/".$teacher->sign) }}" class="w-full" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection