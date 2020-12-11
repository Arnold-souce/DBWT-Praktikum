<?php
function sortArrayByFields($arr, $fields)
{
    $sortFields = array();
    $args       = array();

    foreach ($arr as $key => $row) {
        foreach ($fields as $field => $order) {
            $sortFields[$field][$key] = $row[$field];
        }
    }

    foreach ($fields as $field => $order) {
        $args[] = $sortFields[$field];

        if (is_array($order)) {
            foreach ($order as $pt) {
                $args[$pt];
            }
        } else {
            $args[] = $order;
        }
    }

    $args[] = &$arr;

    call_user_func_array('array_multisort', $args);

    return $arr;
}
?>
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
    <title> Abonnenten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="E-Mensa.css" rel="stylesheet">
    <style>
        table ,tr,td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form method="get">
    <select id="Sortierung" name="Sort">
        <option>nach Name</option>
        <option>nach Mail</option>
    </select>

    <button type="submit" name="submit" id="submit">Sortiere!</button>
</form>
<form method="get">
    <input type="text" id="Filterung" name="filter">
    <button type="submit" name="submit" id="submit1">Filtern</button>
</form>
<?php

if ($file = fopen("Daten.txt", "r")) {
    $inhalt = [];

        $gesInhalt = [];
        $i = 0;
    while (!feof($file)) {
        $textperline = fgets($file);
        $keys = ['name','E-Mail','Sprache','Datenschutz'];
        $inhalt  = explode(";",$textperline);
        $gesInhalt[$i] = array_combine($keys,$inhalt);
        $i++;

    }
    array_pop($gesInhalt);
    if($_GET['Sort'] == 'nach Name') {
        $gesInhalt = sortArrayByFields($gesInhalt,array('name' => SORT_ASC));
    } elseif ($_GET['Sort'] == 'nach Mail') {
        $gesInhalt = sortArrayByFields($gesInhalt,array('E-Mail' => SORT_ASC));
    }
    if(isset($_GET['filter']) && $_GET['filter'] != null) {
        $suche = strtolower(htmlspecialchars($_GET['filter']));
        $stellen = [];
        $i = 0;

        foreach ($gesInhalt as $inhalt) {
            if ((strpos(strtolower($inhalt['name']),$suche) === false)){

                array_push($stellen,$i);

            }
            $i++;
        }
        foreach ($stellen as $value){
            unset($gesInhalt[$value]);
        }

    }

    echo "<table>\n";

    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td>E-Mail</td>";
    echo "<td>Sprache</td>";
    echo "<td>Datenschutz</td>";
    echo "</tr>"."\n";
    // Tabelle in HTML darstellen

    foreach ($gesInhalt as $inhalt) {
        echo "<tr>";
        foreach ($inhalt as $item)    // jedes Element $item der Zeile $row durchlaufen
            echo "<td>$item</td>";
        echo "</tr>\n";

    }
    echo "</table>\n";

    fclose($file);
}

?>

</body>
</html>