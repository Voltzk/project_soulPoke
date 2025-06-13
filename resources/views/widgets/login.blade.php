<div class="sidebar">
    <h2>Login / Register</h2>
    <div class="inner">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <ul id="login">
                <li>
                    Username: <br>
                    <input type="text" name="name" value="{{ old('username') }}">
                </li>
                <li>
                    Password: <br>
                    <input type="password" name="password">
                </li>
                {{-- Adapte para 2FA/captcha se necessário --}}
                <li>
                    <input type="submit" value="Log in">
                </li>
            </ul>
            <center>
                <h3><a href="{{ route('register') }}">New account</a></h3>
                <h4><a href="/recovery">Account Recovery</a></h4>
            </center>
        </form>
    </div>
</div>
