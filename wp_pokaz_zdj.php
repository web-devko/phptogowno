<?php
require('wb_all.php');

if (isset($_GET['id_plik'])) {
    $row = pobierz_zdjecie($_GET['id_plik']);
    header("content-type:jpg");
    echo $row['zdjecie_sr'];
}
