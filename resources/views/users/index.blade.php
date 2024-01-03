@extends('layouts.main')

@section('search')
<x-search name="SearchUser" value="{{ request('SearchUser') }}" />
@endsection

@section('content')
<div class="">
    <h4 class="my-5">Active Users</h4>
    <div class="flex justify-normal md:justify-end">
        <div class="w-full md:w-1/2">
            <x-alert/>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right bg-slate-50">
            <thead class="text-xs uppercase bg-slate-800 text-slate-50">
                <tr class="">
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Roles</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="group/list hover:bg-slate-100 hover:cursor-default">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('users.show',$user->id) }}" class="underline underline-offset-2 text-gray-600 hover:text-gray-800 transition-all duration-300">{{ $user->email }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex gap-2">
                                @foreach ($user->roles as $role)
                                    <x-badge name="{{ $role->name }}" />
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <x-badge name="{{ $user->status }}" />
                        </td>
                        <td class="px-6 py-4 w-[10%]">
                            @if (Auth::user()->id !== $user->id)
                                @if (Auth::user()->roles->contains(1))
                                    @if (!$user->roles->contains(1))
                                        <div class="hidden group-hover/list:flex items-center gap-5">
                                            <a href="{{ route('users.edit',$user->id) }}" class="">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a
                                                href="javascript:void(0);"
                                                class="text-rose-500"
                                                delete-name="{{ $user->firstname }} {{ $user->lastname }}"
                                                delete-id="{{ $user->id }}"
                                                open-modal="delete-modal"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                            <form id="formdelete-{{ $user->id }}" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    @endif
                                @elseif(Auth::user()->roles->contains(2))
                                    @if (!$user->roles->contains(1) && !$user->roles->contains(2))
                                        <div class="hidden group-hover/list:flex items-center gap-5">
                                            <a href="{{ route('users.edit',$user->id) }}" class="">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="delete-modal" class="animate-fadeIn hidden bg-slate-500/20 absolute inset-0 rounded-lg z-20" >
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
        {{ $users->links('vendor.pagination.tailwind') }}
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