<?php
	include "session.php";
	include "connect.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Tabel Mata Kuliah</title>
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
					<a href="MhsTableDsn.php">Dosen</a>
					<a href="#">Mata Kuliah</a>
				</div>
			</li>
			<li><a class="link" href="frs.php">FRS</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
		</ul>	
	
		<h2>Daftar Mata Kuliah Teknik Multimedia dan Jaringan</h2>
		
		<table id="tblMtk">
			<tr>
				<th>Kode</th>
				<th>Nama Mata Kuliah</th>
				<th>SKS</th>
				<th>Dosen</th>
			</tr>
		<?php
			$selecttable = "SELECT * FROM _matakuliah a, _doswal b
							WHERE a.NIP = b.NIP";
			$result = mysql_query($selecttable, $link);

			while ($row = mysql_fetch_assoc($result)) {
				echo
					"<tr>
					<td>" . $row['Kode'] . "</td>
					<td>" . $row['NamaM'] . "</td>
					<td>" . $row['SKS'] . "</td>
					<td>" . $row['NamaD'] . "</td>
					</tr>";
			}
		?>
		</table>
	</center>
</body>
</html>