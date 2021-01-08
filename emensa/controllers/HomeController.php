<?php
require_once('../models/gericht.php');
require_once ('../models/login.php');

/* Datei: controllers/HomeController.php */
class HomeController
{



    public function index(RequestData $request) {
        return view('home', ['rd' => $request ]);
    }


    public function vldemo(RequestData $rd) {
        $data =db_gericht_select_all();
        return view('vl.vldemo', [
            'title'=>'Gerichteübersicht',
            'gerichte' => $data
        ]);
    }


    public function praktikum(RequestData $rd)
    {

        session_start();
        if (!isset($_SESSION['cnt'])) {
            $_SESSION['cnt'] = 0;
        } else {
            $_SESSION['cnt']++;
        }
        echo $_SESSION['cnt'];
        $data1 = db_benutzer();
        echo $data1;

        $data = db_select_gerichte();

        return view('Praktikum.praktikum', [
            'data' => $data,
            'data1' => $data1
        ]);

    }


////////////5

    public function anmeldung(RequestData $rd) {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('Praktikum.anmeldung', ['msg' => $msg]);
    }
    public function abmeldung(RequestData $rd)
    {
        unset($_SESSION['email']);
        unset($_SESSION['passwort']);
        header('location: praktikum');
        exit;
    }

}