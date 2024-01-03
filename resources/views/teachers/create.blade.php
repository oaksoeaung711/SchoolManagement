@extends('layouts.main')

@section('content')
<div class="">
    <h4 class="my-5">Create New Teacher</h4>

    <div class="w-full md:w-1/3 mt-10">
        <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input type="text" name="name" icon="font" placeholder="Tr. Kyaw Kyaw" label="Name" />
            <x-input type="email" name="email" icon="envelope" placeholder="kyawkyaw@kbtc.edu.mm" label="Email" />
            <x-input type="phone" name="phone" icon="phone" label="Phone" />
            <div class="border-2 border-gray-300 bg-slate-100 rounded-xl p-6 relative @error('sign') border-red-500 @enderror">
                <input type="file" id="file" name="sign" class="w-full h-full absolute inset-0 z-50 opacity-0 cursor-pointer" onchange="fileview(event)" />
                <div class="text-center">
                    <img id="preview" src="{{ asset('asset/imgs/backgrounds/upload.svg') }}" class="w-40 h-40 mx-auto" />
                    <h3 class="text-gray-700 font-medium text-sm mt-2">
                        <label for="file" class="">
                            <span>Click Here To Upload Teacher</span>
                            <span class="text-sky-600">Sign</span>
                        </label>
                    </h3>
                    <span class="text-gray-500 text-xs mt-1 tracking-wider">PNG</span>
                </div>
            </div>
            @error('sign')
                <p class="ml-1 mt-1 text-red-500">{{ $message }}</p>
            @enderror

            <div class="flex mt-10 gap-3">
                <a href="{{ route('teachers.index') }}" class="btn-red w-full flex justify-center" >Cancle</a>
                <button type="submit" class="btn-dark w-full" >Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section("scripts")
<script type="text/javascript">
    function fileview(event){
        const getinput = event.target;
        const getpreview = document.getElementById('preview');

        getpreview.src = URL.createObjectURL(getinput.files[0]);
    }
</script>
@endsection