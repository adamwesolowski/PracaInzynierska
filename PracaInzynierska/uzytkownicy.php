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
    
    if(isset($_POST['usun_uzytkownika']))
    {

        $numerUzytkownika = $_POST['usun_uzytkownika'];

        zapytanieMySQL("DELETE FROM users WHERE id ='$numerUzytkownika'");
    }    
   
echo  "<div id='dol' class='dol_dodaj_uzytkownika'>";

    
if(isset($_POST['dodajLogin']))
{
    
    echo "<div id='blad'>";
    $imie = czyszczenieStringa($_POST['dodajImie']);
    $nazwisko = czyszczenieStringa($_POST['dodajNazwisko']);
    $login = czyszczenieStringa($_POST['dodajLogin']);
    $haslo = czyszczenieStringa($_POST['dodajHaslo']);
    $opis = czyszczenieStringa($_POST['dodajOpis']);
    
    if($imie == '' OR $nazwisko == '' OR $login == '' OR $haslo == '' || $_POST['dodajImie'] == 'wpisz imie' || $_POST['dodajNazwisko'] == 'wpisz nazwisko' || $_POST['dodajLogin'] == 'wpisz login')
    {
        echo "Wypełnij wszystkie wymagane pola.<br>";
    }
    else
    {
        $wynik = zapytanieMySQL("SELECT * FROM users WHERE login='$login' ORDER BY login;");
        
        if($wynik->num_rows)
        {
            echo "Użytkownik o tym loginie już istnieje.<br>";
        }
        else
        {
            echo"Dodano użytkownika $login";
            zapytanieMySQL("INSERT INTO users(imie, nazwisko, login, haslo, opis) VALUES('$imie', '$nazwisko', '$login', '$haslo', '$opis')");
            
        }
        
    }
    
    echo"</div>";
} 



echo <<<_END
<div id="formularz">
<pre><tytul>Dodawanie nowego użytkownika</tytul>
     <form method='POST' action='uzytkownicy.php'>
     <span class='fieldname'>Imię</span>
     <input type='text' autocomplete="off" maxlength='16' value='wpisz imie' name='dodajImie'><span id='info'></span>
     <span class='fieldname'>Nazwisko</span>
     <input type='text' autocomplete="off" maxlength='16' value='wpisz nazwisko' name='dodajNazwisko'>
     <span class='fieldname'>Login</span>
     <input type='text' autocomplete="off" maxlength='16' name='dodajLogin' value='wpisz login'>
     <span class='fieldname'>Hasło</span>
     <input type='password' autocomplete="off" maxlength='16' name='dodajHaslo' value=''>  
     <span class='fieldname'>Opis</span>
     <textarea name="dodajOpis" autocomplete="off" maxlength='100' cols="35" rows="8">Opis użytkownika</textarea>
      <input type='reset' value='Wyczyść'><input type='submit' value='Dodaj'>
</form>

_END;



echo "</pre></div>";

echo"<div id='ListaUzytkownikow'><table>";
echo"<tr><td><tytul>"
    . "ID</tytul></td><td><tytul>"
        . "Imię</tytul></td><td><tytul>"
        . "Nazwisko</tytul></td><td><tytul>"
        . "Login</tytul></td></tr>";

$z = $polaczenieZMySQL->query("SELECT id,Imie, Nazwisko,login,opis FROM users");
$lp = 0;
while ($r = $z->fetch_assoc()) 
{
    ++$lp;
    $idUzytkownika = $r["id"];
    echo "<tr><td>".$lp."</td><td>".$r["Imie"]." </td><td>".$r["Nazwisko"]."</td><td>".$r["login"]."</td><td>
      <form  action='usunUzytkownika.php' method='POST'>
      <input type='hidden' name='potwierdzenieUsunUzytkownika' value='$idUzytkownika'>
      <input class='przyciskUsunUzytkownika' type='submit'  value='Usuń'>
      </form></td><td>
      <form action='uzytkownicy.php' method='POST'>
      <input type='hidden' name='edytujUzytkownika' value='$idUzytkownika'>"
            . "<input class='przyciskUsunUzytkownika' type='submit' value='Edytuj'>"
            . "</form></td></tr>";
}
$z->free();
echo "</table>";
echo"</div>";

     
    if(isset($_POST['edytujUzytkownika']))
    {
    
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
<div id='zamknij_okno'><a href='uzytkownicy.php'><img src='grafika/x.png' width='16' height='16'/></a></div>  
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
     </pre>
         
</form>
          
_END;
    }

echo "</div>";
echo "";
echo"<script type='text/javascript' src='javascript.js'></script>";
 

}
else
{
    header("Location: index.php");
}

echo "</body></html>"
;
