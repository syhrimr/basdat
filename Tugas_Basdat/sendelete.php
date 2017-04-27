<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
	<?php
		include "connect.php";

		$nrp_ = $_POST['NRP2'];
		
		$updatedata = "DELETE FROM _mahasiswa WHERE NRP = '$nrp_'";
		$dataquery = mysql_query ($updatedata, $link);
		
		if (!$dataquery) {
			die('Could not enter data : '.mysql_error());
		} else {
			echo "Data deleted";
		}
	?>
	<br><br>
	<a href="form.php">Input Lagi</a>
	<br><br>
	<a href="main.php">Kembali ke Main Menu</a> 
</body>
</html>