<?php
session_start();
require_once('../models/gericht.php');
require_once('../models/login.php');
class anmeldung_verifizieren
{
    public function verifizieren(){
        $link = connectdb();

        if (isset($_POST['email']) and isset($_POST['password']))
        {
            $email = $_POST['email'];
            $passwort = $_POST['passwort'];
        }

        else
        {
            $email = '';
            $passwort = '';
        }


//$passwort = hash('md5', $passwort);
        $sql1 = "SELECT * FROM datenbank.benutzer b WHERE b.email = '" . $email . "'";
        $result = mysqli_query($link, $sql1);
        if (!$result) {
            $_SESSION['eingelogt'] = 'fehler aufgetretet';
        } else {
            $db_email = $result->fetch_assoc();
            if ($passwort == $db_email['passwort']) {
                $_SESSION['eingelogt'] = 'angemeldet';
                //echo 'Sie sind gut als '.$email.'angemeldet';
                $query = "UPDATE datenbank.benutzer SET letzteanmeldung = NOW() WHERE email = '" . $email . "'";
                $query1 = "UPDATE datenbank.benutzer SET anzahlanmeldungen = (anzahlanmeldungen + 1) WHERE email = '" . $email . "'";
                header('location:/praktikum');
            } else {
                header('location:/anmeldung');
                //echo 'passwort falsch';
                $query = "UPDATE datenbank.benutzer SET letzterfehler = NOW() WHERE email = '" . $email . "'";
                $_SESSION['eingelogt'] = 'nicht angemeldet';
            }
        }
    }
}