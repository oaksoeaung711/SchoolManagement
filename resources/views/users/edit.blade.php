@extends('layouts.main')

@section('content')
<div class="max-w-6xl shadow-lg shadow-slate-300 rounded-xl p-5 flex flex-col gap-y-5 md:flex-row md:gap-y-0">
    <div class="w-full md:w-1/2">
        <div class="w-44 h-44 rounded-full overflow-hidden mx-auto mt-5">
            @if($user->image === null)
                <img src="{{ asset('asset/imgs/icons/profile.png') }}" class="w-44 h-44 rounded-full" />
            @else
                <img src="{{ asset("storage/".$user->image) }}" class="w-44 h-44 rounded-full" />
            @endif
        </div>
    </div>
    <div class="w-full md:w-1/2">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $user->id }}" />
            <div class="flex justify-normal gap-4 md:justify-between md:gap-0">
                <x-input type="text" name="firstname" icon="user" label="First name" value="{{ $user->firstname }}" />
                <x-input type="text" name="lastname" icon="user" label="Last name" value="{{ $user->lastname }}" />
            </div>
            <x-input type="text" name="email" icon="envelope" label="Email address" value="{{ $user->email }}" />
    
            <x-input type="password" name="password" icon="key" label="Password" />
    
            <x-input type="phone" name="phone" icon="phone" label="Phone number" value="{{ $user->phone }}" />
    
            <div class="flex gap-4 mb-10">
                <div class="flex items-center">
                    <input id="active" type="radio" name="status" value="active" class="w-4 h-4 border-gray-300 accent-slate-700" @if($user->status === "active") checked @endif>
                    <label for="active" class="block ms-2 text-sm font-medium text-gray-500">
                        Active
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="inactive" type="radio" name="status" value="inactive" class="w-4 h-4 border-gray-300 accent-slate-700" @if($user->status === "inactive") checked @endif>
                    <label for="inactive" class="block ms-2 text-sm font-medium text-gray-500">
                        Inactive
                    </label>
                </div>
            </div>
    
            <div class="grid grid-cols-3 gap-4 mb-10">
                @if(Auth::user()->roles->contains(1))
                    @foreach($roles as $role)
                        @if($user->roles->contains(2))
                            @if($role->id === 1 || $role->id === 2)
                                <div class="flex items-center">
                                    <input id="{{ $role->slug }}" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? "checked" : "" }} type="checkbox" class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 rounded accent-slate-700">
                                    <label for="{{ $role->slug }}" class="ms-2 text-sm font-medium text-gray-500">{{ $role->name }}</label>
                                </div>
                            @endif
                        @elseif(!$user->roles->contains(1) || !$user->roles->contains(2))
                            @if($role->id !== 1)
                                <div class="flex items-center">
                                    <input id="{{ $role->slug }}" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? "checked" : "" }} type="checkbox" class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 rounded accent-slate-700">
                                    <label for="{{ $role->slug }}" class="ms-2 text-sm font-medium text-gray-500">{{ $role->name }}</label>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @elseif(Auth::user()->roles->contains(2))
                    @foreach ($roles as $role)
                        @if(!$user->roles->contains(1) || !$user->roles->contains(2))
                            @if($role->id !== 1 && $role->id !== 2)
                                <div class="flex items-center">
                                    <input id="{{ $role->slug }}" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? "checked" : "" }} type="checkbox" class="w-4 h-4 text-slate-600 bg-gray-100 border-gray-300 rounded accent-slate-700">
                                    <label for="{{ $role->slug }}" class="ms-2 text-sm font-medium text-gray-500">{{ $role->name }}</label>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endif
            </div>
            
            <div class="flex gap-4">
                <a href="{{ route('users.index') }}" class="btn-outline-dark">Cancle</a>
                <button class="btn-dark">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection