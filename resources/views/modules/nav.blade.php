<header id='header'>

    {{-- LOGO --}}
    <div class='logo left'>
        <a class='logo left' href='{{ url('/') }}'>
            <img id='logo' src='/images/Rate4It-Logo.jpg' alt='Rate4it Logo'>
        </a>
    </div>

    {{-- NAVIGATION --}}
    <nav role='navigation' class='navbar navbar-expand-md navbar-light navbar-laravel'>

        {{-- TOGGLER BUTTON --}}
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                {{-- AUTHENTICATION LINKS --}}
                @foreach(config('app.nav'.Auth::check()) as $link => $label)
                    <li class='nav-item'><a class='nav-link'
                                            href='{{ $link }}'
                                            class='{{ Request::is(substr($link, 1)) ? 'active' : '' }}'>{{ $label }}</a>
                @endforeach
                {{-- IF USER IS LOGGED IN --}}
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>