<?php
$termin[] = array('Datum' => 20201208,
    'Ort'   => "Wangen",
    'Band'  => "cOoL RoCk oPaS");

$termin[] = array('Datum' => 20200311,
    'Ort'   => "Stuttgart",
    'Band'  => "Die Hosenbodenband");

$termin[] = array('Datum' => 20200628,
    'Ort'   => "Tübingen",
    'Band'  => "flying socks");

$termin[] = array('Datum' => 20200628,
    'Ort'   => "Stuttgart",
    'Band'  => "flying socks");

echo "<pre>";
print_r ( $termin );

foreach ($termin as $nr => $inhalt)
{
    $band[$nr]  = strtolower( $inhalt['Band'] );
    $ort[$nr]   = strtolower( $inhalt['Ort'] );
    $datum[$nr] = strtolower( $inhalt['Datum'] );
}

array_multisort($datum, SORT_DESC, $termin);

print_r ( $termin );
?>