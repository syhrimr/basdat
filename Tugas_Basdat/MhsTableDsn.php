<?php include "session.php"; ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Tabel Data Dosen</title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
	<center>
		<ul>
			<li><a href="Mhs.php">Home</a></li>
			<li><a href="MhsForm.php">Isi Data</a></li>
			<li class="dropdown">
				<a href="#!" class="dropbtn">Tabel</a>
				<div class="dropdown-content">
					<a href="MhsTableMhs.php">Mahasiswa</a>
					<a href="#">Dosen</a>
					<a href="MhsTableMtk.php">Mata Kuliah</a>
				</div>
			</li>
			<li><a class="link" href="frs.php">FRS</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
		</ul>
	
		<h2>Tabel Dosen Teknik Multimedia dan Jaringan FTI-ITS</h2>
		
		<table id="tblDsn">
			<tr>
				<th>NIP</th>
				<th>Nama</th>
			</tr>
			<?php
				include "connect.php";
				
				$selecttable = "SELECT * FROM _doswal";
				$result = mysql_query($selecttable, $link);

				while ($row = mysql_fetch_assoc($result)) {
					echo
						"<tr>
						<td>" . $row['NIP'] . "</td>
						<td>" . $row['NamaD'] . "</td>
						</tr>";
				}
			?>
		</table>
	</center>
</body>
</html>