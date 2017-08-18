<?php // wyloguj.php
  require_once 'header.php'; 
  
 
  if(isset($_POST['potwierdzenie']))
  {
      $potwierdzenie = $_POST['potwierdzenie'];
      
      if($potwierdzenie == 1)
      {
          session_destroy();
          header("Location: index.php");
      }
      else if ($potwierdzenie == 0)
      {
          header("Location: index.php"); 
      }
  }
  
  if ($loggedin)
  {
      echo  "<div id='dol' class='dol_dodaj_uzytkownika'>".
            "<div id='komunikat'>";
      echo <<<_END
      <tytul>Czy na pewno chcesz się wylogować ?</tytul>
      <form action='wyloguj.php' method='post'>
      <input type='hidden' name='potwierdzenie' value='1' >
      <input type='submit' value='Tak'>
      </form>
      <form action='wyloguj.php' method='post'>
      <input type='hidden' name='potwierdzenie' value='0' >
      <input type='submit' value='Nie'>
      </form>
_END;
      
      echo "</div></div>";
      
  }else
  {
  header("Location: index.php");
  }
  
  echo" <script type='text/javascript' src='javascript.js'></script>";

?>

    <br><br></div>
  </body>
</html>
