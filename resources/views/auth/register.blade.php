@extends('layouts.app')
@section('content')
    <div id="register">
        <h3>Register....</h3>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="name">Name :</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                @error('name')
                    <div id="error">
                    {{ $message }}
                    </div>
                @enderror
            <label for="username">Username:</label>
             <input type="text" name="username" placeholder="Enter your username" value="{{ old('username') }}">
                @error('username')
                    <div id="error">
                    {{ $message }}
                    </div>
                @enderror
             <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <div id="error">
                    {{ $message }}
                    </div>
                @enderror
            <label for="">Password:</label>
            <input type="password" name="password" placeholder="Enter your password">
                @error('password')
                    <div id="error">
                    {{ $message }}
                    </div>
                @enderror
            <label for="">Confirm Password:</label>
            <input type="password" name="password_confirmation" placeholder="confirm your password">
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection