<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "Login"
 */
function db_benutzer() {
    $link = connectdb();
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
   // $passwort = hash('md5', $passwort);
    $sql1 = "SELECT * FROM datenbank.benutzer b WHERE b.email = '".$email."'";
    $result = mysqli_query($link, $sql1);
    if(!$result){
        $_SESSION['eingelogt'] = 'fehler aufgetretet';
    }else{
        $db_email = $result->fetch_assoc();
        if ($passwort == $db_email['passwort']){
            $_SESSION['eingelogt'] = 'angemeldet';
            echo 'Sie sind gut als '.$email.'angemeldet';
            $query = "UPDATE datenbank.benutzer SET letzteanmeldung = NOW() WHERE email = '".$email."'";
            $query1 = "UPDATE datenbank.benutzer SET anzahlanmeldungen = (anzahlanmeldungen + 1) WHERE email = '".$email. "'";

        }
        else{
            echo 'passwort falsch';
            $query = "UPDATE datenbank.benutzer SET letzterfehler = NOW() WHERE email = '".$email."'";
        }

    }

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}
