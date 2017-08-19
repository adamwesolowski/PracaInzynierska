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
echo<<<_END
            <div id='formularz'> 
            <tytul>Samochody</tytul>
            <div id='tabs'>
  <ul>
    <li><a href="#tabs-1">Nunc tincidunt</a></li>
                
    <li><a href="#tabs-2">Proin dolor</a></li>
    <li><a href="#tabs-3">Aenean lacinia</a></li>
  </ul>
  <div id="tabs-1">
    <p><strong>Click this tab again to close the content pane.</strong></p>
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
  <div id="tabs-2">
    <p><strong>Click this tab again to close the content pane.</strong></p>
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p><strong>Click this tab again to close the content pane.</strong></p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>
            </div>
          
_END;
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