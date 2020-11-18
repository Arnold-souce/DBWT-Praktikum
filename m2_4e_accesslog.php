<?php

$file = fopen("./accesslog.txt", "a");
$date=$_SERVER['REQUEST_TIME'];
$date=date("d.m.Y - H:i", $date);
$server_adresse=$_SERVER['SERVER_ADDR'];
$benutzer_adresse=$_SERVER['REMOTE_ADDR'];
$_browser_daten =$_SERVER['HTTP_USER_AGENT'];

$zeile='Datum:'."$date  ".'Serv. Adress:'."$server_adresse  ".'Client Adress:'."$benutzer_adresse  ".'Browser:'."$_browser_daten"."/r/n";

file_put_contents('accesslog.txt', $zeile);
fclose($file);


?>