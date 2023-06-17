<header>
    <nav>
        <div id="flex">
            @if(Auth::check())
            <h3 id="greeting">Halo kak, {{ Auth::user()->name }}</h3>
            @else
            <h3 id="greeting">Halo Guest</h3>
            @endif
        </div>
        <ul>
            @if(Auth::check())
                <li><a href="{{ url('/logout') }}" class="btn btn-success button-top"><p>logout</p></a></li>
            @else
                <li><a href="{{ url('/register') }}" class="btn btn-success button-top"><p>Register</p></a></li>
                <li><a href="{{ url('/login') }}" class="btn btn-success button-top"><p>Login</p></a></li>
            @endif
        </ul>
    </nav>
</header>


