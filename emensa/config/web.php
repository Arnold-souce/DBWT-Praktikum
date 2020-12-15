<?php
/**
 * Mapping of paths to controlls.
 * Note, that the path only support 1 level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as aspected
 */
return array(
    "/"            => "HomeController@index",
    "/demo"        => "DemoController@demo",
    '/dbconnect'   => 'DemoController@dbconnect',

    // Erstes Beispiel:
    '/m4_6a_queryparameter' => 'ExamplesController@m4_6a_queryparameter',
    'm4_6c_gerichte' => 'ExamplesController@m4_6c_gerichte',
    '/m4_6d_page' => 'ExamplesController@m4_6d_page',

    //route für Ely
    "/vldemo"      => "HomeController@vldemo",
    "/praktikum"   => "HomeController@praktikum"
);