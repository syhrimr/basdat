<?php
	include "connect.php";
	
	session_start();
	$error = '';
	
	if(isset($_POST['submit'])) {
		if(empty($_POST['NRP']) || empty($_POST['Nama'])) {
			$error = "NRP or Nama is invalid";
		} else {
			$nrp = $_POST['NRP'];
			$nama = $_POST['Nama'];
			
			$nrp = stripslashes($nrp);
			$nama = stripslashes($nama);
			$nrp = mysql_real_escape_string($nrp);
			$nama = mysql_real_escape_string($nama);
			
			$query = mysql_query("SELECT * FROM _mahasiswa
									WHERE NRP = '$nrp' AND Nama = '$nama'");
			$rows = mysql_num_rows($query);
			
			if($rows == 1) {
				$_SESSION['login_user'] = $nama;
				header("location: Mhs.php");
			} else {
				$error = "NRP or Nama is invalid";
			}
			mysql_close($link);
		}
	}
?>