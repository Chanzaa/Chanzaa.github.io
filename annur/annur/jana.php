<?php
//Sambungan ke DB
include ('db_conn.php');

//kira bil hakim & peserta dari jadual
$sql = "SELECT
         (SELECT COUNT(nokp_peserta) FROM peserta) AS bil_peserta,
		 (SELECT COUNT(login_id) FROM hakim) AS bil_hakim,
		 (SELECT COUNT(id) FROM skor) AS bil_skor";
$result = mysqli_query($conn, $sql) or die(mysql_error());
$row = mysqli_fetch_assoc($result);

$bil_p = $row["bil_peserta"];
$bil_h = $row["bil_hakim"];
$bil_s = $row["bil_skor"];

//bilangan skor yang sepatutnya ada dalam jadual skor
$jum_s = $bil_p * $bil_h; //bil_peserta * bil_hakim

//jika bil skor dalam jadual tidak sama dengan
//bil skor yang sepatutnya, bermaksud
//ada hakim yang belum mengisi skor peserta
//keluarkan popup mesej, keputusan tidak boleh dijana

if(($bil_s != $jum_s) OR ($bil_s == 0))
{
    echo '<script>
	      alert("Keputusan tidak boleh dijana, Ada skor peserta yang belum diisi oleh hakim");
		  window.location.href="skor_semua.php";</script>';
} else {
    echo '<script>
	      alert("Keputusan pertandingan berjaya dijana");
		  window.location.href="keputusan.php";</script>';
}

//Close connection
mysqli_close($conn);
?>