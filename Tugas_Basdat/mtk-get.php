<?php
	include "connect.php";
	
	$error = '';
	$jumlah = 0;
	
	if(isset($_POST['submit'])) {
		$nrp = $nrp_session;
		$matkul = $_POST["matkul"];
		
		if(strlen($matkul) > 10) {
			$matkul = substr($matkul, 0, 5);
		}
		
		$check = "SELECT Kode FROM _frs WHERE Kode = '$matkul' AND NRP = '$nrp'";
		$query3 = mysql_query($check, $link);
		$baris = mysql_num_rows($query3);
		
		if($baris == 1) {
			echo '<script language="javascript">';
			echo 'alert("Kelas sudah diambil")';
			echo '</script>';
		} else {
			$count = "SELECT COUNT(b.ID) AS id FROM _frs a, _matakuliah b
					WHERE a.Kode = '$matkul' AND b.Kode = a.Kode";
			$query1 = mysql_query($count, $link);
			//inisiasi jumlah [Kode] di database
			while($datarow = mysql_fetch_assoc($query1)) {
				$jumlah = $datarow['id'];
				if($jumlah >= 3) {
					$error = "Kelas sudah penuh";
				} else {
					$insert = "INSERT INTO _frs (Kode, NRP)
								VALUES ('$matkul', '$nrp')";
					$query2 = mysql_query($insert, $link);
				}
			}
		}
	}
?>