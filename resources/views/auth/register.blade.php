{{-- filepath: resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Register Account')

@section('content')
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
    <div class="znote-box" style="max-width: 600px; margin: 2rem auto;">
        <div class="znote-title">Register Account</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <ul style="list-style: none; padding: 0;">
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Account Name:<br>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </li>
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Password:<br>
                    <input type="password" name="password" required>
                </li>
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Password again:<br>
                    <input type="password" name="password_confirmation" required>
                </li>
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Email:<br>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </li>
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Country:<br>
                    <select name="country" required>
                        <option value="">(Please choose)</option>
                        @foreach(config('countries') as $code => $country)
                            <option value="{{ $code }}" @if(old('country') == $code) selected @endif>{{ $country }}</option>
                        @endforeach
                    </select>
                </li>
                <li style="margin-top: 1em;">
                    <span class="znote-title" style="font-size:1.1em; color:#009FBC;">Server Rules</span>
                    <div class="znote-content">
                        <p>The golden rule: Have fun.</p>
                        <p>If you get pwn3d, don't hate the game.</p>
                        <p>No <a href='http://en.wikipedia.org/wiki/Cheating_in_video_games' target="_blank">cheating</a> allowed.</p>
                        <p>No <a href='http://en.wikipedia.org/wiki/Video_game_bot' target="_blank">botting</a> allowed.</p>
                        <p>The staff can delete, ban, do whatever they want with your account and your submitted information. (Including exposing and logging your IP).</p>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Do you agree to follow the server rules?<br>
                    <select name="rules_agree" required>
                        <option value="0">Umh...</option>
                        <option value="1" @if(old('rules_agree')==1) selected @endif>Yes.</option>
                        <option value="2" @if(old('rules_agree')==2) selected @endif>No.</option>
                    </select>
                </li>
                <li style="margin-top: 1em;">
                    <button type="submit">Create Account</button>
                </li>
            </ul>
        </form>
    </div>
@endsection
