
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Beispiel: Daten aus der Datenbank</title>
</head>
<body>


<p>  titel </p>

<ul>
    @forelse($data as $a)
        <li>{{$a['name']}}</li>
    @empty
        <li>Keine Daten vorhanden.</li>
    @endforelse
</ul>

</body>
</html>
