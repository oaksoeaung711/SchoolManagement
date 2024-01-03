<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex relative">

        {{-- Start Left Area --}}
            <aside id="side-bar" class="hidden flex-1 max-w-[300px] h-screen bg-slate-50 shadow-lg md:shadow-none overflow-y-auto md:block md:static p-5 transition-all duration-300">
                <div class="space-y-5">
                    <div class="flex justify-around md:justify-start items-center">
                        <h5>School Management</h5>
                        <div class="block md:hidden">
                            <button id="close-btn" class="text-2xl"><i class="fa-solid fa-caret-left"></i></button>
                        </div>
                    </div>
                    <div class="">
                        <a href="{{ route('profile.index') }}" class="flex items-center gap-3 mt-10">
                            @if(Auth::user()->image === null)
                                <img src="{{ asset('asset/imgs/icons/profile.png') }}" class="w-10 h-10 rounded-full" />
                            @else
                                <img src="{{ asset("storage/profiles/".Auth::user()->image) }}" class="w-10 h-10 rounded-full" />
                            @endif
                            <div class="space-y-1">
                                <p class="text-sm font-medium">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </a>
                    </div>
                    <nav class="">
                        <ul class="mt-10 space-y-1">                            
                            <li id="home" class="p-2 rounded hover:bg-slate-200 transition-all duration-300">
                                <a href="{{ route('home') }}" class="flex items-center gap-3 p-2">
                                    <i class="fa-solid fa-home w-4 h-4"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <li id="users" class="p-2 rounded hover:bg-slate-200 transition-all duration-300">
                                <a href="{{ route('users.index') }}" class="flex items-center gap-3 p-2">
                                    <i class="fa-solid fa-users w-4 h-4"></i>
                                    <span>Users</span>
                                </a>
                            </li>

                            <li id="teacher" class="p-2 rounded hover:bg-slate-200 transition-all duration-300">
                                <a href="{{ route('teachers.index') }}" class="flex items-center gap-3 p-2">
                                    <i class="fa-solid fa-chalkboard-user w-4 h-4"></i>
                                    <span>Teachers</span>
                                </a>
                            </li>

                            <li id="roles" class="p-2 rounded hover:bg-slate-200 transition-all duration-300">
                                <a href="{{ route('roles.index') }}" class="flex items-center gap-3 p-2">
                                    <i class="fa-solid fa-user-lock w-4 h-4"></i>
                                    <span>Roles</span>
                                </a>
                            </li>

                            <li id="timetable-manage" class="p-2 rounded hover:bg-slate-200 transition-all duration-300">
                                <a href="javascript:void(0);" class="flex items-center gap-3 p-2" data-toggle="expand">
                                    <i class="fa-solid fa-table w-4 h-4"></i>
                                    <span>Timetable</span>
                                </a>
                                <ul class="h-0 overflow-hidden transition-all duration-300 space-y-1">
                                    <li id="classroom" class="p-2 rounded hover:bg-slate-50 transition-all duration-300">
                                        <a href="{{ route('classrooms.index') }}" class="flex items-center gap-3">
                                            <i class="fa-solid fa-chalkboard w-4 h-4"></i>
                                            <span>Classrooms</span>
                                        </a>
                                    </li>

                                    <li id="time" class="p-2 rounded hover:bg-slate-50 transition-all duration-300">
                                        <a href="{{ route('times.index') }}" class="flex items-center gap-3">
                                            <i class="fa-solid fa-clock w-4 h-4"></i>
                                            <span>Time</span>
                                        </a>
                                    </li>
                                    <li id="subject" class="p-2 rounded hover:bg-slate-50 transition-all duration-300">
                                        <a href="{{ route('subjects.index') }}" class="flex items-center gap-3">
                                            <i class="fa-solid fa-book-open w-4 h-4"></i>
                                            <span>Subjects</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="p-2 rounded hover:bg-slate-200 transition-all duration-300">
                                <a href="{{ route('logout') }}" class="flex items-center gap-3 p-2">
                                    <i class="fa-solid fa-door-open w-4 h-4"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        {{-- End Left Area --}}

        <div class="flex-1 h-screen overflow-y-auto">
            {{-- Start Top Nav Bar --}}
                <nav class="flex justify-between md:justify-end items-center gap-3 md:gap-0 bg-slate-50 p-3 sticky top-0 z-10 ">
                    <div class="block md:hidden">
                        <button id="side-bar-btn" class="text-2xl"><i class="fa-solid fa-caret-right"></i></button>
                    </div>
                    <div class="flex items-center gap-3 md:gap-12 pr-2">
                        @yield('search')
                        <div class="">
                            <a href="" class="flex items-center gap-3">
                                @if(Auth::user()->image === null)
                                    <img src="{{ asset('asset/imgs/icons/profile.png') }}" class="w-10 h-10 rounded-full" />
                                @else
                                    <img src="{{ asset("storage/profiles/".Auth::user()->image) }}" class="w-10 h-10 rounded-full" />
                                @endif
                                <p class="hidden md:block text-lg">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                            </a>
                        </div>
                    </div>
                </nav>
            {{-- End Top Nav Bar --}}

            {{-- Start Content Area --}}
                <div class="p-5">
                    @yield('content')
                </div>
            {{-- End Content Area --}}
        </div>
    </div>

    @if(request()->routeIs('home'))
        <script type="text/javascript">
            document.getElementById('home').classList.add('bg-slate-200');
        </script>
    @elseif(request()->routeIs('users.*'))
        <script type="text/javascript">
            document.getElementById('users').classList.add('bg-slate-200');
        </script>
    @elseif(request()->routeIs('roles.*'))
        <script type="text/javascript">
            document.getElementById('roles').classList.add('bg-slate-200');
        </script>
    @elseif(request()->routeIs('classrooms.*'))
    <script type="text/javascript">
        document.getElementById('classroom').classList.add('bg-slate-50');
        document.getElementById('classroom').parentElement.previousElementSibling.classList.add('expand');
    </script>
    @elseif(request()->routeIs('times.*'))
    <script type="text/javascript">
        document.getElementById('time').classList.add('bg-slate-50');
        document.getElementById('time').parentElement.previousElementSibling.classList.add('expand');
    </script>
    @elseif(request()->routeIs('subjects.*'))
    <script type="text/javascript">
        document.getElementById('subject').classList.add('bg-slate-50');
        document.getElementById('subject').parentElement.previousElementSibling.classList.add('expand');
    </script>
    @elseif(request()->routeIs('teachers.*'))
    <script type="text/javascript">
        document.getElementById('teacher').classList.add('bg-slate-200');
    </script>
    @endif

    <script src="{{ asset('asset/js/sidebar.js') }}"></script>
    
    @stack('inputscript')
    @yield('scripts')
</body>
</html>