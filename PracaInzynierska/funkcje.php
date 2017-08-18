<?php

// zmienne potrzebne do zalogowania na MySQL
$hostBazyDanych = 'localhost';
$nazwaBazyDanych = 'inzynierka';
$userBazyDanych = 'root';
$hasloBazyDanych = '';
$nazwaSystemu = "Claudiant";



//konfigurowanie połączenia
$polaczenieZMySQL = new mysqli($hostBazyDanych, $userBazyDanych,$hasloBazyDanych,$nazwaBazyDanych);

//trzeba wymyslic cos innego !!!
if ($polaczenieZMySQL->connect_error) {
    die($polaczenieZMySQL->connect_error);
}
//tworzy tablice 
function utworzTablice($nazwaTabeli, $zapytanie)
{
    zapytanieMySQL("CREATE TABLE IF NOT EXIST $nazwaTabeli($zapytanie)");
    echo "Tablica '$nazwaTabeli' została utworzona lub istniała wcześniej";
}
//wysyła na serwer zapytanie SQL
function zapytanieMySQL($zapytanie)
{
    global $polaczenieZMySQL ;
    $wynikZapytania = $polaczenieZMySQL->query($zapytanie);
    
    if(!$wynikZapytania)
    {
         die($polaczenieZMySQL->error);
     }
     return $wynikZapytania;
}

function usunSesje()
{
    $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()] ) ) {
        setcookie(session_name(), '', time()-2592000, '/');
    }
    session_destroy();              
}

 function czyszczenieStringa($wartosc)
    {
     global $polaczenieZMySQL;
     $wartosc = strip_tags($wartosc);
     $wartosc = htmlentities($wartosc);
     $wartosc = stripslashes($wartosc);
     return $polaczenieZMySQL->real_escape_string($wartosc);
    }
    //pokazuje profil użytkownika

function pokazProfil($user)
    {
        if(file_exists("$user.jpg"))
        {
            echo "<img src='$user' style='float:left;'>";
        }
            $wynikZapytania = zapytanieMySQL("SELECT * FROM profiles WHERE user ='$user' ");
            if ($wynikZapytania->num_rows)
            {
              $wiersz = $wynikZapytania->fetch_array(MYSQLI_ASSOC);
              echo stripslashes($wiersz['text']) . "<br style='clear:left;'><br>";
            }
    }

    
    
    
    // jqueryui http://jqueryui.com
    
    