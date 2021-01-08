<?php
require_once('../models/kategorie.php');
require_once('../models/login.php');

class ExampleController
{
    public function anmeldung_verifizieren(RequestData $rd)
    {
        $email = $rd->query['email'] ?? false;
        // $email = $_POST['email'] ?? false;
        $password = $rd->query['password'] ?? false;
// Überprüfung Eingabedaten
        $_SESSION['login_result_message'] = null;
        if (erfolgreich) {
            $_SESSION['login_ok'] = true;
            $target = $_SESSION['target'];
            header('Location: /' . $target);
        } else {
            $_SESSION['login_result_message'] =
                'Benutzer- oder Passwort falsch';
            header('Location: /anmeldung');
        }
    }
}