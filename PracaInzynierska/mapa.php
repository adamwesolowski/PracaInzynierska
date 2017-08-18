<?php
require_once 'header.php';

if($loggedin)
{

echo <<<_END

    <div id='map'></div>
  
    <script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCrsM2IBdY5cGDNyGLL7qJdZ5ps10Yio1o&callback=initMap'>
    </script>


_END;
echo" <script type='text/javascript' src='javascript.js'></script>";
}
else
{
    header("Location: index.php");
}
?>
 	

  </body>
</html>