<header>
    <nav>
        <div id="flex">
            @if(Auth::check())
            <h3>Halo kak, {{ Auth::user()->name }}</h3>
            @else
            <h3>Halo Guest</h3>
            @endif
        </div>
        <ul>
            @if(Auth::check())
                <li><a href="#" class="btn btn-success">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ url('/logout') }}" class="btn btn-success">Logout</a></li>
            @else
                <li><a href="{{ url('/register') }}" class="btn btn-success">Register</a></li>
                <li><a href="{{ url('/login') }}" class="btn btn-success">Login</a></li>
            @endif
        </ul>
    </nav>
</header>


