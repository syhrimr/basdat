<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tabel Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/dropdown.css">
	<script type="text/javascript" src="js/dropdown.js"></script>
	<script type="text/javascript" src="js/checkInput.js"></script>
</head>
<body>
	<center>
		<ul>
			<li><a class="link" href="Admin.php">Home</a></li>
			<li><a class="link" href="AdminForm.php">Isi Data</a></li>
			<li class="dropdown">
				<a href="#!" class="dropbtn">Tabel</a>
				<div class="dropdown-content">
					<a class="link" href="#">Mahasiswa</a>
					<a class="link" href="AdminTableDsn.php">Dosen</a>
					<a class="link" href="AdminTableMtk.php">Mata Kuliah</a>
				</div>
			</li>
			<li><a class="link" href="frs.php">FRS</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
		</ul>
		
		<h2>Data Mahasiswa Teknik Multimedia dan Jaringan FTI-ITS</h2>
		
		<form name="form" method="post" action="#">
			NRP
			<input type="text" name="NRP2" maxlength="3" onkeypress="return isNumberKey(event)" >
			<div class="dropdown">
				<button class="dropbtn">Select</button>
					<div id="myDropdown" class="dropdown-content">
						<input type="submit" value="Edit" onclick="toEdit()">
						<input type="submit" value="Delete" onclick="checkDelete()">
					</div>
				</button>
			</div>
		</form>
		<br><br>
		
		<table>
			<tr>
				<th>NRP</th>
				<th>Nama</th>
				<th>Asal</th>
				<th>Tanggal</th>
				<th>Doswal</th>
			</tr>
			<?php
				include "connect.php";
				
				$selecttable = "SELECT a.NRP, a.Nama, a.Asal, a. Tanggal, b.NamaD
								FROM _mahasiswa a, _doswal b
								WHERE a.NIP = b.NIP";;
				$result = mysql_query($selecttable, $link);

				while ($row = mysql_fetch_assoc($result)) {
					echo
						"<tr>
						<td>" . $row['NRP'] . "</td>
						<td>" . $row['Nama'] . "</td>
						<td>" . $row['Asal'] . "</td>
						<td>" . $row['Tanggal'] . "</td>
						<td>" . $row['NamaD'] . "</td>
						</tr>";
				}
			?>
		</table>
	</center>
</body>
</html>