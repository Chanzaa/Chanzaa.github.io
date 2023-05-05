<?php
 session_start();
 //destroying all the session_start
 if(session_destroy()) {
    header("Location: index.php");
    //kembali ke halaman utama
 }
 ?>