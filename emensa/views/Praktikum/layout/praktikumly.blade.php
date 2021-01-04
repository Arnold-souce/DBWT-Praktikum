@include('Praktikum.includes.foot')
@include('Praktikum.includes.head')


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{'/css/E-mensa1.css'}}" rel="stylesheet">
</head>

<body >

    @section('navigation')
    @show

    <div>
    @yield('content')
    </div>

</body>

        @section('footer')
        @show

</html>