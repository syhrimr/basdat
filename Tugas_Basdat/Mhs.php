<?php include "session.php"; ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Selamat Datang</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script type="text/javascript" src="js/dropdown.js"></script>
</head>
<body>
	<center>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="MhsForm.php">Isi Data</a></li>
			<li class="dropdown">
				<a href="#!" class="dropbtn">Tabel</a>
				<div class="dropdown-content">
					<a href="MhsTableMhs.php">Mahasiswa</a>
					<a href="MhsTableDsn.php">Dosen</a>
					<a href="MhsTableMtk.php">Mata Kuliah</a>
				</div>
			</li>
			<li><a class="link" href="frs.php">FRS</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
		</ul>
		
		<img id="welcome" src="img/welcome-text.png"></img>
		<h2>Nama : <?php echo $login_session; ?></h2>
		<h2>NRP  : <?php echo $nrp_session; ?></h2>
	</center>
</body>
</html>