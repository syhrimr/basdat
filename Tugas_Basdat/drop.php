<?php
	include "connect.php";
	include "session.php";
	
	$nrp = $nrp_session;
	$kode = $_GET['kode'];
	
	$drop = "DELETE FROM _frs WHERE Kode = '$kode' AND NRP = '$nrp'";
	$query = mysql_query($drop, $link);
	
	if($query) {
		header('location: frs.php');
	}
?>