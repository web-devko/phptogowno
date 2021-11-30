<?php

function wd_ustal_id_sr()
{
    require('wd_conf.php');
    $baza = mysqli_connect($adres_ip_serwera_BD, $login_BD, $haslo_BD, $nazwa_BD);
    if (mysqli_connect_errno()) {
        echo "Wystąpił bląd polaczenia z bazą";
    }

    $wynik = mysqli_query($baza, "SELECT MAX(id_m) As id_max FROM zdjecia_i_filmy");
    while ($row = mysqli_fetch_array($wynik)) {
        $nr = $row['id_max'];
    };
    $nr = $nr + 1;

    mysqli_close($baza);
    return $nr;
}

function wd_sprawdz_autoryzacje_sr(&$zapytanie_SQL, $pin_string)
{
    require('wd_conf.php');

    $baza = new mysqli("localhost:3306", "root", "", "project_sr");
    if (mysqli_connect_errno()) {
        echo "Wystąpił bląd polaczenia z bazą";
    }
    $dane[0] = 0;
    $dane[1] = 0; 
    $stmt = $baza->prepare($zapytanie_SQL);
    $stmt->bind_param("s", $pin_string);
    $stmt->execute();

    $stmt->bind_result($id_u, $id_grupy);
    $stmt->fetch();
    $dane[0] = $id_u;
    $dane[1] = $id_grupy;

    mysqli_close($baza);
    return $dane;
}


function wd_zapisz_plik(&$zapytanie_SQL, $POST, $wlasnosc_sr, &$dane, $referencja_do_filmu)
{

    require('wd_conf.php');
    $baza = new mysqli($adres_ip_serwera_BD, $login_BD, $haslo_BD, $nazwa_BD);
    if (mysqli_connect_errno()) {
        echo "Wystąpił bląd polaczenia z bazą";
    }
    $null = NULL;
    $stmt = $baza->prepare($zapytanie_SQL);
    $stmt->bind_param("sssisssb", $POST['nazwa'], $POST['komentarz'], $referencja_do_filmu, $wlasnosc_sr, $POST['rozszerzenie'], $POST['kategoria'], $POST['autor'],  $null);
    if (isset($dane)) {
        $stmt->send_long_data(7, $dane);
    }

    $stmt->execute();
}
function wd_ustal_wlasnosc_sr($id_grupy)
{
    require('wd_conf.php');

    $baza = mysqli_connect($adres_ip_serwera_BD, $login_BD, $haslo_BD, $nazwa_BD);
    if (mysqli_connect_errno()) {
        echo "Wystąpił bląd polaczenia z bazą";
    };

    $zapytanie_SQL = "SELECT * FROM uzytkownicy_sr WHERE id_grupy=" . $id_grupy;
    $wynik = mysqli_query($baza, $zapytanie_SQL);

    $i = 1;
    $dane = 0;
    while ($row = mysqli_fetch_array($wynik)) {
        $dane = $dane + pow(2, $row["id_u"]);
        $i = $i + 1;
    };

    return $dane;
    mysqli_close($baza);
}

function wd_pobierz_wszystko_dla_sr($id_u)
{
    require('wd_conf.php');
    $dane = null;
    $baza = mysqli_connect($adres_ip_serwera_BD, $login_BD, $haslo_BD, $nazwa_BD);
    if (mysqli_connect_errno()) {
        echo "Wystąpił bląd polaczenia z bazą";
    }

    $user_bit = pow(2, $id_u);
    $zapytanie = "SELECT * FROM zdjecia_i_filmy WHERE (wlasnosc_sr&" . $user_bit . ")>0";
    $wynik = mysqli_query($baza, $zapytanie);

    $i = 1;
    while ($row = mysqli_fetch_array($wynik)) {
        $dane[$i] = $row;
        $i = $i + 1;
    };

    return $dane;
    mysqli_close($baza);
}
function wd_wykonaj_zapytanieSQL_sr(&$zapytanie_SQL)
{

    require('wd_conf.php');
    $baza = mysqli_connect($adres_ip_serwera_BD, $login_BD, $haslo_BD, $nazwa_BD);
    if (mysqli_connect_errno()) {
        echo "Wystąpił błąd połączenia z bazą";
    }
    $wynik = mysqli_query($baza, $zapytanie_SQL);
    // if (gettype($wynik) != 'mysqli_result') {
    //     return;
    // }
    $rows = mysqli_fetch_array($wynik);
    mysqli_close($baza);
    return $rows;
}
