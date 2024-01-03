@extends('layouts.main')

@section('search')
<x-search name="SearchClassroom" value="{{ request('SearchClassroom') }}" />
@endsection

@section('content')
<div class="">
    <h4 class="my-5">Classrooms</h4>
    <div class="flex justify-normal md:justify-end">
        <div class="w-full md:w-1/2">
            <x-alert/>
        </div>
    </div>
    @if (Auth::user()->roles->contains(1) || Auth::user()->roles->contains(2) || Auth::user()->roles->contains(3))
        <div class="w-full md:w-1/2 flex justify-end my-5">
            <a href="{{ route('classrooms.create') }}" class="w-fit btn-dark">Create</a>
        </div>
    @endif
    <div class="relative overflow-x-auto">
        <table class="w-full md:w-1/2 text-sm text-left rtl:text-right bg-slate-50">
            <thead class="text-xs uppercase bg-slate-800 text-slate-50">
                <tr class="">
                    <th scope="col" class="px-6 py-3 w-[10%]">No</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    @if (Auth::user()->roles->contains(1) || Auth::user()->roles->contains(2) || Auth::user()->roles->contains(3))
                        <th scope="col" class="px-6 py-3 w-[10%]"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                    <tr class="group/list hover:bg-slate-100 hover:cursor-default">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="" class="underline underline-offset-2 text-gray-600 hover:text-gray-800 transition-all duration-300">{{ $classroom->name }}</a>
                        </td>
                        @if (Auth::user()->roles->contains(1) || Auth::user()->roles->contains(2) || Auth::user()->roles->contains(3))
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="hidden group-hover/list:flex items-center gap-5">
                                    <a
                                        href="{{ route('classrooms.edit',$classroom->id) }}"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <a
                                        href="javascript:void(0);"
                                        class="text-rose-500"
                                        delete-name="{{ $classroom->name }}"
                                        delete-id="{{ $classroom->id }}"
                                        open-modal="delete-modal"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                    <form id="formdelete-{{ $classroom->id }}" action="{{ route('classrooms.destroy',$classroom->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="delete-modal" class="animate-fadeIn hidden bg-slate-500/20 absolute inset-0 z-20" >
        <div class="w-2/5 bg-slate-200 p-5 mx-auto mt-10">
            <div>
                <img src="{{ asset('asset/imgs/backgrounds/trash.svg') }}" class="w-52 mx-auto" />
            </div>
            <div class="my-10 text-center">
                <p>Are you sure you want to delete <span id="delete-modal-header" class="font-bold" ></span> ?</p>
                <div class="mt-10 flex justify-center items-center gap-2">
                    <a close-modal="delete-modal" href="javascript:void(0);" class="btn-outline-dark">Cancle</a>
                    <a id="modal-delete-btn" href="javascript:void(0);" class="btn-red">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:w-3/4 lg:mx-auto flex justify-end">
        {{ $classrooms->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    let openModals = document.querySelectorAll("[open-modal]");
    let closeModals = document.querySelectorAll("[close-modal]");
    
    openModals.forEach(openModal => {
        openModal.addEventListener('click',()=>{
            let target = openModal.getAttribute('open-modal');
            document.getElementById(target).classList.remove('hidden');

            if(openModal.getAttribute('open-modal') == 'delete-modal'){
                let modalDeleteBtn = document.getElementById('modal-delete-btn');
                let deleteModalHeader = document.getElementById('delete-modal-header');
                let deleteId;
                deleteId = openModal.getAttribute("delete-id");
                deleteModalHeader.innerHTML = openModal.getAttribute("delete-name");
                modalDeleteBtn.addEventListener('click',function(){
                    document.getElementById('formdelete-'+deleteId).submit();
                });
            }
        });
    });

    closeModals.forEach(closeModal => {
        closeModal.addEventListener('click',()=>{
            let target = closeModal.getAttribute('close-modal');
            document.getElementById(target).classList.add('hidden');
        });
    });
</script>
@endsection