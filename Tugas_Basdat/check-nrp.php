<?php
	include 'conn-mysqli.php';
		
    $nrp = $dbConnection->real_escape_string($_POST['NRP']);
    $sqlUser = 'SELECT NRP FROM _mahasiswa WHERE NRP = "'.$nrp.'"';
    $resUser = $dbConnection->query($sqlUser);
    if($resUser === false) {
        trigger_error('Error: ' . $dbConnection->error, E_USER_ERROR);
    } else {
        echo $rows_returned = $resUser->num_rows;
    } 
?>