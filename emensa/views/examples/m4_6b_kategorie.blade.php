
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Beispiel: Daten aus der Datenbank</title>
        <link  rel="stylesheet" type="text/css" href='/css/css_example.css' />
    </head>
    <body>


        <p>  Hier sind alle Kategorien </p>

        <ul>

            @for($i=0; $i<sizeof($data); $i++)

                @if($i % 2 !=0)
                    <li>{{$data[$i]['name']}}</li>
                @else
                    <li><span id="fetterelement">{{$data[$i]['name']}}</li></span>
                @endif
            @endfor


        </ul>

    </body>
    </html>