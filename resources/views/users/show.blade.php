@extends('layouts.main')

@section('content')
<div class="my-2">
    <a href="{{ route('users.index') }}" class="font-bold"><i class="fa-solid fa-chevron-left"></i> Back</a>
</div>
<div class="max-w-5xl bg-white bg-no-repeat shadow-lg shadow-slate-300 bg-right-bottom rounded-xl overflow-hidden">
    <div class="flex flex-col md:flex-row p-5 gap-y-10 md:gap-0">
        <div class="w-full md:w-1/2 flex flex-col items-center">
            <div class="overflow-hidden" >
                @if($user->image === null)
                    <img src="{{ asset('asset/imgs/icons/profile.png') }}" class="w-44 h-44 rounded-full" />
                @else
                    <img src="{{ asset('storage/'.$user->image) }}" class="w-44 h-44 rounded-full" />
                @endif
            </div>
            <div class="mt-5">
                <h5>{{ $user->firstname }} {{ $user->lastname }}</h5>
            </div>
        </div>
        <div class="w-full md:w-1/2 space-y-7">
            <div>
                <p class="font-bold">Email</p>
                <p class="text-sm">{{ $user->email }}</p>
            </div>
            <div>
                <p class="font-bold">Phone</p>
                <p class="text-sm">{{ $user->phone }}</p>
            </div>
            <div>
                <p class="font-bold">Join Date</p>
                <p class="text-sm">{{ $user->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <p class="font-bold">Status</p>
                <p class="mt-1">
                    <span @class([
                        "text-xs font-medium px-2.5 py-0.5 rounded",
                        "bg-green-100 text-green-800" => $user->status === "active",
                        "bg-gray-100 text-gray-800" => $user->status === "inactive",
                    ])>
                        {{ $user->status }}
                    </span>
                </p>
            </div>
            <div>
                <p class="font-bold">Role</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-1">
                    @foreach ($user->roles as $role)
                        <p class="">
                            <x-badge name="{{ $role->name }}" />
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection