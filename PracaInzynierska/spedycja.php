<?php
require_once 'header.php';

if($loggedin)
{
    echo"Spedycja";
}
else
{
    header("Location: index.php");
};


echo" <script type='text/javascript' src='javascript.js'></script>";

