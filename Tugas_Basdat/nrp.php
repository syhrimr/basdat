<?php
	include "login.php";
	
	if(isset($_SESSION['login_user'])) {
		header("location: Mhs.php");
	}
?>

<html>
<head>
	<title>Login Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<center>
	<div>
	<form class="login-form" method="post" action="#">
		<table>
			<tr>
			<td><p id="title">Log In</p></td>
			</tr>
			
			<tr>
			<td><span style="color:red"><?php echo $error; ?><span></td>
			</tr>
			
			<tr>
			<td><input type="text" id="NRP" name="NRP" placeholder="NRP" maxlength="3"></td>
			</tr>
			
			<tr>
			<td><input type="text" id="Nama" name="Nama" placeholder="Nama"></td>
			</tr>
			
			<tr>
			<td><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>
	</div>
	</center>
</body>
</html>