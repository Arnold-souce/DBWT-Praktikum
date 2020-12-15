<?php
require_once('../models/gericht.php');

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
        $data = db_select_gerichte();
        return view('Praktikum.praktikum', [
            'data' => $data
        ]);
    }





}