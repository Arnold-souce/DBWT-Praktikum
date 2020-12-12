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
    <title> Ihre E-Mensa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="E-Mensa.css" rel="stylesheet">
</head>

<body id="ganz">


<div id="beginn">
    <div id="logo">
        E-Mensa Logo

    </div>
    <div>
        <div id="beginn1">
            <div>
                <a class="link" href="#ankündigung">Ankündigung</a>
            </div>
            <div>
                <a class="link" href="#speisen">Speisen</a>
            </div>
            <div>
                <a class="link" href="#zahlen">Zahlen</a>
            </div>
            <div>
                <a class="link" href="#kontakt">Kontakt</a>
            </div>
            <div>
                <a class="link" href=#wichtig>Wichtig für uns</a>
            </div>
        </div>
    </div>

</div>
<div id="reception">

    <div></div>
    <div id="mittel">
        <img id= "img2" src="img\wilkommwn.jpeg" alt="Wilkommen-Bild">
        <div id ="ankündigung">
            <h2 id = "text1"> Bald gibt es Essen auch Online ;)</h2>

            <label for="textarea1"></label><textarea id="textarea1" name="text" rows="8" cols="84">
            Hier sollen wir noch dieser Text reinschreiben.
            Das konnte ich nur schwer lesen
</textarea>
        </div>
        <div id ="speisen">
            <h2 id = "text2" > Köstlichtkeiten,die Sie erwarten</h2>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <?php

        $db = new  mysqli("localhost","root","1234","datenbank");

        if ($db -> connect_error){
            echo "error";
            die ("Verbindung fehlgeschlagen: ".$db->connect_error);
        }

        $sql = "SELECT `gericht`.`name` as gname,`gericht`.`Preis_intern` as preis_intern,`gericht`.`Preis_extern` as preis_extern, ( a.`name`) as allergene_name,group_concat( a.`code`) as code FROM `gericht`
LEFT JoIN `gericht_hat_allergen` on `gericht_hat_allergen`.`gericht_id` =  `gericht`.`id`  LEFT join `allergen` a on gericht_hat_allergen.code = a.code
group by  gericht.name
limit 5";


        if ($db->query($sql)){

            echo "well done";
        }
        else {
            echo "Hat nicht geklappt ". $db->error;
        }
        $result = $db->query($sql);
        $strtable = '<table class="table table-bordered" id="table1">
            <thead>
            <tr>
                <th >Name</th>
                <th scope="col">Preis Intern</th>
                <th scope="col">Preis Extern</th>
                <th scope="col">Allergen Code</th>
                <th scope="col">Picture</th>

            </tr>
            </thead>
            
<tbody>';
        echo htmlspecialchars_decode(htmlspecialchars($strtable));

        while ($row =mysqli_fetch_assoc($result)){
            echo'<tr>';
            echo '<td>', $row['gname'],'</td> <td>', $row['preis_intern'],'&euro;','</td> <td>', $row['preis_extern'],'&euro;','</td> <td>', $row['code'],"<td> <img src='img/Speise2.jpg' alt 'nichts zu zeigen' height ='100' width ='150'> </td>";
            echo'</tr>';
        }
        echo'</table>';





        $db -> close();


        ?>

        <div>

            Klicken Sie <a href="wunschgericht.php" > Hier  </a> um Ihr Wunschgericht zu melden<br><br><br>
        </div>

        <div id="zahlen">
            <h2 id = "text4" > E-Mensa in Zahlen</h2></div>
        <div id="beginn2">
            <div>
                <h5 > <input type="text" class="form-control placeholder" id="placeholder1" value="<?php

                    include("counter.php");
                    echo $zahl;

                    ?>" placeholder="X" readonly> Besuche</h5>
            </div>
            <div>
                <h5 id="text5">  <input type="text" class="form-control placeholder" id="placeholder2" value="<?php
                    $file1 = fopen('Daten.txt', 'r+');
                    if (!$file1) {
                        die('Öffnen fehlgeschlagen');

                    }
                    $anmeldungen = 0;
                    while(!feof($file1)){
                        fgets($file1,4096);
                        $anmeldungen += 1;
                    }

                    fclose($file1);
                    echo ($anmeldungen-1);
                    ?>" placeholder="Y" readonly> Anmeldungen zum Newsletter</h5>
            </div>
            <div>
                <h5 id ="text6">  <input type="text" class="form-control placeholder" id="placeholder3" value="<?php

                    $db = new  mysqli("localhost","root","1234","datenbank");

                    if ($db -> connect_error){
                        echo "error";
                        die ("Verbindung fehlgeschlagen: ".$db->connect_error);
                    }

                    $sql = "SELECT COUNT(*) as numgericht FROM `gericht`";


                    if ($db->query($sql)){
                    }
                    else {
                        echo "Hat mit der DB nicht geklappt ". $db->error;
                    }
                    $result = $db->query($sql);
                    while ($row =mysqli_fetch_assoc($result)) {
                        echo $row['numgericht'];
                    }
                    ?>" placeholder="Z" readonly> Speisen</h5>
            </div>
        </div>

        <div id ="kontakt">
            <h2 id = "text3"> Interesse geweckt? wir informieren Sie!</h2></div>

        <form  method="post"  >

            <div class="form-row" id ="form">
                
                <div class="col-md-4 mb-3">
                    <label for="validationDefault01">Ihre Name</label>
                    <input type="text" name = "name" class="form-control" id="validationDefault01" value="Vorname" >

                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationDefault02">Ihre Email</label>
                    <input type="text" name = "email" class="form-control" id="validationDefault02" value="Email">
                </div>
                <div class="col-md-4 mb-3">
                    Newsletter bitte in:
                    <label>
                        <select class="form-control form-control-lg" value="sprache">

                            <option name="sprachoption" value="Deutsch">Deutsch</option>
                            <option name="sprachoption" value="Spanisch">Spanisch</option>
                            <option name="sprachoption" value="Französisch">Französisch</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <input name = "check1" class="form-check-input" type="checkbox" value="aktiv" id="invalidCheck2">
                    <label class="form-check-label" for="invalidCheck2">
                        Den Datenschutzbestimmungen stimme ich zu
                    </label>
                </div>
                <div class="col-md-2 mb-3">

                </div>
                <div class="col-md-4 mb-3">
                    <button class="btn btn-primary" type="submit" href="#form">Zum Newsletter anmelden</button>
                </div>
            </div>
<?php

if($_SERVER['REQUEST_METHOD']==='POST') {
    $errors = [];
}
if(empty($_POST['name'])){
    $errors['name'] = 'Sie müssen Ihre Name schreiben.';
    echo '<div class="alert alert-danger" role="alert">   '.$errors['name'].' </div>';

}
elseif (empty($_POST['email'])){
    $errors['email'] = 'Sie müssen Ihre Adresse geben.';
    echo '<div class="alert alert-danger" role="alert">   '.$errors['email'].' </div>';
}
elseif (!($_POST['check1'])){
    $errors['check1']= 'Sie mÜssen erst bestädigen';
    echo '<div class="alert alert-danger" role="alert">   '.$errors['check1'].' </div>';

}
$email = $_POST['email'] ?? NULL;
if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    $errors['email_check'] = '„Ihre E-Mail entspricht nicht den Vorgaben';
    echo '<div class="alert alert-danger" role="alert">   ' . $errors['email_check'] . ' </div>';

}
elseif(strpos($_POST['mail'], "trashmail") == true && strpos($_POST['mail'], "byom") ==
    true && strpos($_POST['mail'], "muellmail") == true && strpos($_POST['mail'],
        "spoofmail") == true){
    $errors['email_check2'] = 'Keine Trashmails';
    echo '<div class="alert alert-danger" role="alert">   '.$errors['email_check2'].' </div>';
}
elseif($errors['name'] == '' && $errors['email'] == '' && ($_POST['check1']) && $errors['email_check']==''){
$errors['keine'] = 'Ihre Daten wurden erfolgreich gespeichert';
echo '<div class="alert alert-success" role="alert" ><strong>Success!</strong> '.$errors['keine'].'   </div>';
    $Speicherung = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'sprache'=>$_POST['sprachoption']
    ];
    $file1 = fopen('Daten.txt', 'a+');
    if (!$file1) {
        die('Öffnen fehlgeschlagen');

    }


      //Daten in nur einer Zeile gespeichert; Sprrache muss noch ausgewählt werden
        $line=$Speicherung['name'].";".$Speicherung['email'].";".'Deustch'."aktiv\n";
       fwrite($file1, $line);


       //Mit dem unten kommentiertien Code waren die Bemutzerdaten in je 2 Zeilen gespeichert.
   /* foreach($Speicherung as $key => $txt){
        $line = "$key;$txt\n";
        fwrite($file1, $line);
    }
    fclose($file1);*/
}
?>
        </form>


        <div id ="wichtig">
            <h2 id = "text7"> Das ist uns wichtig</h2>

        </div>


        <ul id="list1">
            <li>Beste frische saisonale Zutaten</li>
            <li>Ausgewogene abwechslungsreiche Gerichte</li>
            <li>Sauberkeit</li>
        </ul>




        <h2 id = "text8"> Wir freuen uns auf Ihren Besuch</h2>






        <div></div>
    </div>
</div>

<footer id="foot">
    <div id ="foot1">
        <div id="foot2">
            &copy;E-Mensa GmbH
        </div>
        <div id="foot3">
            <h6 >Arnold kamdem,
                Elysee Tchinda,
                Tobias Liermann</h6>
        </div>
        <div id="foot4">
            <a class="link" href="">Impressum</a>
        </div>
    </div>

</footer>



</body>
</html>
