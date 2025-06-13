@extends('layouts.app')

@section('title', 'Contact')
@section('content')
    <h2>Contact</h2>
    <form method="post" action="/contact">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br>
        <label>Message:</label><br>
        <textarea name="message"></textarea><br>
        <button type="submit">Send</button>
    </form>
@endsection
