@extends('layouts.app')

@section('title', 'Settings')
@section('content')
    <div class="znote-box" style="max-width: 600px; margin: 2rem auto;">
        <div class="znote-title">Settings</div>
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
        <form method="POST" action="{{ route('settings.update') }}">
            @csrf
            <ul style="list-style: none; padding: 0;">
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> email:<br>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                </li>
                <li>
                    <img src="{{ asset('images/pokeball.png') }}" style="vertical-align: middle; width:18px;"> Country:<br>
                    <select name="country" required>
                        <option value="">(Please choose)</option>
                        @foreach(config('countries') as $code => $country)
                            <option value="{{ $code }}" @if((old('country', auth()->user()->flag ?? '') == $code)) selected @endif>{{ $country }}</option>
                        @endforeach
                    </select>
                </li>
                <li style="margin-top: 1em;">
                    <button type="submit">Update settings</button>
                </li>
            </ul>
        </form>
    </div>
@endsection
