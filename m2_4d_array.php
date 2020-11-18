<html lang="de">
<head>
    <title>Array</title>
</head>
<body>

<?php
$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];


$famousMeals_list="<ol>";

foreach($famousMeals as $gericht){

    $famousMeals_list.="<li>";

   foreach ($gericht as $eigenschaft) {

       if(!is_array($eigenschaft)){
           $famousMeals_list.="$eigenschaft<br>";
       }else{

           $eigenschaft_z_a=arsort($eigenschaft);

           foreach ($eigenschaft as $jahr){
              $famousMeals_list.="$jahr, ";
          }
       }

       
   }

    $famousMeals_list.="</li><br>";

}

$famousMeals_list.="</ol>";

echo "$famousMeals_list";

?>

</body>
</html>






