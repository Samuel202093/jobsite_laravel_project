<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/jobs.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/list.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Job Board</title>
</head>
<body> 
    <nav class="flex justify-between">
        <div class="logo-container">
            <a href="/">
                <img src="{{asset('images/logo_bg.png')}}" alt="logo" class="logo">
            </a>
        </div>
        <div class="links-container">
            {{-- <span class="testSpan">Test</span> --}}
            @auth
            <a href="/listings/manage" class="login" id="login"> Gigs</a>
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit">logout</button>
            </form>
            {{-- <span>{{auth()->user()->firstname}}</span> --}}
            @else
            <a href="/login" class="login" id="login">Login</a>
                
            <a href="/register" class="register">Register</a>
            @endauth
        </div>
    </nav>

    {{-- VIEW OUTPUT --}}
    @yield('content') 
    @include('partials._footer')
   
    
    {{-- adding the flash-message component --}}
    <x-flash-message/> 
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>