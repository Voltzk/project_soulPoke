@extends('layouts.app')

@section('title', 'Create Character')
@section('content')
    <div class="znote-box" style="max-width: 600px; margin: 2rem auto;">
        <div class="znote-title">Create Character</div>
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
    <form method="POST" action="{{ route('createcharacter.post') }}">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Sex:</label><br>
        <select name="sex">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select><br>
        <label for="vocation">Vocation:</label><br>
        <input type="text" id="vocation" name="vocation" value="No vocation" readonly style="background:#eee; color:#888;"><br><br>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
