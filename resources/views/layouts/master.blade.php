<!DOCTYPE html>

<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        {{-- CSRF TOKEN --}}
        <meta name='csrf-token' content='{{ csrf_token() }}'>

        <title>{{ config('app.name') }}</title>

        {{-- BOOTSTRAP STYLES --}}
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">

        {{-- STYLES --}}
        <link rel='stylesheet' type='text/css' href='/css/reset.css'>
        <link rel='stylesheet' type='text/css' href='/css/layouts/master.css'>
        @stack('styles')

            {{-- BROWSER SUPPORT --}}
            <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
        <![endif]-->

        {{-- FONTS --}}
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">

    </head>
    <body>
        <header role='banner'>
            @include('modules.nav')
        </header>

        <main role='main'>
            @yield('content')
        </main>

        <footer role='contentinfo'>
            @include('modules.footer')
        </footer>

        <script src='{{ asset("js/app.js") }}' defer></script>
    </body>
</html>