<?php
	include 'connect.php';
		
    $nrp = $_POST['NRP'];
    $sqlUser = "SELECT NRP FROM _mahasiswa WHERE NRP = '$nrp'";
    $resUser = mysql_query($sqlUser);
	
    if($resUser === false) {
        trigger_error('Error: ' . $dbConnection->error, E_USER_ERROR);
    } else {
        echo $rows_returned = $resUser->num_rows;
    } 
?>