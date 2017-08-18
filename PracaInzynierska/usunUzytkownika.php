<?php
require_once 'header.php';
if($loggedin)
{
    
    if(isset($_POST['potwierdzenieUsunUzytkownika']))
    {
        
        echo  "<div id='dol' class='dol_dodaj_uzytkownika'>";
        echo "<div id='komunikat'";
        $idUzytkownika = $_POST['potwierdzenieUsunUzytkownika'];
        echo <<<_END
            <tytul> Czy na pe   wno chcesz usunąć tego użytkownika ?</tytul>
                <form action="uzytkownicy.php" method="POST">
                <input type='hidden' name='usun_uzytkownika' value=$idUzytkownika>
                <input type='submit' value='Tak'>
                </form>
                <form action="uzytkownicy.php">
                <input type='submit' value='Nie'>
                </form>
_END;
        
        
echo"</div></div>";
echo" <script type='text/javascript' src='javascript.js'></script>";
       
    }
    
}
else
{
    echo"wartosc posta: ". $_POST['potwierdzenieUsunUzytkownika'];
    echo"jakis blad";
    /*header("Location: index.php");*/
}