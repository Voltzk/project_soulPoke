@extends('layouts.app')

@section('title', 'Highscores')
@section('content')
    <div class="znote-box highscores-box" style="margin-top: 2em;">
        <div class="znote-title">Ranking for {{ ucfirst($rankingType) }}, {{ $vocation === 'all' ? 'any vocation' : $vocation }}.</div>
        <div class="znote-content">
            <form method="get" class="highscores-filters" style="margin-bottom:1em;display:flex;gap:1em;align-items:center;">
                <label>Type:
                    <select name="type">
                        <option value="experience" {{ $rankingType=='experience'?'selected':'' }}>Experience</option>
                        <option value="level" {{ $rankingType=='level'?'selected':'' }}>Level</option>
                        <option value="magic" {{ $rankingType=='magic'?'selected':'' }}>Magic</option>
                        <option value="shield" {{ $rankingType=='shield'?'selected':'' }}>Shield</option>
                        <option value="sword" {{ $rankingType=='sword'?'selected':'' }}>Sword</option>
                        <option value="club" {{ $rankingType=='club'?'selected':'' }}>Club</option>
                        <option value="axe" {{ $rankingType=='axe'?'selected':'' }}>Axe</option>
                        <option value="distance" {{ $rankingType=='distance'?'selected':'' }}>Distance</option>
                        <option value="fish" {{ $rankingType=='fish'?'selected':'' }}>Fish</option>
                        <option value="fist" {{ $rankingType=='fist'?'selected':'' }}>Fist</option>
                    </select>
                </label>
                <label>Vocation:
                    <select name="vocation">
                        <option value="all" {{ $vocation=='all'?'selected':'' }}>Any vocation</option>
                        <option value="0" {{ $vocation=='0'?'selected':'' }}>No vocation</option>
                        <option value="1" {{ $vocation=='1'?'selected':'' }}>Hunter</option>
                        <option value="2" {{ $vocation=='2'?'selected':'' }}>Catcher</option>
                        <option value="3" {{ $vocation=='3'?'selected':'' }}>Healer</option>
                        <option value="4" {{ $vocation=='4'?'selected':'' }}>Blocker</option>
                        <option value="5" {{ $vocation=='5'?'selected':'' }}>Explorer</option>
                    </select>
                </label>
                <label>Page:
                    <select name="page">
                        @for($i=1;$i<=$maxPages;$i++)
                            <option value="{{$i}}" {{ $page==$i?'selected':'' }}>{{$i}}</option>
                        @endfor
                    </select>
                </label>
                <button type="submit">View</button>
            </form>
            <table class="znote-table" style="width:100%;text-align:center;">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Vocation</th>
                        <th>Level</th>
                        <th>{{ $rankingType == 'experience' ? 'Experience' : 'Points' }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rank = ($page-1)*20+1; @endphp
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $rank++ }}</td>
                            <td><a href="/characterprofile?name={{ urlencode($player->name) }}">{{ $player->name }}</a></td>
                            <td>{{ $player->vocation_name ?? ($player->vocation ?? 'No vocation') }}</td>
                            <td>{{ $player->level }}</td>
                            <td>{{ $rankingType == 'experience' ? $player->experience : ($player->points ?? 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
