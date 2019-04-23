<!DOCTYPE html>

<html lang='en'>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    {{--<meta charset='UTF-8'>--}}
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>

    <title>{{ config('app.name') }}</title>

    {{-- FAVICON --}}
    <link rel='apple-touch-icon' sizes='180x180' href='/apple-touch-icon.png'>
    <link rel='icon' type='image/png' sizes='32x32' href='/favicon-32x32.png'>
    <link rel='icon' type='image/png' sizes='16x16' href='/favicon-16x16.png'>
    <link rel='manifest' href='/site.webmanifest'>
    <link rel='mask-icon' href='/safari-pinned-tab.svg' color='#5bbad5'>
    <meta name='msapplication-TileColor' content='#da532c'>
    <meta name='theme-color' content='#ffffff'>

    {{-- BOOTSTRAP STYLES --}}
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
          crossorigin='anonymous'>

    {{-- STYLES --}}
    <link rel='stylesheet' type='text/css' href='/css/reset.css'>
    <link rel='stylesheet' type='text/css' href='/css/layouts/master.css'>
    <link rel='stylesheet' type='text/css' href='/css/modules/nav.css'>
    <link rel='stylesheet' href='{{ asset("css/app.css") }}'>
    @stack('styles')

    {{-- BROWSER SUPPORT --}}
    <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
    <![endif]-->

    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">

</head>
<body>

    <div id="app">

        <header role='banner'>
            @include('modules.nav')
        </header>

        <main role='main'>
            @yield('content')
        </main>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='{{ asset("js/app.js") }}' defer></script>
        <script src='/js/test.js'></script>

    </div>

</body>

</html>