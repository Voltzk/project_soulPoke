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
