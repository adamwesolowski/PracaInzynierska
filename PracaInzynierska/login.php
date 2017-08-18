<?php // Przykład 26-7: login.php
 require_once 'header.php';
 
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = czyszczenieStringa($_POST['user']);
    $pass = czyszczenieStringa($_POST['pass']);
    
    if ($user == "" || $pass == "") {
        echo "<div id='komunikat'>Nie wszystkie pola zostały wypełnione.</div>" .
        "<div id='komunikat'>Aby przejść na stronę główną, <a href='index.php'>
            kliknij tutaj</a></div>";
    } else {
        $result = zapytanieMySQL("SELECT login,haslo FROM users
        WHERE login='$user' AND haslo='$pass'");

        if ($result->num_rows == 0) {
            echo "<div id='komunikat'>Błędna nazwa lub hasło.</div>" .
            "<div id='komunikat'>Aby przejść na stronę główną, <a href='index.php'>
              kliknij tutaj</a></div>";
            $loggedin = FALSE;
        } else {
            $loggedin = TRUE;
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            echo <<<_END
            </div>
_END;
              header("Location: index.php");
        }
    }
}
echo "</body></html>";
