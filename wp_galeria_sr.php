<?php
session_start();
require('wp_html.php');
require('wb_all.php');
$lokacja_plikow = './dane_sr/';
wp_naglowek_sr();
$user = $_SESSION["id_u"];
$dane = wb_przygotuj_galeria_sr($user);

foreach ($dane as $row) {
if ($row['zdjecie_sr'] ==NULL ) {
  echo "<div><a href=".$lokacja_plikow. "".$row['referencja_do_filmu']. "." .$row['rozszerzenie']." >".$row['nazwa']." </a> </div>"; 
} else {
 echo "<div><a href=wp_pokaz_zdj.php?id_plik=".$row['id_m']." target=\"_blank\">".$row['nazwa']." </a></div>";  
 }
};
if($user > 0) {
  wp_dodaj_zdj_sr();
  wp_dodaj_film_sr();
}
wp_stopka_sr();
