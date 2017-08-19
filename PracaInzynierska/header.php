<?php // header.php
require_once 'funkcje.php';
session_start();

  if (isset($_SESSION['user'])) {  
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = $_SESSION['user'];
    echo "<!DOCTYPE html>". 
         "<html><head><meta charset='utf-8'>";
    echo <<<_END
        <title>$nazwaSystemu Użytkownik: $userstr</title>
        <link rel='stylesheet' href='style.css' type='text/css'>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="javascript.js"></script>
       </head><body>
        
_END;
    
} 
else {
    $loggedin = FALSE;
    echo <<<_END
    <!DOCTYPE html>
       <html>
           <head>
               <meta charset='utf-8'>
               <link rel='stylesheet' href='style.css' type='text/css'>
               <script src="//code.jquery.com/jquery-1.12.4.js"></script>
               <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                 <script>
                    $( function() {
                                    $( "#tabs" ).tabs({
                                                        collapsible: true
                                                      });
                                   }
                      );
  </script>
               <title>$nazwaSystemu</title>
            </head>
                <body>
        
_END;
};
 $menuAnimowane = 0;
  if ($loggedin)
  {
      
    echo <<<_END
      <div id='menu'>
      <img src='grafika/logo.png'/>$nazwaSystemu<a href="http://www.wp.pl"><img id="menu_ikona" src="grafika/menu.png" width="16" height="16"/></a><br><br>
      <ul>
         <li><a href='index.php'><div class='przyciski_menu'><img src="grafika/dom.png" width="16" height="16"/> Strona Główna</div></a></li>    
         <li><a href='kartoteka.php'><div class='przyciski_menu'><img src="grafika/kartoteka.png" width="16" height="16">Kartoteka</div></a></li>
         <li><a href='spedycja.php'><div class='przyciski_menu'><img src="grafika/spedycja_1.png" width="16" height="13"/> Spedycja</div></a></li>
         <li><a href='mapa.php'><div class='przyciski_menu'><img src="grafika/mapa.png" width="16" height="16">Mapa</div></a></li>
         <li><a href='uzytkownicy.php'><div class='przyciski_menu'><img src="grafika/uzytkownicy.png" width="16" height="16">Użytkownicy</div></a></li>
         <li><div class='przyciski_menu' id='ikona_uzytkownika'>$userstr</div></a></li>
         <li><a href='wyloguj.php'><div id='wyloguj'>Wyloguj</div></a></li>
         </ul></div>
_END;
      
    
  }
  
  