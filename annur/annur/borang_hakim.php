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
table
{
    border: 2px solid black;
	border-collapse: collapse;
	margin: auto;
	font-weight: bold;
	background-color: Aquamarine;
	}
td:nth-child(2)
{
    text-align: right;
	}
td:nth-child(3)
{
    text-align: left;
	}
</style>
</head>
<body>

<div id ="mainbody">
<form action="proses_hakim.php" method="POST">
    <div id="tajuk">Borang Daftar Hakim (Sign Up)</div><p>
	
<table cellpadding=5px>
<tr>
    <td style-"width: 20px"></td>
	<td></td>
	<td></td>
	<td style-"width: 20px"></td>
<tr>
    <td></td>
	<td>Login ID :</td>
	<td><input type="text" name="loginid" required></td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td>Kata Laluan :</td>
	<td><input type="password" name="katalaluan"
	           placeholder="5-8 aksara sahaja" pattern=".{5,8}"
			   title="5-8 aksara sahaja" required></td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td>Nama :</td>
	<td><input type="text" name="nama" required></td>
	<td></td>
</tr>
<tr>
    <td></td>
	<td></td>
	<td style="text-align: right;">
	    <input type="submit" name="daftarBtn" value="Daftar">
		</td>
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
<?php
//paparkan senarai hakim
include ("senarai_hakim.php");
include ("footer.php");
?>
</body>
</html>