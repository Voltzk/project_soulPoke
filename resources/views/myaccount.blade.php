@extends('layouts.app')

@section('title', 'My account')

@section('content')
<div class="znote-box">
    <div class="znote-title">My Account</div>
    <div class="znote-content">
        <div id="myaccount">
            <p>
                Welcome to your account page, {{ Auth::user()->name }}<br>
                You have {{ Auth::user()->premdays ?? 0 }} days remaining premium account.
            </p>
            <h2>Character List: {{ $characters->count() }} characters.</h2>
            @if($characters->count())
            <table id="myaccountTable">
                <tr>
                    <th>NAME</th>
                    <th>LEVEL</th>
                    <th>VOCATION</th>
                    <th>TOWN</th>
                    <th>LAST LOGIN</th>
                    <th>STATUS</th>
                    <th>HIDE</th>
                </tr>
                @foreach($characters as $char)
                <tr>
                    <td>
                        <a href="{{ url('characterprofile?name=' . $char->name) }}">{{ $char->name }}</a>
                    </td>
                    <td>{{ $char->level }}</td>
                    <td>{{ $char->vocation == 0 ? 'No vocation' : $char->vocation }}</td>
                    <td>{{ $char->town_id == 34 ? 'Saffron' : 'Missing Town' }}</td>
                    <td>
                        @if($char->lastlogin && $char->lastlogin > 0)
                            {{ \Carbon\Carbon::createFromTimestamp($char->lastlogin)->format('d M Y (H:i)') }}
                        @else
                            Never.
                        @endif
                    </td>
                    <td>{{ $char->online ? 'online' : 'offline' }}</td>
                    <td>{{ $char->hide ? 'hidden' : 'visible' }}</td>
                </tr>
                @endforeach
            </table>
            <form method="POST" action="">
                @csrf
                <table>
                    <tr>
                        <td>
                            <select id="selected_character" name="selected_character">
                                @foreach($characters as $char)
                                    <option value="{{ $char->name }}">{{ $char->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select id="action" name="action">
                                <option value="none" selected>Select action</option>
                                <option value="toggle_hide">Toggle hide</option>
                                <option value="change_comment">Change comment</option>
                                <option value="change_gender">Change gender</option>
                                <option value="change_name">Change name</option>
                                <option value="delete_character" class="needconfirmation">Delete character</option>
                            </select>
                        </td>
                        <td>
                            <input id="submit_button" type="submit" value="Submit">
                        </td>
                    </tr>
                </table>
            </form>
            @else
                <p>You don't have any characters. Why don't you <a href="{{ url('createcharacter') }}">create one</a>?</p>
            @endif
        </div>
    </div>
</div>
@endsection
