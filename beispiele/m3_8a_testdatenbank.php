<?php ?>
<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Arnold, Kamdem, 3192203
- Tobias, Liermann, 3126774
-Elysee, Tchinda, 3209889
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>DB-Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="Werbeseite/E-Mensa.css" rel="stylesheet">
    <style>
        table ,tr,td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php

$link = mysqli_connect("localhost","root","aachen123","emensawerbeseite");

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}
$sql = "SELECT id, name, beschreibung FROM gericht";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "Fehler während der Abfrage: ", mysqli_error($link);
    exit();
}
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>', $row['id'], ':', $row['name'], '</li>';
}
mysqli_free_result($result);
mysqli_close($link);
?>

</body>
</html>