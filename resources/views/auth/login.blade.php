<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    @vite('resources/css/app.css')
</head>
<body>
    <div class="h-screen flex items-center justify-center">
        <div class="min-w-[400px] md:max-w-[1200px] flex border rounded-lg shadow-xl bg-gray-50 pt-10">
            <div class="hidden md:flex items-end flex-shrink-0 w-1/2">
                <img src="{{ asset('asset/imgs/backgrounds/swing.svg') }}" class="" />
            </div>
    
            <div class="w-full md:w-1/2 space-y-10 p-5">
                <div class="">
                    <h3>Login</h3>
                </div>
                <x-alert/>
                <div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <x-input type="text" name="email" icon="envelope" placeholder="Email" />
    
                        <x-input type="password" name="password" icon="key" placeholder="Password" />
    
                        <div>
                            <button type="submit" class="w-full btn-dark">LOGIN</button>
                        </div>
                    </form>
                </div>
                <div class="">
                    <p>New user? Register <a href="{{ route('register.index') }}" class="font-bold underline underline-offset-2">here</a>!</p>
                </div>
            </div>
        </div>
    </div>

    @stack('inputscript')
</body>
</html>