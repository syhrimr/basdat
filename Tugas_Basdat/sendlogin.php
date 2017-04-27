<?php
	include "connect.php";
	
	$nama = $_POST['Nama'];
	$nrp = $_POST['NRP'];
	
	function SignIn() {
		session_start();
		if(!empty($_POST['Nama'])) {
			$query = mysql_query("SELECT * FROM _mahasiswa WHERE Nama = '$nama' AND NRP = '$nrp'") or die(mysql_error());
			$row = mysql_fetch_array($query) or die(mysql_error());
			
			if(!empty($row['Nama']) AND !empty($row['NRP'])) {
				$_SESSION['Nama'] = $row['NRP'];
				echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
			} else {
				echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
			} 
		}
	}
	
	if(isset($_POST['submit'])) { SignIn(); } 
?>