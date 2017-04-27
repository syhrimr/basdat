<?php
	$mysqlserver = 'localhost';
    $mysqlusername = 'root';
    $mysqlpassword = '';
	$db = 'basisdata';
		
    $link = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword);
		
	if (!$link) {
		die ('Error connecting to mysql server: '.mysql_error());
	}
		
	mysql_select_db($db, $link);
?>