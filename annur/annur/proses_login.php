<?php 
//start session 
session_start(); 
/*Bacaan Lanjut tentang session di  
  goo.gl/VOEjn dan goo.gl/zoVEwf */ 
   
 //Sambungan ke DB 
 include ('db_conn.php'); 
  
 //Dapatkan data dari borang login 
 $kat = $_POST['kat']; 
 $id = $_POST['login']; 
 $pwd = md5($_POST['katalaluan']); //sulitkan katalaluan  
  
 //bila user klik button log masuk, 
 //dapatkan kategori pengguna, 
 //jika urusetia, semak data login dari jadual urusetia 
  
 if ($kat == "U") 
 { 
     $jadual = "urusetia"; 
  $link = "skor_semua.php"; 
} 
else { 
    $jadual = "hakim"; 
 $link = "skor.php"; 
} 
 
//semak id dan katalaluan dalam jadual 
$mysql = "SELECT * FROM $jadual 
          WHERE login_id = '$id' AND login_pwd='$pwd'"; 
$result = mysqli_query($conn, $mysql); 
$row = mysqli_fetch_array($result); 
 
//jika ADA data id dan katalaluan yang sama  
if(mysqli_num_rows($result) > 0) 
{ 
    //dapatkan nama dan kunci primer(login_id) pengguna  
 $_SESSION['id'] = $row['login_id']; //simpan data session 
 $nama = $row['nama']; 
 $_SESSION['kategori'] = $kat; 
  
 //papar popup mesej jika berjaya  
 echo '<script>alert("Ahlan Wasahlan '.$nama.'"); 
        window.location.href="'.$link.'"</script>'; 
} 
 else //jika TIDAK ADA data id dan kata laluan yang sama 
 { 
     echo '<script>alert("Login ID atau Katalaluan SALAH!!"); 
  window.location.href="borang_login.php";</script>'; 
  //kembali semula ke borang login  
} 
 
//Close db connection 
mysqli_close($conn); 
?>