<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div id="maincontent">
        <div id="main">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="{{ route('post') }}">Post</a></li>
            </ul>
        </div>
        <div id="user">
            <ul>
                @auth
                <li><a href="">{{ auth()->user()->name }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth
                @guest 
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>
    @yield('content')
</body>
</html>