<?php
//session
include('session.php');

//Dapatkan data dari semua textfield pada borang_hakim.php
$login = $_POST['loginid'];
$pwd = md5($_POST['katalaluan']); //md5 untuk encrypt pwd
$nama = $_POST['nama'];

//semak jika login_id telah wujud dalam DB
$semak = "SELECT login_id FROM hakim
          WHERE login_id = '$login'";
$result = mysqli_query($conn, $semak) or die(mysqli_error());

//jika login_id sudah wujud, keluarkan js popup mesej
if (mysqli_num_rows($result) > 0)
{
    echo '<script>
	      alert("Login ID <'.$login.'> telah didaftarkan!!");
		  window.location.href="borang_hakim.php";</script>';
} else {
    //jika login_id belum wujud, simpan maklumat hakim dalam DB
	$mysql = "INSERT INTO hakim (login_id, login_pwd, nama)
	          VALUES ('$login', '$pwd', '$nama')";
			  
	if (mysqli_query($conn, $mysql)) {
	//papar js popup mesej jika maklumat hakim berjaya daftar
	echo '<script>alert("Hakim baharu berjaya didaftarkan!");
	       window.location.href="borang_hakim.php";
		  </script>';
	} else {
	    echo "Error ; " . mysqli_error($conn);  }
}

//Close connection
mysqli_close($conn);
?>