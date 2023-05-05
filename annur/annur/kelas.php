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
  margin-left: auto;
  margin-right: auto;
  border-collapse: collapse;
  margin: auto;
  background-color: BlanchedAlmond;
  }
td {
  text-align: left;
  height: 30px;
  }
tr th:nth-child(2) {
  text-align: center;
  }
tr td:nth-child(2) {
  text-align: center;
  }
th {
    height: 30px;
	text-align: left;
	font-weight: bold;
	color: black;
	background-color: DarkOrange;
	}
</style>
</head>
<body>

<div id="mainbody">
<div id="tajuk">
   <p>Senarai Kelas SMK Engku Husain</p>
</div>

<?php

$mysql = "SELECT * FROM kelas
          ORDER BY kod_kelas";
$result = mysqli_query($conn, $mysql) or die(mysqli_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
    //table untuk paparan data
	echo "<table border='0'>";
	echo "<col width='20'>";      //saiz column 1
	echo "<col width='100'>";     //saiz column 2
	echo "<col width='150'>";     //saiz column 3
	echo "<col width='400'>";     //saiz column 4
	echo "<col width='20'>";      //saiz column 5
	echo "<tr>";
	echo "<th></th>";              // column 1
	echo "<th>Bil</th>";           // column 2
	echo "<th>Kod Kelas</th>";     // column 3
	echo "<th>Nama Kelas</th>";    // column 4
	echo "<th></th>";              // column 5
	echo "</tr>";
	
	//papar semua data dari jadual di DB
	while($row = mysqli_fetch_assoc($result))
	{
	$bil++;
	echo "<tr height='10'>";
	echo "<td></td>";
	echo "<td>".$bil."</td>";
	echo "<td>".$row['kod_kelas']."</td>";
	echo "<td>".$row['nama_kelas']."</td>";
	echo "<td></td>";
	echo "</tr>";
	}
	echo "</table>";
}
else { echo "<center>Tiada rekod</center>";}
?>
<p>

<div id="tajuk"><p><h5>Muat Naik Kelas</h5></div>

<!-- borang untuk muatnaik kelas -->
<form name="upload" action="upload_kelas.php" method="POST"
                    enctype="multipart/form-data">
<center>Pilih fail untuk dimuat naik (Fail excel .csv sahaja) :
<input type="file" name="fail_csv" required>
<p><input type="submit" name="upload" value="Muat Naik"></p>
</center>
</form>

</div>
<?php include ("footer.php"); ?>
</body>
</html>