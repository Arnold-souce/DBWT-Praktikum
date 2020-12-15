<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link  rel="stylesheet" type="text/css" href='/css/css_example.css' />
</head>
<body>
    <header>
        <p>Willkommen auf dieser Seite! Das ist ein Layout</p>
    </header>

    <div class="container">

        @yield('content')

    </div>

    <footer>
        <a href="#"> Impressum</a>
        <a href="www.google.com" target="_blank"> Tape here</a>
    </footer>
</body>
</html>
