<?php

require('wd_all.php');


function wb_przygotuj_galeria_sr($id_u)
{
    $tablica = wd_pobierz_wszystko_dla_sr($id_u);
    return ($tablica);
}
function pobierz_zdjecie($id_m)
{
    $zapytanie_SQL = "SELECT * FROM `zdjecia_i_filmy` WHERE id_m=" . $id_m;
    return wd_wykonaj_zapytanieSQL_sr($zapytanie_SQL);
}

?>
