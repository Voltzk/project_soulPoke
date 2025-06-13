@extends('layouts.app')

@section('title', 'Character Profile')
@section('content')
    {{-- Debug: Mostra variáveis recebidas --}}
    <div style="background:#ffe;border:1px solid #cc0;padding:8px;margin-bottom:10px;">
        <b>Debug:</b> name = {{ isset($name) ? var_export($name, true) : 'NÃO DEFINIDO' }}<br>
        player = {{ isset($player) ? var_export($player, true) : 'NÃO DEFINIDO' }}
    </div>
    @if(isset($player) && $player)
        <div class="character-profile-box">
            <h2>{{ $player->name }}</h2>
            <ul class="character-profile-list">
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Sex:</b> {{ $player->sex == 1 ? 'Male' : 'Female' }}</li>
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Level:</b> {{ $player->level }}</li>
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Vocation:</b> {{ $player->vocation ?? 'No vocation' }}</li>
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Last Login:</b> {{ $player->lastlogin ? date('d F Y (H:i)', $player->lastlogin) : 'Never' }}</li>
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Status:</b> <span style="color:red">OFFLINE</span></li>
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Created:</b> {{ $player->created ? date('d F Y (H:i)', strtotime($player->created)) : '-' }}</li>
                <li><img src="/images/pokeball.png" class="pokeicon"> <b>Death List:</b><br><span style="color:green">This player has never died.</span></li>
            </ul>
            <div class="character-quests">
                <b>Quest status:</b>
                <table class="znote-table">
                    <thead>
                        <tr><th>Quest Name</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Boulder Badge</td><td style="color:red">[Not started]</td></tr>
                        <tr><td>Cascade Badge</td><td style="color:red">[Not started]</td></tr>
                        <tr><td>Thunder Badge</td><td style="color:red">[Not started]</td></tr>
                        <tr><td>Rainbow Badge</td><td style="color:red">[Not started]</td></tr>
                        <tr><td>Soul Badge</td><td style="color:red">[Not started]</td></tr>
                        <tr><td>Marsh Badge</td><td style="color:red">[Not started]</td></tr>
                        <tr><td>Volcano Badge</td><td style="color:red">[Not started]</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    @elseif(isset($name) && $name)
        <div class="character-profile-box">
            <h2>Character not found</h2>
            <p>No character with the name <b>{{ $name }}</b> was found.</p>
        </div>
    @else
        <p>Exibição de dados do personagem. (Integrar dados futuramente)</p>
    @endif
@endsection
