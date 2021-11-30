<?php
session_start();
require('wd_all.php');
require('wd_conf.php');

if (!isset($_POST["referencja_do_filmu"])) {
    $_POST["referencja_do_filmu"] = "";
}
$nazwa = $_POST["nazwa"];
$komentarz = $_POST["komentarz"];
$kategoria = $_POST["kategoria"];
$rozszerzenie = $_POST["rozszerzenie"];
$grupa = $_POST["grupa"];
$autor = $_POST["autor"];
$referencja_do_filmu = $_POST["referencja_do_filmu"];
$null = NULL;
$wlasnosc_sr = pow(2, $_SESSION["id_u"]);
if ($grupa == "grupowy") {
    $wlasnosc_sr = wd_ustal_wlasnosc_sr($_SESSION["id_gr"]);
};



if (is_uploaded_file($_FILES["plik"]["tmp_name"])) {
    $dane = file_get_contents($_FILES["plik"]['tmp_name']);
    $zapytanie = "INSERT INTO `zdjecia_i_filmy` (`nazwa`,`komentarz`,`referencja_do_filmu`,`wlasnosc_sr`,`rozszerzenie`,`kategoria`,`autor`, `zdjecie_sr`) VALUES ( ? ,?, ? , ? , ? , ? , ?, ?)";
    wd_zapisz_plik($zapytanie, $_POST, $wlasnosc_sr, $dane, $referencja_do_filmu);
    header("Location: wp_galeria_sr.php");
}
