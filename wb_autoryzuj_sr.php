<?php
session_start();
require('wd_all.php');

$pin = $_POST["pin"];

$mysqli = new mysqli("localhost:3306", "root", "", "project_sr");

$zapytanie = "SELECT id_u, id_grupy from `uzytkownicy_sr` WHERE pin = ?";


$dane = wd_sprawdz_autoryzacje_sr($zapytanie, $pin);
$_SESSION["id_u"] = $dane[0];
$_SESSION["id_gr"] = $dane[1];
header("Location: wp_galeria_sr.php");
