@extends('layouts.app')
@section('content')
    <div id="register">
    <h2>Login....</h2>
        @if(session('status'))
            <h3>{{ session('status') }}</h3>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
             <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <div id="error">
                    {{ $message }}
                    </div>
                @enderror
            <label for="">Password:</label>
            <input type="password" name="password" placeholder="Enter your password">
            <div id="remember">
                <input type="checkbox" name="remember">
                <label for="">Remember me</label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection