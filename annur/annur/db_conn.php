<?php
$db_host = "localhost";
$db_uname = "root";   //username phpmyadmin
$db_pwd = "usbw";   //password phpmyadmin
$db_name = "annur";   //nama pangkalan data

// Create connection
$conn = mysqli_connect($db_host, $db_uname, $db_pwd, $db_name);

// Check connection
if (!$conn) {
  die(mysqli_connect_error());
  }
// echo "Sambungan ke DB berjaya";
?>