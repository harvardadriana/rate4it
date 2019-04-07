<nav class='navbar navbar-expand-md navbar-light navbar-laravel'>

    <div id='container' class="container">

        {{-- LOGO --}}
        <a class='navbar-brand' href='{{ url("/") }}'>
            @stack('logo')
        </a>

        {{-- TOGGLER BUTTON --}}
        <button id='navbar-toggler'
                class='navbar-toggler'
                type='button'
                data-toggle='collapse'
                data-target='#navbarSupportedContent'
                aria-controls='navbarSupportedContent'
                aria-expanded='false'
                aria-label='{{ __("Toggle navigation") }}'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>

            <ul class='navbar-nav ml-auto'>

                {{-- AUTHENTICATION LINKS --}}
                @foreach(config('app.nav'.Auth::check()) as $link => $label)
                    <li class='nav-item'>
                        <a href='{{ $link }}'
                           class='{{ Request::is($link) ? 'nav-link active' : 'nav-link' }}'>{{ $label }}
                        </a>
                    </li>
                @endforeach

                {{-- IF USER IS LOGGED IN --}}
                @if(Auth::check())
                    <li id='dropdownUser' class='nav-item dropdown'>
                        <a id='navbarDropdown'
                           class='nav-link dropdown-toggle'
                           href='#'
                           role='button'
                           data-toggle='dropdown'
                           aria-haspopup='true'
                           aria-expanded='true'
                           v-pre>
                            {{ Auth::user()->name }} <span class='caret'></span>
                        </a>

                        {{-- LOG OUT --}}
                        <div id='subMenu' class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='{{ route("logout") }}'
                               onclick='event.preventDefault();
                                             document.getElementById("logout-form").submit();'>
                                {{ __('Logout') }}
                            </a>
                            <form id='logout-form'
                                  action='{{ route("logout") }}'
                                  method='POST'
                                  style='display: none;'>
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif

            </ul>

        </div> {{-- end .collapse navbar --}}

    </div> {{-- end .container --}}

</nav>