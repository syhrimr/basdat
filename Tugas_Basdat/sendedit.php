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
		
		$updatedata = "UPDATE _mahasiswa SET Nama = '$Nama', Asal = '$Asal', Tanggal = '$Tanggal', Doswal = '$Doswal' WHERE NRP = '$NRP'";
		$dataquery = mysql_query ($updatedata, $link);
		
		if (!$dataquery) {
			die('Could not enter data : '.mysql_error());
		} else {
			echo "Data added";
		}
	?>
	<br><br>
	<a href="form.php">Input Lagi</a>
	<br><br>
	<a href="main.php">Kembali ke Main Menu</a> 
</body>
</html>