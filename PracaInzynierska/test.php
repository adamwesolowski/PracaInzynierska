<?php 
require 'header.php';
echo  "<div id='dol'>";
echo "test tego gowna";



/* 
wyświetlamy wyniki, sprawdzamy, 
czy zapytanie zwróciło wartość większą od 0 
*/ 


// połączenie z bazą danych w osobnym pliku

// zapytanie do bazy danych
$z = $polaczenieZMySQL->query("SELECT id,Imie, Nazwisko,login,opis FROM users");
// zapisujemy wynik zapytania do tablicy asocjacyjnej 
echo"<table>";
echo"<tr><td>ID</td><td>Imię</td><td>Nazwisko</td><<td>Login</td><td>Opis</td></tr>";
while ($r = $z->fetch_assoc()) {
    echo "<tr><td>".$r["id"]."</td><td>".$r["Imie"].", </td><td>".$r["Nazwisko"]."</td><td>".$r["login"]."</td><td>".$r["opis"]."</td></tr>";
}
// zwalniamy pamięć z wyniku
$z->free();

echo"</div>";
echo" <script type='text/javascript' src='javascript.js'></script>";  
?>