<?php //index.php
  require_once 'header.php';
if ($loggedin)
  {
    echo  "<div id='dol'>";
    echo "<tytul>Witaj $user ! <br>"
             . "Jak miło, że wpadłeś !</tytul>";
    
    echo <<<_END

    <div id='mapaDol'></div>
  
    <script async defer 
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCrsM2IBdY5cGDNyGLL7qJdZ5ps10Yio1o&callback=initMap'>
    </script>


_END;
    
    echo" <script type='text/javascript' src='javascript.js'></script>"; 
    
     
     
  }
  else
  {
      $loggedin = FALSE;
      echo <<<_END
            <div id="wszystko">
            <div id="logo"><img src="grafika\logo2.png">$nazwaSystemu</div>
            
            <div id="komunikat_logowania">
              Wprowadź swoje dane aby się zalogować
              </div>
            <form id="logowanie" method='post' action='login.php' >
                <pre>
Login:<input class="pola" title="Podaj swój login" type="text" name='user'>
Hasło:<input class="pola" title="Podaj swoje hasło" type="password" name='pass' >
        <input type="submit" value="zaloguj">
                                     </pre>
            </form>
            <div id="info">
                Ta strona jest wymaganym projektem pracy inżynierskiej w Zachodniopomorskiej Szkole Biznesu w Szczecinie. <br>
                Stworzona została przez Adama Wesołowskiego. <br>
                2017r.
            </div>
        </div>
      
        
                 
            
       
_END;
      }
echo" <script type='text/javascript' src='javascript.js'></script>";        
 /* 
  if(isset($_POST['user']))
  {
      $user = $_POST['user'];
     echo "zakonczono pomyslnie $user";
  }
  
  */
      
?>


  </body>
</html>