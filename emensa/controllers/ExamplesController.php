<?php
require_once('../models/kategorie.php');
require_once ('../models/gericht.php');

class ExamplesController
{
    public function m4_6a_queryparameter(RequestData $rd) {
        $vars = [

            'name' => $rd->query['name'] ?? 'Mein Name',
            'rd' => $rd
        ];
        return view('examples.m4_6a_queryparameter', $vars);
    }



    public function m4_6b_kategorie() {
        $data = db_kategorie_select_all();

        return view('examples.m4_6b_kategorie', ['data' => $data]);
    }


    public function m4_6c_gerichte() {

        $data = db_gericht_2euro();

        return view('examples.m4_6c_gerichte', ['data' => $data]);
    }

    public function m4_6d_page(RequestData $request) {

        if($request->query['no'] === "1") {
            return view('examples.pages.m4_6d_page_1', []);
        } else if($request->query['no'] === "2") {
            return view('examples.pages.m4_6d_page_2', []);
        }
        else{
            return view('examples.pages.m4_6d_page_1', []);
        }

    }



}