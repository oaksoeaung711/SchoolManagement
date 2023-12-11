@extends('layouts.main')

@section('content')
<div class="max-w-xl bg-slate-50 bg-no-repeat shadow-lg shadow-slate-300 bg-right-bottom rounded-xl overflow-hidden"">
    <div class="w-full p-10">
        <form action="{{ route('profile.image.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="border-2 border-gray-300 bg-slate-100 rounded-xl p-6 relative @error('image') border-red-500 @enderror">
                <input type="file" id="file" name="image" class="w-full h-full absolute inset-0 z-50 opacity-0 cursor-pointer" onchange="fileview(event)" />
                <div class="text-center">
                    <img id="preview" src="{{ asset('asset/imgs/backgrounds/upload.svg') }}" class="w-40 h-40 mx-auto" />
                    <h3 class="text-gray-700 font-medium text-sm mt-2">
                        <label for="file" class="">
                            <span>Click Here To Upload Your</span>
                            <span class="text-sky-600">Picture</span>
                        </label>
                    </h3>
                    <span class="text-gray-500 text-xs mt-1 tracking-wider">JPG,PNG,GIF,ICO,JPEG</span>
                </div>
            </div>
            @error('image')
                <p class="ml-1 mt-1 text-red-500">{{ $message }}</p>
            @enderror
            <div class="flex gap-2 mt-10">
                <a href="{{ route('profile.index') }}" class="btn-outline-dark">Cancle</a>
                <button class="btn-dark">Upload</button>
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
        // var filereader = new FileReader();
        // filereader.readAsDataURL(getinput.files[0]);

        getpreview.src = URL.createObjectURL(getinput.files[0]);
    }
</script>
@endsection