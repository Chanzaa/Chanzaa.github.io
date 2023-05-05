<?php
//header dan menu atas
include ("header.php");
include ("topnav.php");
?>
<html>
<head>
<style>
#mainbody
{
  background-color: white;
  padding: 50px;
  }
#tajuk
{
    font-size: 30px;
	font-family: Tw Cen MT Condensed;
	font-weight: bold;
	text-align: center;
	}
table {
    border: 2px #18f27a;
  background-image: -webkit-linear-gradient(top, #18f27a, #3498db);
  background-image: -moz-linear-gradient(top, #18f27a, #3498db);
  background-image: -ms-linear-gradient(top, #18f27a, #3498db);
  background-image: -o-linear-gradient(top, #18f27a, #3498db);
  background-image: linear-gradient(to bottom, #18f27a, #3498db);
	border-collapse: collapse;
	margin: auto;
	font-weight: bold;
	background-color: PaleGreen;
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
<!-- form action akan bawa pengguna untuk proses seterusnya
     selepas pengguna klik butang Log Masuk -->
<form action="proses_login.php" method="POST">
<div id="tajuk">Log Masuk Urusetia/Hakim</div><p>

<table cellpading=5px>
<tr>
    <td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
    <td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td>Login ID :</td>
	<td><input type="text" name="login" required></td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td>Kata Laluan :</td>
	<td><input type="password" name="katalaluan" required></td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td>Kategori :</td>
	<td><input type="radio" name="kat" value="U" required>Urusetia
	    <input type="radio" name="kat" value="H">Hakim
	</td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td></td>
	<td style="text-align: right;">
	    <input type="submit" name="loginBtn" value="Log Masuk"></td>
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