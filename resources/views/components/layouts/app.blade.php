<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>
<body>
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-row h-16 justify-between">
                    <div class="flex items-center">
                        <div class="">
                            <a href="/" class="text-white text-2xl uppercase  font-bold">Student System</a>
                        </div>
                    </div>
                    <div class="md:flex items-center ml-auto hidden ">
                        @guest
                        <div class="flex items-baseline space-x-4">
                            <a href="/login" class="rounded-md hover:bg-gray-700 hover:text-white px-3 py-2 text-sm font-medium text-white">Login</a>
                            <a href="/register" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Register</a>
                        </div>
                        
                        @else
                        <a href="/logout" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Logout</a>
                        @endguest
                    </div>
                </div>                
            </div>
        </nav>
    </div>
        
    @auth
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @auth 
                @if(Auth::user()->admin === 0)
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ Auth::user()->first_name }}'s Dashboard</h1>
                @else
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Admin Dashboard ({{ Auth::user()->first_name }})</h1>
                @endif
        
            @else
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            @endauth
        </div>
    </header>
    @endauth
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
@livewireScripts()
</body>
</html>
