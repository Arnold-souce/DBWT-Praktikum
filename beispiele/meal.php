<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_PARAM_SHOW_DESCRIPTION= 'show_description';
const GET_PARAM_SPRACHE = 'sprache';

$sprache=$_GET['sprache'];

if(!isset($_GET[GET_PARAM_SPRACHE])) {
    $sprache = "de";
}



/**
 * Liste aller möglichen Allergene.
 */
$allergens = array(
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch' )
;

$meal = [ // Kurzschreibweise für ein Array (entspricht = array())
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42   // Anzahl der verfügbaren Gerichte.
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];



 //Hier sind arrays für Übersetzung erstellt
$gericht=['en' => 'Meal', 'de'=>'Gericht'];
$description_btn=['en' => 'Description', 'de'=>"Bescreibung"];
$no_description_btn=['en' => 'Hide_Description', 'de'=>'Beschreibung_ausblenden'];
$allergene_titel =['en' => 'The allergens are', 'de'=>'Die allergene sind'];
$bewertung_titel = ['en' => 'Ratings (Total:', 'de'=>'Bewertungen (Insgesamt:'];
$senden_btn=['en' => 'Send', 'de'=>'Senden'];
$preise_titel=['en' => 'Prices :', 'de'=>'Preise :'];


$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (strpos(strtolower($rating['text']), strtolower($searchTerm)) !== false) {
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}

function calcMeanStars($ratings) : float { // : float gibt an, dass der Rückgabewert vom Typ "float" ist
    $sum = 0; // nicht sum=1 und i hat kein Nutzen

    foreach ($ratings as $rating) {
        $sum += $rating['stars'];

    }
    return $sum / count($ratings);
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Gericht: <?php echo $meal['name']; ?></title>
    <style type="text/css">
        * {
            font-family: Arial, serif;
        }
        .rating {
            color: darkgray;
        }
    </style>
</head>
<body>
<h1>  <?php echo $gericht["$sprache"];
            echo ":";
            echo $meal['name']; ?></h1>
<form method="get">
    <input type="submit" value=<?php echo $description_btn["$sprache"] ?> name="show_description">
</form>
<p><?php
        if(isset($_GET[GET_PARAM_SHOW_DESCRIPTION]))
             echo $meal['description'];
    ?></p>
<form method="get">
    <input type="submit" value=<?php echo $no_description_btn["$sprache"] ?> name="description_ausblenden">
</form>
<p><?php
        if(isset($_GET['description_ausblenden']))
              echo "";
?></p>



<!--Allergene ausgeben*/-->
<?php
$allergene_list="<ul>";
    foreach ($meal['allergens'] as $item){
    $allergene_list.="<li>$allergens[$item]</li>";
    }
    $allergene_list.="</ul>";
echo $allergene_titel["$sprache"];
echo ": <br> $allergene_list";
?>
<!--Ende-->

<h2><?php echo $preise_titel["$sprache"] ?></h2>
Intern: <?php echo number_format( $meal['price_intern'],2); ?> &euro; <br>
Extern: <?php echo number_format( $meal['price_extern'],2); ?> &euro; <br>


<h1><?php echo $bewertung_titel["$sprache"];
          echo calcMeanStars($ratings); ?>)</h1>
<form method="get">
    <label for="search_text">Filter:</label>
    <input id="search_text" type="text" name="search_text" value="<?php echo $_GET[GET_PARAM_SEARCH_TEXT]; ?>">
    <input type="submit" value="<?php echo $senden_btn["$sprache"]; ?>" >
</form>
<table class="rating">
    <thead>
    <tr>
        <td>Autor</td>
        <td>Text</td>
        <td>Sterne</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($showRatings as $rating) {
        echo "<tr>
                <td class='rating_author'>{$rating['author']}</td>
                <td class='rating_text'>{$rating['text']}</td>
                <td class='rating_stars'>{$rating['stars']}</td>
              </tr>";
    }

    ?>
    </tbody>
</table>

<?php
echo "<a href='meal.php?sprache=en'>Englisch</a><br>";
echo "<a href='meal.php?sprache=de'>Deutsch</a>";
?>

</body>
</html>