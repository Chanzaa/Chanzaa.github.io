<html>
<head>
<style>
#mainbody2 {
  background-color: white;
  padding: 10px;
  }
#tajuk
{
  font-size: 30px;
  font-family: Tw Cen MT Condensed;
  font-weight: bold;
  text-align: center;
  }
.table2 {
  margin-left: auto;
  margin-right: auto;
  border-collapse: collapse;
  margin: auto;
  background-color: Azure;
  }
.table2 td {
  text-align: left;
  height: 30px;
  }
.table2 tr td {
  text-align: center;
  }
.table2 tr td:nth-child(3) {
  text-align: left;
  }
.table2 th {
    height: 30px;
	text-align: center;
	font-weight: bold;
	color: black;
	background-color: Aquamarine;
	}
</style>
</head>
<body>

<div id="mainbody2">
    <div id="tajuk">Senarai Hakim<p></div>
<?php
//dapatkan maklumat hakim dari jadual di dalam DB
$mysql = "SELECT * FROM hakim ORDER BY login_id";
$result = mysqli_query($conn, $mysql) or die(mysqli_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
    //table untuk paparan data
	echo "<table border='0' class='table2'>";
	echo "<col width='20'>";      //saiz column 1
	echo "<col width='100'>";     //saiz column 2
	echo "<col width='200'>";     //saiz column 3
	echo "<col width='200'>";     //saiz column 4
	echo "<col width='20'>";      //saiz column 5
	echo "<tr>";
	echo "<th></th>";             //saiz column 1
	echo "<th>Bil</th>";          //saiz column 2
	echo "<th>Nama Hakim</th>";   //saiz column 3
	echo "<th>Login ID</th>";     //saiz column 4
	echo "<th></th>";             //saiz column 5
	echo "</tr>";
	
	//papar semua semua data dari jadual di DB
	while($row = mysqli_fetch_assoc($result))
	{
	$bil++;
	echo "<tr height='10'>";
		echo "<td></td>";
		echo "<td>".$bil.".</td>";
		echo "<td>".$row['nama']."</td>";
		echo "<td>".$row['login_id']."</td>";
		echo "<td></td>";
		echo "</tr>";
		}
		echo "</table>";
}
else { echo "<center>Tiada rekod</center>"; }
?>
</div>

</body>
</html>