@extends('layouts.app')

@section('title', 'Change Password')
@section('content')
    <div class="znote-box" style="max-width: 600px; margin: 2rem auto;">
        <div class="znote-title">Change Password</div>
        @if(session('success'))
            <div style="color: green; margin-bottom: 1em;">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div style="color: red; margin-bottom: 1em;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
    <form method="post" action="/changepassword">
        @csrf
        <label>Current Password:</label><br>
        <input type="password" name="current_password"><br>
        <label>New Password:</label><br>
        <input type="password" name="new_password"><br>
        <label>Confirm New Password:</label><br>
        <input type="password" name="new_password_confirmation"><br><br>
        <button type="submit">Change</button>
    </form>
@endsection
