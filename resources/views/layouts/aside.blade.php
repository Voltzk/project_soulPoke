<div id="sidebar_container">
    @if (auth()->check())
        <div class="sidebar">
            <h2>Welcome, {{ Auth::user()->name ?? 'User' }}.</h2>
            <div class="inner">
                <ul>
                    <li><a href="/myaccount">My Account</a></li>
                    <li><a href="/createcharacter">Create Character</a></li>
                    <li><a href="/changepassword">Change Password</a></li>
                    <li><a href="/settings">Settings</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:blue; cursor:pointer;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        
    @else
        @include('widgets.login')
    @endif
    

    @include('widgets.charactersearch')
    @if (auth()->check() && auth()->user()->is_admin)
        @include('widgets.Wadmin')
    @endif

    <div class="sidebar">
        <h3>Top 5 players</h3>
        <ol>
            @foreach($topPlayers as $player)
                <li><a href="/characterprofile?name={{ urlencode($player->name) }}">{{ $player->name }}</a> ({{ $player->level }})</li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar">
        <h2>Server Information</h2>
        <div class="inner">
            <ul>
                <li><span style="color:{{ $serverOnline ? 'green' : 'red' }};font-weight:bold;"><center>Server {{ $serverOnline ? 'Online' : 'Offline' }}!</center></span></li>
                <li> Registered accounts: {{ $registeredAccounts }}</li>
            </ul>
        </div>
    </div>
</div>
