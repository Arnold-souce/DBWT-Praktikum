<html>
<head>
    <title>Wunschgericht hinzufügen</title>
    <style>
        .form{
            border: 2px solid black;
            margin: 10px;
            width: 400px;
            height: 450px;
            padding: 4px;
        }

        .info{
            margin-bottom: 10px;

        }

        #title{
            text-align:center;
            padding-bottom: 20px;
            padding-top: 20px;
            font-size: 30px;
            font-family: "Bookman Old Style" ;
        }

        #alert{
            background-color: limegreen;
        }

    </style>
</head>
<body>
<form action="wunschgericht.php" method="post" class="form">
    <div id="title" class="info">Wunschgericht Melden</div>
    <div class="info">
        <label for="name"> Was ist Ihr Wunschgericht?</label>
        <input type="text" maxlength="80" id="name" required name="gname">
    </div>
    <div class="info">
        <label for="beschreibung">Beschreibung:</label>
        <input type="text" maxlength="800" id="beschreibung" required name="beschreibung">
    </div>
    <div class="info">
        <label for="zubereitungshinweise">zubereitungshinweise:</label>
        <input type="text" maxlength="800" id="zubereitungshinweise" required name="zubereitungshinweise">
    </div>
    <div class="info">
        Um Ihre Einträge zu speichern brauchen wir Ihren Namen und Ihre E-Mail Adresse.<br>
        <label for="username">Name:</label> <input type="text" maxlength="80" id="username" name="username"><br><br>
        <label for="email"> E-Mail:</label> <input type="text" maxlength="80" id="email" required name="email"><br>
    </div>
    <div class="info">
        <input type="submit" value="Wunsch Abschicken" name="senden">
    </div>


    <?php

    if(isset($_POST['senden'])) {

        $link = mysqli_connect("localhost", "root", "1234", "wunschgerichtsdatenbank");

        if (!$link) {
            echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
            exit();
        }

        $gname = $_POST['gname'];
        $gname = mysqli_real_escape_string($link,$gname);
        $beschreibung = $_POST['beschreibung'];
        $beschreibung = mysqli_real_escape_string($link,$beschreibung);
        $zubereitungshinweis = $_POST['zubereitungshinweise'];
        $zubereitungshinweis = mysqli_real_escape_string($link,$zubereitungshinweis);
        $erstelldatum = date('Y-m-d H:i:s', time());    //h m s
        $email = $_POST['email'];
        $email = mysqli_real_escape_string($link,$email);
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $username = mysqli_real_escape_string($link,$username);
        }
        if ($_POST['username']=="") {
            $username = "anonym";
        }





        $sqll = "insert into ersteller (username, email) values ('$username','$email')";

        $result = $link->query($sqll);
        if (!$result) {
            echo "Fehler während der 1. Abfrage: ", mysqli_error($link);
            exit();
        }



        $sql = "insert into wunschgericht (gerichtsname, beschreibung, zubereitungshinweis,erstelldatum,email) values
        ('$gname','$beschreibung','$zubereitungshinweis','$erstelldatum','$email')";

        $result = $link->query($sql);
        if (!$result) {
            echo "Fehler während der 2. Abfrage: ", mysqli_error($link);
            exit();
        }

        mysqli_free_result($result);

        mysqli_close($link);

        echo '<div id="alert" ><strong>Success!</strong> '.'Ihr Wunsch wurde erfolgreich gespeichert'.'</div>';

    }

    ?>
</form>
</body>
</html>
