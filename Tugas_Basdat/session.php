<?php
	include "connect.php";
	
	session_start();
	
	$user_check = $_SESSION['login_user'];
	
	$ses_sql1 = mysql_query("SELECT * FROM _mahasiswa WHERE Nama = '$user_check'");
	$ses_sql2 = mysql_query("SELECT b.NamaD FROM _doswal b, _mahasiswa a WHERE a.Nama = '$user_check' AND b.NIP = a.NIP");
	$row1 = mysql_fetch_assoc($ses_sql1);
	$row2 = mysql_fetch_assoc($ses_sql2);
	
	$nrp_session = $row1['NRP'];
	$login_session = $row1['Nama'];
	$smt_session = $row1['Semester'];
	$doswal_session = $row2['NamaD'];
	
	if(!isset($login_session)) {
		mysql_close($link);
		header('Location: nrp.php');
	}
?>