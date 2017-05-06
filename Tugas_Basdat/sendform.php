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
		
		$checkNIP = "SELECT NIP From _doswal WHERE NamaD = '$Doswal'";
		$checkquery = mysql_query ($checkNIP, $link);
		
		while($row = mysql_fetch_array($checkquery)) {
			$NIP = $row['NIP'];
		}
		
		$putdata = "INSERT INTO _mahasiswa (NRP, Nama, Asal, Tanggal, NIP) VALUES ('$NRP', '$Nama', '$Asal', '$Tanggal', '$NIP')";
		$dataquery = mysql_query ($putdata, $link);
		
		if (!$dataquery) {
			die('Could not enter data : '.mysql_error());
		} else {
			echo "Data added";
		}
	?>
	<br><br>
	<a href="AdminForm.php">Input Lagi</a>
	<br><br>
	<a href="admin.php">Kembali ke Main Menu</a> 
</body>
</html>