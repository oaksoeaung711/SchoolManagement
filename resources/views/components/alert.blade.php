@if(Session::has('message'))
@php
    $color = Session::get("message")["color"];
    $icon = Session::get("message")["icon"];
    $info = Session::get("message")["info"];
@endphp

    @if ($color === "red")
        <div id="alert" class="animate-fadeIn flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
            <i class="fa-solid fa-{{ $icon }}"></i>
            <div class="ms-3 text-sm font-medium">
                {{ $info }}
            </div>
            <button id="alert-close" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8">
                <i class="fa-solid fa-xmark fa-lg"></i>
            </button>
        </div>
    @elseif($color === "green")
        <div id="alert" class="animate-fadeIn flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
            <i class="fa-solid fa-{{ $icon }}"></i>
            <div class="ms-3 text-sm font-medium">
                {{ $info }}
            </div>
            <button id="alert-close" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8">
                <i class="fa-solid fa-xmark fa-lg"></i>
            </button>
        </div>
    @endif
<script type="text/javascript">
    let alertClose = document.getElementById('alert-close');
    alertClose.addEventListener('click',function(){
        document.getElementById('alert').remove();
    });
</script>
@endif

{{-- with('message',["color" => "red","icon" => "triangle-exclamation","info" => "Incorrect email or password."]) --}}