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
  background-color: lavender;
  }
td
{
  text-align: left;
  height: 30px;
  }
  tr:nth-child(even)
  {
  background-color: #ffedfe0;
  }
  tr td {  text-align: center; }
  
  tr td:nth-child(3)
  {
    text-align: left;
  }
  th
  {
     height: 30px;
	 text-align: center;
	 font-weight: bold;
	 color: white;
	 background-color: darkorchid;
	 }
  .tbl tr td
  {
    text-align: right;
	background-color: white;
	color: red;
	font-weight: bold;
	}
	</style>
	</head>
	<body>
	
    <div id="mainbody">
	    <div id="tajuk"><p>Skor Pertandingan</p></div>
		
	<form action="" method="post">
	<!-- CARIAN -->
	<p><center>
	   <select name="kategori">
	        <option>Pilih Carian</option>
			<option value="kelas">Kelas</option>
			<option value="nama">Nama Peserta</option>
	   </select>
	  : <input type="text" name="carian">
	 <input type="submit" value="Cari" name="cari">
	</form>
	
	<!-- JANA KEPUTUSAN PERTANDINGAN -->
	<form action="jana.php" method="post">
	
	<table class="tbl" border='0'>
	<tr>
	     <td></td>
		 <td></td>
	</tr>
	<tr>
	     <td width='940'>** Hanya klik JANA KEPUTUSAN setelah semua
		                    hakim mengisi skor peserta. </td>
		 <td width='130'><input type="submit"
		                  name="jana" value="Jana Keputusan"></td>
	</tr>
	</table>
	
	</form>
	
	<!-- QUERY UNTUK CARIAN -->
	<?php
	//jika user klik butang "Cari" dan textbox carian tidak empty
	if(isset($_POST['cari']) && !empty($_POST['carian']))
	{
		//kenalpasti kategori carian apa yang dipilih oleh user
		switch ($_POST["kategori"])
		{
		case "kelas": //jika user pilih search by nama kelas
		$query = "SELECT *,
		          SUM(lancar + lagu + suara + tertib)
				      AS jumlah
				  FROM skor
				     INNER JOIN peserta USING (nokp_peserta)
					 INNER JOIN kelas USING (kod_kelas)
					 INNER JOIN hakim USING (login_id)
				  WHERE nama_kelas LIKE '%$_POST[carian]%'
				  GROUP BY id
				  ORDER BY nama_peserta";
		break;
		default: //jika user pilih search by nama peserta
		$query = "SELECT *,
		          SUM(lancar + lagu + suara + tertib)
				      AS jumlah
				  FROM skor
				     INNER JOIN peserta USING (nokp_peserta)
					 INNER JOIN kelas USING (kod_kelas)
					 INNER JOIN hakim USING (login_id)
				  WHERE nama_peserta LIKE '%$_POST[carian]%'
				  GROUP BY id
				  ORDER BY nama_peserta";
	    }
	} else {
	  //jika user tidak buat carian, papar semua keputusan
	  $query = "SELECT *,
		          SUM(lancar + lagu + suara + tertib)
				      AS jumlah
				  FROM skor
				     INNER JOIN peserta USING (nokp_peserta)
					 INNER JOIN kelas USING (kod_kelas)
					 INNER JOIN hakim USING (login_id)
				  GROUP BY id
				  ORDER BY nama_peserta";
	}
	$mysql = $query;
	$result = mysqli_query($conn, $mysql) or die(mysql_error());
	
	$bil = 0;
	
	if (mysqli_num_rows($result) > 0)
	{
		//table untuk paparan data
		echo "<table border='0'>";
		echo "<col width='10'>";      //saiz column 1
		echo "<col width='100'>";     //saiz column 2
		echo "<col width='250'>";     //saiz column 3
		echo "<col width='100'>";     //saiz column 4
		echo "<col width='100'>";     //saiz column 5
		echo "<col width='100'>";     //saiz column 6
		echo "<col width='100'>";     //saiz column 7
		echo "<col width='80'>";      //saiz column 8
		echo "<col width='200'>";     //saiz column 9
		echo "<col width='30'>";      //saiz column 10
		echo "<tr>";
		echo "<th></th>";             //saiz column 1
		echo "<th>Bil</th>";          //saiz column 2
		echo "<th>Nama Peserta</th>"; //saiz column 3
		echo "<th>Lancar</th>";       //saiz column 4
		echo "<th>Lagu</th>";         //saiz column 5
		echo "<th>Suara</th>";        //saiz column 6
		echo "<th>Tertib</th>";       //saiz column 7
		echo "<th>JUMLAH</th>";       //saiz column 8
		echo "<th>Hakim</th>";        //saiz column 9
		echo "<th></th>";             //saiz column 10
		echo "</tr>";
		
		//papar semua data dari jadual di DB
		while($row = mysqli_fetch_assoc($result))
		{
		$bil++;
		
		echo "<tr height='10'>";
		echo "<td></td>";
		echo "<td>".$bil.".</td>";
		echo "<td>".$row['nama_peserta']."<br>
		           - ".$row['nama_kelas']."</td>";
		echo "<td>".$row['lancar']."</td>";
		echo "<td>".$row['lagu']."</td>";
		echo "<td>".$row['suara']."</td>";
		echo "<td>".$row['tertib']."</td>";
		echo "<td>".$row['jumlah']."</td>";
		echo "<td>".$row['nama']."</td>";
		echo "<td></td>";
		echo "</tr>";
		}
	    echo "</table>";
	} 
else { echo "<center>Tiada rekod</center>"; }
?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>