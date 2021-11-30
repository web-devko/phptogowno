<?php

function wp_naglowek_sr()
{
  echo "<!Doctype html><html>";
  echo "<head><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /><link rel=\"stylesheet\" href=\"style.css\"></head><body>";
  echo "";
}

function wp_stopka_sr()
{
  echo "</body></html>";
}

$form_dodaj_zdj_sr = '
    <FORM method="POST" action="wb_dodaj_zdj_sr.php" ENCTYPE="multipart/form-data">
    <br> Nazwa zdjęcia: <input type="text" name="nazwa"> <br> 
    <br> Komentarz: <input type="text" name="komentarz"> <br> 
    <br> Kategoria: <input type="text" name="kategoria"> <br> 
    <br> Rozszerzenie: <input type="text" name="rozszerzenie"> <br> 
    <br> Autor: <input type="text" name="autor"><br> 
    <br> Obraz: <input type="file" name="plik"> <br> 
    <br>
    <select name="grupa">
    <option selected>prywatny</option>
    <option>grupowy<option>
    </select><br>
    <br> <input type="submit" value="Zapisz"> <br>
    <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
    </FORM>
    ';

$form_autoryzuj_sr = '
 <FORM method="POST" action="wb_autoryzuj_sr.php" ENCTYPE="multipart/form-data">
   <br />Podaj pin: <INPUT type="password" name="pin">
   <br /><INPUT type="submit" value="Autoryzuj">
   <INPUT TYPE="hidden" NAME="anty_s" VALUE="ble!ble!">
 </FORM>
 ';

$form_dodaj_film_sr = '
 <FORM method="POST" action="wb_dodaj_film_sr.php" ENCTYPE="multipart/form-data">
   <br>Nazwa filmu: <INPUT type="text" name="nazwa"><br> 
   <br>Komentarz: <INPUT type="text" name="komentarz"><br> 
   <br>Kategoria: <INPUT type="text" name="kategoria"><br>   
   <br>Rozszerzenie: <input type="text" name="rozszerzenie"> <br>
   <br>Autor: <input type="text" name="autor"> <br>
   <br>Sciezka i nazwa pliku: <INPUT type="file" NAME="plik" size="255"><br>
   <br>
   <select name="grupa">
   <option selected>prywatny</option>
   <option>grupowy<option>
   </select><br>
   <br><INPUT type="submit" value="Zapisz"><br> 
   <INPUT TYPE="hidden" NAME="MAX_FILE_SIZE" VALUE="16000000"><br> 
 </FORM>
 ';
function wp_dodaj_zdj_sr()
{
  echo "<a href='wp_dodaj_zdj_sr.php'>Dodaj obraz</a>";
}
function wp_dodaj_film_sr()
{
  echo "<a href='wp_dodaj_film_sr.php'>Dodaj film</a>";
}
