<?php
//Sambungan ke DB
include ('db_conn.php');

/*Dapatkan data dari semua medan/textfield pada borang_peserta.php*/

$nokp = $_POST['nokp'];
$nama = $_POST['nama'];
$notel = $_POST['notel'];
$kelas = $_POST['kelas'];

//semak jika nokp telah wujud dalam DB
$semak = "SELECT nokp_peserta FROM peserta WHERE nokp_peserta = '$nokp'";
$result = mysqli_query($conn, $semak) or die(mysqli_error());

//jika nokp sudah wujud, keluarkan js popup mesej
if (mysqli_num_rows($result) > 0)
{
    echo '<script>
	      alert("NO KP anda telah didaftarkan!!");
		  window.location.href="borang_peserta.php";</script>';
} else {
    //jika nokp belum wujud, simpan maklumat peserta dalam DB
	$mysql = "INSERT INTO peserta
	          (nokp_peserta, nama_peserta, no_tel, kod_kelas)
			  VALUES
			  ('$nokp', '$nama', '$notel', '$kelas')";
			  
	if (mysqli_query($conn, $mysql)) {
	//papar js popup mesej jika maklumat berjaya disimpan
	echo '<script>
	      alert("Pendaftaran Peserta Berjaya!");
		  window.location.href="index.php";</script>';
		  //selepas berjaya daftar, kembali ke laman utama
	} else {
	    echo "Error ; " . mysqli_error($conn);
	}
}
//Close connection
mysqli_close($conn);
?>