<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="uft-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="./css/index-stylesheet.css" media="screen">
</head>
<body>
@section('header')
    <header>
        <img src="">
        <ul>
            <li><a href="#ankündingung">Ankündingung</a> </li>
            <li><a href="#speisen">Speisen</a> </li>
            <li><a href="#zahlen">Zahlen</a> </li>
            <li><a href="#kontakt">Kontakt</a> </li>
            <li><a href="#wichtig">Wichtig für uns</a> </li>
        </ul>
    </header>
    <hr>
@show

<main>
    @yield('main')
</main>

@section('footer')
    <hr>
    <footer>
        <div>(c) E-Mensa Gmbh</div>
        <div id="footerMiddle">Julien Siewe, Serge Ngoune</div>
        <div><a href="impressum.html">Impressum</a></div>
    </footer>
@show
</body>
</html>
