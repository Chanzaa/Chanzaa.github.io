<?php
include ("db_conn.php");
include ("header.php");
include ("topnav.php");
?>

<html>
<head>
<style>
#mainbody
{
  background-color: white;
  padding: 20px;
}
#tajuk
{
    font-size: 30px;
	font-family: Tw Cen MT Condensed;
	font-weight: bold;
	text-align: center;
}
table {
    border: 2px solid black;
	border-collapse: collapse;
	margin: auto;
	background-color: DeepSkyBlue;
	font-weight: bold;
}
td:nth-child(2) {
    text-align: right;
}
td:nth-child(3) {
    text-align: left;
}
</style>
</head>
<body>

<div id="mainbody">
<form action="proses_peserta.php" method="POST">
    <div id="tajuk">Borang Daftar Penyertaan</div><p>
	
<table cellpadding=5px>
<tr>
  <td style="width: 30px"></td>
  <td></td>
  <td></td>
  <td style="width: 30px"></td>
<tr>
  <td></td>
  <td>No KP :</td>
  <td><input type="text" name="nokp" placeholder="070815105432"
             pattern=".{12,12}" title="12 aksara sahaja" size="30"
			 required></td>
	     <!-- pattern ini untuk setkan had atas dan had bawah -->
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Nama :</td>
  <td><input type="text" name="nama" size="30" required></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>No Telefon :</td>
  <td><input type="text" name="notel" placeholder="0162527306"
             pattern=".{10,11}" title="10-11 aksara sahaja"
			 size="30" required></td>
		 <!-- pattern ini untuk setkan had atas dan had bawah -->
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Kelas :</td>
  <td><select name="kelas" required>
      <option value="">-- Sila PIlih --</option>
	  <?php
	    /*dapatkan nama kelas dari DB untuk dipaparkan
		  dalam dropdown*/
		$mysql = mysqli_query($conn, "SELECT * FROM kelas");
		while ($row = mysqli_fetch_array($mysql))
		{
		?>
		<option value="<?php echo $row['kod_kelas']; ?>">
		               <?php echo $row['nama_kelas']; ?>
		</option>
	  <?php }?>
	  </select></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td style="text-align": right;">
      <input type="submit" name="daftarBtn" value="Daftar"></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
</table>

</form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>