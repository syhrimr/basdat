<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
	<?php
		include "connect.php";

		$NRP = $_POST['NRP'];
		$Nama = $_POST['Nama'];
		$Asal = $_POST['Asal'];
		$Tanggal = $_POST['Tanggal'];
		$Doswal = $_POST['Doswal'];
		
		$putdata = "INSERT INTO _mahasiswa (NRP, Nama, Asal, Tanggal, Doswal) VALUES ('$NRP', '$Nama', '$Asal', '$Tanggal', '$Doswal')";
		$dataquery = mysql_query ($putdata, $link);
		
		if (!$dataquery) {
			die('Could not enter data : '.mysql_error());
		} else {
			echo "Data added";
		}
	?>
	<br><br>
	<a href="asMhsForm.php">Input Lagi</a>
	<br><br>
	<a href="asMhs.php">Kembali ke Main Menu</a> 
</body>
</html>