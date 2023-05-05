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
#tajuk {
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
	background-color: Azure
}
td {
    text-align: left;
	height: 30px;
}
td {
    text-align: left;
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
	background-color: DeepSkyBlue;
}
</style>
</head>
</body>

<div id="mainbody">
     <div id="tajuk"><p>Senarai Peserta Pertandingan</p></div>
	 
<?php

$mysql = "SELECT * FROM peserta
          INNER JOIN kelas USING (kod_kelas)
		  ORDER BY kod_kelas, nama_peserta";
$result = mysqli_query($conn, $mysql) or die(mysqli_error());

$bil = 0;

if (mysqli_num_rows($result) >0)
{
    //table untuk paparan data
	echo "<table border='0'>";
	echo "<col width='20'>";      //saiz column 1
	echo "<col width='100'>";     //saiz column 2
	echo "<col width='200'>";     //saiz column 3
	echo "<col width='150'>";     //saiz column 4
	echo "<col width='300'>";     //saiz column 5
	echo "<col width='20'>";      //saiz column 6
	echo "<tr>";
	echo "<th></th>";              // column 1
	echo "<th>Bil</th>";           // column 2
	echo "<th>Nama Peserta</th>";  // column 3
	echo "<th>No Tel</th>";        // column 4
	echo "<th>Nama Kelas</th>";    // column 5
	echo "<th></th>";              // column 6
	echo "</tr>";
	
	//papar semua data dari jadual di DB
	while($row = mysqli_fetch_assoc($result))
	{
	$bil++;
	echo "<tr height='10'>";
	echo "<td></td>";
	echo "<td>".$bil.".</td>";
	echo "<td>".$row['nama_peserta']."</td>";
	echo "<td>".$row['no_tel']."</td>";
	echo "<td>".$row['nama_kelas']."</td>";
	echo "<td></td>";
	echo "</tr>";
	}
	echo "</table>";
}
else { echo "<center>Tiada rekod</center>"; }
?>
</div>
<?php include ("footer.php"); ?>
</body>
</html>