<!DOCTYPE html>

<html lang="de">
<head>
    <title>@yield('title')</title>
</head>

<body >
<header>
    @section('header')
        Kopfbereich
    @show
</header>
<nav>
    @section('navigation')
        navigation
    @show
</nav>
<main>
    @section('main')
    @show
</main>
<footer>
    copyright
</footer>
</body>
</html>


