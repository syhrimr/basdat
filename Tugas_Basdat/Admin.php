<!DOCTYPE HTML>
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
			<li><a class="link" href="#">Home</a></li>
			<li><a class="link" href="AdminForm.php">Isi Data</a></li>
			<li class="dropdown">
				<a href="#!" class="dropbtn">Tabel</a>
				<div class="dropdown-content">
					<a class="link" href="AdminTableMhs.php">Mahasiswa</a>
					<a class="link" href="AdminTableDsn.php">Dosen</a>
					<a class="link" href="AdminTableMtk.php">Mata Kuliah</a>
				</div>
			</li>
			<li><a class="link" href="frs.php">FRS</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
		</ul>
		
		<img id="welcome" src="img/welcome-text.png"></img>
	</center>
</body>
</html>