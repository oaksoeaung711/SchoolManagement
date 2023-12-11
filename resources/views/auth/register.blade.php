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
        <div class="min-w-[400px] md:max-w-[1200px] flex border rounded-lg shadow-xl bg-gray-50">
            <div class="hidden md:flex flex-shrink-0 w-1/2 items-center">
                <img src="{{ asset('asset/imgs/backgrounds/register.svg') }}" />
            </div>
    
            <div class="w-full md:w-1/2 space-y-10 p-5 md:p-10">
                <div class="">
                    <h3>Registration</h3>
                </div>
                
                <div class="w-full">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="flex flex-col md:flex-row md:justify-between">
                            <x-input type="text" name="firstname" icon="user" label="First name" />
                            <x-input type="text" name="lastname" icon="user" label="Last name" />
                        </div>

                        <x-input type="email" name="email" icon="envelope" label="Email Address" />

                        <x-input type="phone" name="phone" icon="phone" label="Phone No" />

                        <x-input type="password" name="password" icon="key" label="Password" />
                        
                        <x-input type="password" name="confirm_password" icon="key" label="Confirm Password" />
    
                        <div>
                            <button type="submit" class="btn-dark">Register</button>
                        </div>
                    </form>
                </div>

                <p>Already have an account? Login <a href="{{ route('login.index') }}" class="font-bold underline underline-offset-2">here</a>!</p>
            </div>
        </div>
    </div>

    @stack('inputscript')
</body>
</html>