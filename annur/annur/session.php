<?php
//start session
session_start();

//Sambungan ke DB
include ('db_conn.php');

//pegang data session berdasarkan kunci primer dalam jadual
$id = $_SESSION['id']; //login_id

//dapatkan kategori semasa pengguna login
$kat = $_SESSION['kategori'];

//jika urusetia, semak data login dari jadual urusetia
if ($kat == "U") {
  $jadual = "urusetia";
} else {
  $jadual = "hakim"; }
  
//dapatkan data pengguna berdasarkan session kunci primer
$mysql = mysqli_query($conn, "SELECT * FROM $jadual WHERE login_id='$id'");

$row = mysqli_fetch_array($mysql);

$nama = $row['nama'];
$id = $row['login_id'];

//jika data session tidak dijumpai dalam jadual
if(!isset($id))
{
header("Location: index.php"); //kembali ke paparan utama
}
?>