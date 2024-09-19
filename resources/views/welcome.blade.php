<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT REGISTRATION SYSTEM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    @livewireStyles()
</head> 
<body>
    <section class=" flex flex-col items-center w-[100%] gap-y-8">
        <div class="flex flex-col items-center gap-y-8">
            <img src="{{asset('assets/users.png')}}" alt="" class="w-[50%]">
            <h1 class=" text-4xl font-[Roboto] font-bold">STUDENT REGISTRATION SYSTEM</h1>
        </div>
        <form action="{{ url()->current() }}" method="post">
            <div class="flex flex-col gap-y-4 text-center">
                <x-button :href="route('login')">Login</x-button>
                <x-button :href="route('register')">Register</x-button>
            </div>
        </form>
    </section>
    @livewireScripts()
</body>
</html>