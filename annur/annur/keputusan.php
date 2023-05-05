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
   background-color: #f2f2f2;
 }  
 td {
   text-align: left;
   height: 30px;
 }
 tr:nth-child(even) { 
    background-color: #ffebcc;
 } 
 tr td {
  text-align: center;
 }
 tr td:nth-child(3) {
   text-align: left;
 } 
 th {
     height: 30px;
     text-align: center; 
     font-weight: bold;
     color: white; 
     background-color: DeepPink;
 }
 </style> 
 </head>

 <body>

 <div id="mainbody">
     <div id="tajuk"><p>KEPUTUSAN PERTANDINGAN</p></div>

 <?php 
 $mysql = "SELECT *,
          SUM(lancar + lagu + suara + tertib)
               AS jumlah
          FROM skor
            INNER JOIN peserta USING (nokp_peserta)
            INNER JOIN kelas USING (kod_kelas)
            INNER JOIN hakim USING (login_id) 
          GROUP BY nokp_peserta
          ORDER BY jumlah DESC 
            LIMIT 10"; //limit 10 saja pemenang
      
 $result = mysqli_query($conn, $mysql) or die(mysql_error());

 $bil = 0;

 if (mysqli_num_rows($result) > 0)
 {
   //kira hakim
   $semak = "SELECT COUNT(login_id) AS bil_hakim FROM hakim"; 
   $res = mysqli_query($conn, $semak) or die(mysql_error()); 
   $row2 = mysqli_fetch_array($res);

   //table untuk paparan data 
   echo "<table border='0'>";
   echo "<col width='10'>";     //saiz column 1
   echo "<col width='150'>";    //saiz column 2
   echo "<col width='250'>";    //saiz column 3 
   echo "<col width='100'>";    //saiz column 4 
   echo "<col width='30'>";     //saiz column 5
   echo "<tr>";
   echo "<th></th>";                     //column 1
   echo "<th>Ranking</th>";              //column 2
   echo "<th>Nama Pemenang</th>";        //column 3
   echo "<th>Markah</th>";               //column 4
   echo "<th></th>";                     //column 5
   echo "</tr>"; 
   
   //papar semua data dari jadual di DB
   while($row = mysqli_fetch_assoc($result))
   {
   $bil++;
  
   //kira purata skor yang diberi oleh hakim 
   $skor = $row['jumlah'] / $row2['bil_hakim'];
  
  echo "<tr height='10'>";
  echo "<td></td>";
  echo "<td>".$bil.".</td>"; 
  echo "<td>".$row['nama_peserta']."<br>- " 
             .$row['nama_kelas']."</td>";
  echo "<td>".$skor."</td>";
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
 