@extends('layouts.main')

@section('content')
<div class="max-w-6xl bg-white bg-no-repeat shadow-lg shadow-slate-300 bg-right-bottom rounded-xl overflow-hidden" style="background-image: url('{{ asset("asset/imgs/background/music.svg") }}'); background-size: 35% auto;">
    <div class="w-full md:w-1/2 p-10">
        <h3 class="my-5">Change Password</h3>
        <x-alert/>
        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <x-input type="password" name="old_password" icon="key" label="Old Password" />
            <x-input type="password" name="new_password" icon="key" label="New Password" />
            <x-input type="password" name="confirm_password" icon="key" label="Confirm Password" />
            <div class="flex gap-2">
                <a href="{{ route('profile.index') }}" class="btn-outline-dark">Cancle</a>
                <button class="btn-dark">Change</button>
            </div>
        </form>
    </div>
</div>
@endsection