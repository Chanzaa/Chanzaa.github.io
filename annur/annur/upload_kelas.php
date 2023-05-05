<?php
//session
include('session.php');

//dapatkan file .csv tersebut dan simpan dalam temp folder
$file = $_FILES["fail_csv"]["tmp_name"];

//pastikan (verify) hanya file .csv sahaja yang di upload
if (($_FILES["fail_csv"]["type"] == "text/csv"))
{
 //buka dan baca file tersebut, r = readonly
 $file_open = fopen($file,"r");
 
 //selagi masih ada data dalam fail csv tersebut(EOF),
 //baca line by line
 while(($data = fgetcsv($file_open)) !== FALSE)
 {
 $mysql = "INSERT INTO kelas (kod_kelas, nama_kelas)
           VALUES ('".$data[0]."','".$data[1]."')";
		   
   if (mysqli_query($conn, $mysql))
   {
      //papar js popup mesej jika berjaya muat naik soalan
	  echo '<script>alert("Muat naik kelas BERJAYA!");
	                window.location.href="kelas.php";
		    </script>';
   } else {
          echo "Error ; " . mysqli_error($conn);  }
  }
//keluarkan popup msg jika bukan fail .csv
} else {
      echo '<script>alert("Pilih fail .csv sahaja!");
	                window.location.href="kelas.php";
			</script>';
}

//Close connection
mysqli_close($conn);
?>