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
        <img id= "img2" src="wilkommwn.jpeg" alt="Wilkommen-Bild">
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
        <table class="table table-bordered" id="table1">
            <thead>
            <tr>
                <th colspan="3"></th>
                <th scope="col">Preis Intern</th>
                <th scope="col">Preis Extern</th>
                <th scope="col">Picture</th>

            </tr>
            </thead>
            <?php $file=fopen("Speise.txt", r);//öffnen einer Datei(data.txt) im Read modus
            $array_gerichte=[];
            while ($inhalt = fgets($file, 4096)) {//der Inhalt der Datei
                $array_gerichte[] = $inhalt; // wird hier ausgelesen und
            } //in $array_gerichte gespeichert
            fclose($file);


            ?>
            <tbody>

            <tr>
                <td colspan="3"><?php echo $array_gerichte[0] ?></td>
                <td><?php echo $array_gerichte[1] ?></td>
                <td><?php echo $array_gerichte[2] ?></td>
                <td><?php echo "<img src=$array_gerichte[3] alt='geht
nicht' height ='100' width='150'> " ?></td>


            <tr>
                <td colspan="3"><?php echo $array_gerichte[4] ?></td>
                <td><?php echo $array_gerichte[5] ?></td>
                <td><?php echo $array_gerichte[6] ?></td>
                <td><?php echo "<img src=$array_gerichte[7] alt='geht
nicht' height ='100' width='150'>" ?></td>
            <tr>
                <td colspan="3"><?php echo $array_gerichte[8] ?></td>
                <td><?php echo $array_gerichte[9] ?></td>
                <td><?php echo $array_gerichte[10] ?></td>
                <td><?php echo "<img src=$array_gerichte[11] alt='geht
nicht' height ='100' width='150'> " ?></td>
            <tr>
                <td colspan="3"><?php echo $array_gerichte[12] ?></td>
                <td><?php echo $array_gerichte[13] ?></td>
                <td><?php echo $array_gerichte[14] ?></td>
                <td><?php echo "<img src=$array_gerichte[15] alt='geht
nicht' height ='100' width='150'> " ?></td>
            </tbody>
            <tr>
                <td colspan="3" >...</td>
                <td >...</td>
                <td >...</td>
                <td>...</td>
                <td>...</td>
            </tr>



        </table>
        <div id="zahlen">
            <h2 id = "text4" > E-Mensa in Zahlen</h2></div>
        <div id="beginn2">
            <div>
                <h5 > <input type="text" class="form-control placeholder" id="placeholder1" value="X" placeholder="X" readonly> Besuche</h5>
            </div>
            <div>
                <h5 id="text5">  <input type="text" class="form-control placeholder" id="placeholder2" value="Y" placeholder="Y" readonly> Anmeldungen zum Newsletter</h5>
            </div>
            <div>
                <h5 id ="text6">  <input type="text" class="form-control placeholder" id="placeholder3" value="Z" placeholder="Z" readonly> Speisen</h5>
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
                        <select class="form-control form-control-lg">

                            <option>Deutsch</option>
                            <option>Spanisch</option>
                            <option>Französisch</option>
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
                    'email' => $_POST['email']
                ];
                $file1 = fopen('Daten.txt', 'w+');
                if (!$file1) {
                    die('Öffnen fehlgeschlagen');

                }
                foreach($Speicherung as $key => $txt){
                    $line = "$key;$txt\n";
                    fwrite($file1, $line);
                }
                fclose($file);
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