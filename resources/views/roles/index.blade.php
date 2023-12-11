@extends('layouts.main')

@section('content')
<div>
    <h4 class="my-5">Roles</h4>

    <div class="mt-10 w-full md:w-4/5 overflow-x-auto">
        <table class="text-sm text-left rtl:text-right overflow-hidden">
            <thead class="bg-slate-800 text-slate-50 text-xs uppercase">
                <tr class="">
                    <th class="px-6 py-3 rounded-s-lg">No</th>
                    <th class="px-6 py-3">Name</th>
                        @if(Auth::user()->roles->contains(1))
                            <th class="px-6 py-3">Status</th>
                        @endif
                    <th class="px-6 py-3 rounded-e-lg">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-badge name="{{ $role->name }}" />
                        </td>
                            @if(Auth::user()->roles->contains(1))
                                @if ($role->name !== "Global Administrator" && $role->name !== "Administrator")
                                    <td class="px-6 py-4">
                                        <form id="{{ $role->slug }}" action="{{ route('roles.update',$role->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input 
                                                    id="{{ $role->slug }}-switch"
                                                    type="checkbox" name="{{ $role->slug }}"
                                                    class="sr-only peer"
                                                    @if($role->status === "on")
                                                        checked
                                                    @endif
                                                />
                                                <div 
                                                    target-form={{ $role->slug }}
                                                    class="toggle-switches w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-slate-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-slate-600"
                                                >
                                                </div>
                                            </label>
                                        </form>
                                    </td>
                                @else
                                    <td class="px-6 py-4"></td>
                                @endif
                            @endif
                        <td class="px-6 py-4 whitespace-nowrap">
                            @foreach (Str::of($role->description)->explode('/') as $description)
                                <li>{{ $description }}</li>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    let toggleSwitches = document.querySelectorAll('.toggle-switches');
    toggleSwitches.forEach(toggleSwitch => {
        toggleSwitch.addEventListener('click',function(){
            document.getElementById(toggleSwitch.getAttribute("target-form")+"-switch").checked = document.getElementById(toggleSwitch.getAttribute("target-form")+"-switch").checked ? false : true;
            document.getElementById(toggleSwitch.getAttribute("target-form")).submit();
        });
    });
</script>
@endsection