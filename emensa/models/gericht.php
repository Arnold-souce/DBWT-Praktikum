<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
    $link = connectdb();

    $sql = "SELECT id, name, beschreibung FROM gericht ORDER BY name";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

function db_gericht_2euro(){

    $link = connectdb();

    $sql = "SELECT name, preis_intern FROM gericht where preis_intern > 2 order by name desc ";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;

}



function db_select_gerichte() {
    $link = connectdb();

    $sql = "SELECT `gericht`.`name` as gname,`gericht`.`Preis_intern` as preis_intern,`gericht`.`Preis_extern` as preis_extern, 
                ( a.`name`) as allergene_name,group_concat( a.`code`) as code,
                 (k.`bildname`) as bildname FROM `gericht`
                LEFT JoIN `gericht_hat_allergen` on `gericht_hat_allergen`.`gericht_id` =  `gericht`.`id` 
                LEFT join `allergen` a on gericht_hat_allergen.code = a.code
                LEFT JOIN gericht_hat_kategorie ghk on gericht.id = ghk.gericht_id 
                LEFT JOIN kategorie k on k.id = ghk.kategorie_id
                group by  gericht.name
                limit 5 ";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}