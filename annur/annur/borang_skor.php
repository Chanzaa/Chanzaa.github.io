<?php
include ("header.php");
include ("nav.php");
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
	font-weight: bold;
	background-color: LightSkyBlue;
}
td:nth-child(2) {
    text-align: right;
	
}
td:nth-child(3) {
    text-align: left;
	}
input[type='number'] {
    width: 50px;
	}
</style>
</head>
<body>

<div id="mainbody">
<form action="proses_skor.php" method="POST">
<div id="tajuk">Borang Skor Pertandingan</div><p>

<table cellpadding=5px>
<tr>
  <td style="width: 30px"></td>
  <td></td>
  <td></td>
  <td style="width: 30px"></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Nama Peserta :</td>
  <td><select name="nokp" required>
      <option value="">-- Sila Pilih --</option>
	  <?php
	    /* dapatkan data peserta dari jadual
		   untuk display dalam dropdown */
		$mysql = mysqli_query($conn, "SELECT * FROM peserta
		                              ORDER BY nama_peserta");
		while ($row = mysqli_fetch_array($mysql))
		{
	  ?>
	  <option value="<?php echo $row['nokp_peserta']; ?>">
	                 <?php echo $row['nama_peserta']; ?>
	  </option>
	  <?php } ?>
	  </select></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Lancar :</td>
  <td><input type="number" name="skor1" min="1" max="50"
             required> / 50</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Lagu :</td>
  <td><input type="number" name="skor2" min="1" max="30"
             required> / 30</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Suara :</td>
  <td><input type="number" name="skor3" min="1" max="10"
             required> / 10</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Tertib :</td>
  <td><input type="number" name="skor4" min="1" max="10"
             required> / 10</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td style="text-align: right;">
      <input type="submit" name="simpanBtn" value="Simpan"></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
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