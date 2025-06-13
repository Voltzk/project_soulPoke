{{-- filepath: resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Log in</button>
    </form>
    <div style="margin-top:10px;">
        <a href="{{ url('/register') }}">Create Account</a> |
        <a href="{{ url('/recovery') }}">Forgot Password?</a>
    </div>
@endsection