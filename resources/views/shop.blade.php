@extends('layouts.app')

@section('title', 'Shop')
@section('content')
    <div class="znote-box">
        <div class="znote-title">Shop</div>
        <div class="znote-content">
            {{-- Conteúdo da loja, ofertas, etc. --}}
            @yield('shop-content')
        </div>
    </div>
@endsection
