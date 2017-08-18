<?php
require_once 'header.php';

if($loggedin)
{
    
    if(isset($_POST['aktualizujLogin'])||isset($_POST['aktualizujHaslo'])
            ||isset($_POST['aktualizujImie'])||isset($_POST['aktualizujNazwisko'])||isset($_POST['aktualizujOpis'])   )
    {
      $zmianaLoginu = $_POST['aktualizujLogin'];
      $zmianaHasla = $_POST['aktualizujHaslo'];
      $zmianaImienia = $_POST['aktualizujImie'];
      $zmianaNazwiska = $_POST['aktualizujNazwisko'];
      $zmianaOpisu = $_POST['aktualizujOpis'];
      $idUzytkownika = $_POST['idUzytkownika'];
      zapytanieMySQL("UPDATE users SET login='$zmianaLoginu', haslo='$zmianaHasla', imie='$zmianaImienia', nazwisko='$zmianaNazwiska', opis='$zmianaOpisu' WHERE id='$idUzytkownika'");
      header("Location: uzytkownicy.php");
      
    }
 else {
        
    
    if(isset($_POST['edytujUzytkownika']))
    {
    echo "<div id='dol'>";
    $idUzytkownika = $_POST['edytujUzytkownika'];
    $z = $polaczenieZMySQL->query("SELECT id,Imie, Nazwisko,login,haslo,opis,rodzaj FROM users WHERE id =$idUzytkownika");
    $wynikZapytaniaWiersz = $z->fetch_assoc();
    $id = $wynikZapytaniaWiersz['id'];
    $imie = $wynikZapytaniaWiersz['Imie'];
    $nazwisko = $wynikZapytaniaWiersz['Nazwisko'];
    $login = $wynikZapytaniaWiersz['login'];
    $haslo = $wynikZapytaniaWiersz['haslo'];
    $opis = $wynikZapytaniaWiersz['opis'];
    $rodzaj = $wynikZapytaniaWiersz['rodzaj'];
    echo <<<_END
<div id="formularz">
<pre><tytul>Edytujesz użytkownika $login</tytul>
     <form method='POST' action='edytujUzytkownika.php'>
     <input type='hidden' name='idUzytkownika' value='$idUzytkownika'>
     <span class='fieldname' >Imię</span>
     <input type='text' autocomplete="off" maxlength='16' name='aktualizujImie' value='$imie' >
     <span class='fieldname'>Nazwisko</span>
     <input type='text' autocomplete="off" maxlength='16' name='aktualizujNazwisko' value='$nazwisko'>
     <span class='fieldname'>Login</span>
     <input type='text' autocomplete="off" maxlength='16' name='aktualizujLogin' onBlur='checkUser(this)' value='$login'>
     <span class='fieldname'>Hasło</span>
     <input type='password' autocomplete="off" maxlength='16' name='aktualizujHaslo' value='$haslo' >  
     <span class='fieldname'>Opis</span>
     <textarea name="aktualizujOpis" autocomplete="off" maxlength='100' cols="35" rows="8">$opis</textarea>
      <input type='submit' value='Zmień'>
</form>

_END;
  
    }
    else
    {
        header("Location: uzytkownicy.php");
    }
 }
}
else
{
    header("Location: index.php");
}


echo" <script type='text/javascript' src='javascript.js'></script>";

