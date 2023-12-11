@extends('layouts.main')

@section('content')
<div class="my-2">
    <a href="{{ URL::previous() }}" class="font-bold"><i class="fa-solid fa-chevron-left"></i> Back</a>
</div>
<div class="absolute right-2 top-20 z-20">
    <x-alert/>
</div>
<div class="max-w-5xl bg-white shadow-lg shadow-slate-300 rounded-xl overflow-hidden">
    <div class="flex flex-col md:items-center md:flex-row px-5 py-10 gap-y-10 md:gap-0">
        <div class="w-full md:w-1/2">
            <div class="mx-auto rounded-full overflow-hidden flex justify-center">
                @if(Auth::user()->image === null)
                    <img src="{{ asset('asset/imgs/icons/profile.png') }}" class="w-44 h-44 rounded-full" />
                @else
                    <img src="{{ asset("storage/".Auth::user()->image) }}" class="w-44 h-44 rounded-full" />
                @endif
            </div>
            <div class="mt-5 text-center">
                <h5>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
            </div>
            <div class="mt-10 flex gap-3 px-10">
                <a href="{{ route('profile.image.edit') }}" class="btn-outline-dark gap-2"><i class="fa-solid fa-cloud-arrow-up"></i>Upload Photo</a>
                <a href="{{ route('profile.password.edit') }}" class="btn-outline-dark gap-2"><i class="fa-solid fa-pen-to-square"></i>Change Password</a>
            </div>
        </div>
        <div class="w-full md:w-1/2 space-y-7">
            <div>
                <p class="font-bold">Email</p>
                <p class="text-sm">{{ Auth::user()->email }}</p>
            </div>
            <div>
                <p class="font-bold">Phone</p>
                <p class="text-sm">{{ Auth::user()->phone }}</p>
            </div>
            <div>
                <p class="font-bold">Join Date</p>
                <p class="text-sm">{{ Auth::user()->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <p class="font-bold">Status</p>
                <p class="mt-1">
                    <x-badge name="{{ Auth::user()->status }}" />
                </p>
            </div>
            <div>
                <p class="font-bold">Role</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-1">
                    @foreach (Auth::user()->roles as $role)
                        <p>
                            <x-badge name="{{ $role->name }}" />
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection