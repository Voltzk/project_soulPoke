@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('content')
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="/admin/news">Manage News</a></li>
        <li><a href="/admin/shop">Manage Shop</a></li>
        <li><a href="/admin/gallery">Manage Gallery</a></li>
        <li><a href="/admin/helpdesk">Manage Helpdesk</a></li>
        <li><a href="/admin/reports">Manage Reports</a></li>
        <li><a href="/admin/skills">Manage Skills</a></li>
    </ul>
@endsection
