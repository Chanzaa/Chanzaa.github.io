<?php
//session
include('session.php');

//Dapatkan data dari semua textfield pada borang_skor.php
$nokp = $_POST['nokp'];
$lancar = $_POST['skor1'];
$lagu = $_POST['skor2'];
$suara = $_POST['skor3'];
$tertib = $_POST['skor4'];

//semak jika hakim ini telah menilai peserta ini
$semak = "SELECT * FROM skor
          INNER JOIN peserta USING (nokp_peserta)
		  WHERE login_id = '$id'
		  AND nokp_peserta = '$nokp' ";
$result = mysqli_query($conn, $semak) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);

//jika ada rekod, keluarkan popup mesej
if (mysqli_num_rows($result) >0)
{
    $nama = $row['nama_peserta']; //dapatkan nama peserta
	
	echo '<script>
	      alert("Skor bagi peserta <'.$nama,'> telah di isi!!");
		  window.location.href="borang_skor.php";</script>';
} else {
    //jika belum isi, simpan data skor dalam jadual
	$mysql = "INSERT INTO skor
	          (lancar, lagu, suara, tertib,
			   nokp_peserta, login_id)
			  VALUES
			  ('$lancar', '$lagu', '$suara', '$tertib',
			   '$nokp', '$id')";
			   
    if (mysqli_query($conn, $mysql)) {
	//papar js popup mesej jika maklumat skor berjaya simpan
	echo '<script>
	       alert("Skor peserta berjaya disimpan!");
		   window.location.href="skor.php";
		  </script>';
	} else {
	    echo "Error ; " . mysqli_error($conn); }
}

//Close connection
mysqli_close($conn);
?>		