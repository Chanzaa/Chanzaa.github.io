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
<?php
//dapatkan ID skor
$ids = $_GET['ids'];

###### jika user klik butang EDIT SKOR, ##############
###### update record dalam jadual       ##############
if(isset($_POST['edit']))
{
 $sql = "UPDATE skor
         SET lancar = '".$_POST["skor1"]."',
		     lagu = '".$_POST["skor2"]."',
			 suara = '".$_POST["skor3"]."',
			 tertib = '".$_POST["skor4"]."'
		 WHERE id = '$ids'";
		 
 if (mysqli_query($conn, $sql)) {
   echo '<script>alert("Berjaya Kemaskini Skor Peserta!");
            window.location.href="skor.php";
		 </script>';
 } else {
   echo "Error ; " . mysqli_error($conn);    }
}
############ PROSES UPDATE TAMAT ######################

//dapatkan data skor peserta
$sql2 = "SELECT * FROM skor
         INNER JOIN peserta USING (nokp_peserta)
		 WHERE id = '$ids'";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error());
$row2 = mysqli_fetch_array($result2);

?>

<div id="mainbody">
<form action="edit_skor.php?ids=<?php echo $ids; ?>"
      method="POST">
<div id="tajuk">Kemaskini Skor Peserta</div><p>

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
  <td><?php echo $row2['nama_peserta']; ?></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Lancar :</td>
  <td><input type="number" name="skor1" min="1" max="50"
             value="<?php echo $row2['lancar']; ?>"
			 required> /50</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Lagu :</td>
  <td><input type="number" name="skor2" min="1" max="30"
             value="<?php echo $row2['lagu']; ?>"
			 required> /30</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Suara :</td>
  <td><input type="number" name="skor3" min="1" max="10"
             value="<?php echo $row2['suara']; ?>"
			 required> /10</td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td>Tertib :</td>
  <td><input type="number" name="skor4" min="1" max="10"
             value="<?php echo $row2['tertib']; ?>"
			 required> /10</td>
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
  <td><input type="button" name="back" value="KEMBALI"
             onClick="javascript:history.go(-1)"></td>
  <td><input type="submit" name="edit" value="EDIT SKOR">
      </td>
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