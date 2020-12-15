
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Hier sind die Gerichte</title>
    {{-- <link  rel="stylesheet" type="text/css" href="{{asset('../../public/css/css_example.css')}}" />--}}
</head>
<body>


<table>
    <thead>
        <th>Gericht</th>
        <th>Preis</th>
    </thead>
    <tbody>
    @forelse($data as $a)
      <tr>
          <td>{{$a['name']}}</td>
           <td> {{$a['preis_intern']}} €</td>
      </tr>
    @empty
        <li>Keine Daten vorhanden.</li>
    @endforelse
    </tbody>
</table>

</body>
</html>
