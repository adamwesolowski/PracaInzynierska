<?php
require_once 'header.php';

if($loggedin)
{
    
    
    echo "<div id='oknoMenu'>Wybierz Rodzaj<div id='grupa'>"
    . "<ul>"
            . "<li><a href='kartoteka.php?link=kontrahenci'><div>Kontrahenci</div></a></li>"
                . "<li><a href='kartoteka.php?link=samochody'><div>Samochody</div></a></li>"
                . "<li><a href='kartoteka.php?link=kody'><div>Kody Pocztowe</div>   </a></li></div></div>";
    if(isset($_GET["link"]))
    {
        $wybor = $_GET["link"];
        
        if($wybor == "kody")
        {
            if(isset($_GET['wpisanaStrona']))
            {
            if($_GET['wpisanaStrona']<0)
            {
                $wpisanaStrona = $_GET['wpisanaStrona'];
                $strona= $wpisanaStrona;
            }
            else
            {
                $strona = $_GET['wpisanaStrona']-1;
                $wpisanaStrona = $_GET['wpisanaStrona'];
                echo"$strona";
            }
            }
        else if(isset($_GET['strona']))
                                {
                                  if($_GET['strona']<0)
                                  {
                                      $strona=0;
                                      $wpisanaStrona = $strona;
                                  }
                                    else {
                                        $strona =$_GET['strona'];
                                        $wpisanaStrona = $strona;
                                    }
                                }
                                else
                                    {
                                     $strona = 0;
                                     $wpisanaStrona = 0;
                                    }
            $stronaPlusDziesiec = 10 + $strona ;
            $stronaPlusSto = $strona + 100;
            $stronaMinusDziesiec = $strona - 10;
            $stronaMinusSto = $strona - 100;
            
        $lp = 0;
        echo "
        <div id='kodyPocztowe'>
        <div id='zamknij_okno'><a href='kartoteka.php'><img src='grafika/x.png' width='16' height='16'/></a></div>    
        <div class='srodek'>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaMinusSto'>
        <input type='submit' value='-100' >
        </form>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaMinusDziesiec'>
        <input type='submit' value='-10' >
        </form>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='text' name='wpisanaStrona' value='$wpisanaStrona'>
        </form>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaPlusDziesiec'>
        <input type='submit' value='+10' >
        </form>
        <form class='formularzSrodek'  action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaPlusSto'>
        <input type='submit' value='+100'>
        </form>
        </div>       
        <table>
        <tr><td>ID</td><td>KOD</td><td>NAZWA</td><td>MIEJSCOWOŚĆ</td><td>WOJEWÓDZTWO</td><td>ADRES</td>".
        "<td>POWIAT</td><td>ZAKRES</td><td>GMINA</td><td>ZMODYFIKOWANO</td></tr>";
         $kodyPocztowe = $polaczenieZMySQL->query("SELECT id, kod, nazwa, miej, woj, adres, powiat, zakres, gmina, timestamp FROM kody LIMIT $strona,10");
        while($wynikKodyPocztowe = $kodyPocztowe->fetch_assoc())
        {
        ++$lp;
        echo "<tr><td>".$wynikKodyPocztowe["id"]."</td><td>".$wynikKodyPocztowe["kod"]."</td><td>".$wynikKodyPocztowe["nazwa"].
             "</td><td>".$wynikKodyPocztowe["miej"]."</td><td>".$wynikKodyPocztowe["woj"]."</td><td>".$wynikKodyPocztowe["adres"].
             "</td><td>".$wynikKodyPocztowe["adres"]."</td><td>".$wynikKodyPocztowe["powiat"]."</td><td>".$wynikKodyPocztowe["zakres"].
             "</td><td>".$wynikKodyPocztowe["gmina"]."</td><td>".$wynikKodyPocztowe["timestamp"]."</td></tr>";
        }
        echo "</table>";
         echo "
        
        <div class='srodek'>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaMinusSto'>
        <input type='submit' value='-100' >
        </form>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaMinusDziesiec'>
        <input type='submit' value='-10' >
        </form>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='text' name='wpisanaStrona' value='$wpisanaStrona'>
        </form>
        <form class='formularzSrodek' action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaPlusDziesiec'>
        <input type='submit' value='+10' >
        </form>
        <form class='formularzSrodek'  action='kartoteka.php'>
        <input type='hidden' name='link' value='kody'>
        <input type='hidden' name='strona' value='$stronaPlusSto'>
        <input type='submit' value='+100'>
        </form>
        </div>       
        <table></div>";
        }
        else if($wybor === "kontrahenci")
        {
            zapytanieMySQL("INSERT INTO adres (ulica, nr, miasto, kodPocztowy, wojewodztwo) VALUES (Luzycka, 46, Gryfino, 74100, Zachodniopomorskie)");
        echo<<<_END
            <div class=srodek>
            
            </div>
            
_END;
        }
        else if($wybor == "samochody")
        {
        echo "samochody";
        }
        else {echo"blad";}
    }
    else{
        
        }
    }
else
{
    header("Location: index.php");
}


echo" <script type='text/javascript' src='javascript.js'></script></body></html>";