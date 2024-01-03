@extends('layouts.main')

@section('content')
<div>
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="w-1/2 mx-auto mt-10 p-10 shadow-lg rounded-lg bg-slate-100 space-y-10">
            <h4>Create New Subject</h4>
            <x-input type="text" name="name" icon="book-open" placeholder="Myanmar" label="Name" />
            <div class="flex justify-end gap-3">
                <a href="{{ route('subjects.index') }}" class="btn-red">Cancle</a>
                <button class="btn-dark">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection