<?php
//session
include('session.php');
?>
<html>
<head>
<style>
ul
{
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #FFB6C1;
   background-image: -webkit-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: -moz-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: -ms-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: -o-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: linear-gradient(to bottom, #FFB6C1, #00FF7F);
  }
li
{
  float: left;
  }
li a, .dropbtn
{
  display: inline-block;
  color: white;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-weight: bold;
  }
li a:hover, .dropdown:hover .dropbtn
{
  background-color: Gold;
  color: black;
  }
li.dropdown
{
  display: inline-block;
  float:right;
  }
a
{
  font-family: 'Trebuchet MS', sans-serif;
  }
.dropdown-content
{
  display: none;
  position: absolute;
  right: 17; /*adjust */
  background-color: lightgray;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  }
.dropdown-content a
{
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: right;
  }
.dropdown-content a:hover {background-color: Gold;}

.dropdown:hover .dropdown-content
{
display: block;
}
</style>
</head>
<body>

<?php
if ($kat == "U") // Menu Urusetia
{
    $link ='<a href="skor_semua.php">';
	$menu1='<a href="borang_hakim.php">Senarai Hakim</a>';
	$menu2='<a href="senarai_peserta.php">Senarai Peserta</a>';
	$menu3='<a href="kelas.php">kelas</a>';
	$menu4='<a href="skor_semua.php">Skor Peserta</a>';
}
else  //Menu Hakim
{
	$link ='<a href="skor_semua.php">';
	$menu1='<a href="borang_skor.php">Borang Skor</a>';
	$menu2='<a href="skor.php">Skor</a>';
	$menu3='';
	$menu4='';
}
?>

<ul>
  <li><?php echo $link; ?>Utama</a></li>
  
  <li class="dropdown">
  <a href="#" class="dropbtn">Hai, <?php echo $nama; ?></a>
    <div class="dropdown-content">
	  <!-- menu yang berbeza untuk pengguna yang berlainan -->
	  <?php
	     echo $menu1;
		 echo $menu2;
		 echo $menu3;
		 echo $menu4;
		?>
		<a href="logout.php">Log Keluar</a>
	</div>
  </li>
</ul>
</body>
</html>