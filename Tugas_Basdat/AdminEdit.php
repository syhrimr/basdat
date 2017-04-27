<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
	<?php include "connect.php"; 
	
		$nrp_ = $_POST['NRP2'];
		
		$select = "SELECT * FROM _mahasiswa a, _doswal b
					WHERE NRP = '$nrp_' AND a.NIP = b.NIP";
		$result = mysql_query($select, $link);
		
		while ($datarow = mysql_fetch_array($result)) {
			$dataNRP = $datarow["NRP"];
			$dataNama = $datarow["Nama"];
			$dataAsal = $datarow["Asal"];			
			$dataDate = $datarow["Tanggal"];			
			$dataDoswal = $datarow["NamaD"];
		}
	?>
		
	<center>
		<ul>
			<li><a class="link" href="Admin.php">Home</a></li>
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
		
		<h2>Edit Data Mahasiswa</h2>
		<form method="post" action="sendedit.php">
				<table>
					<tr>
					<td>NRP</td>
					<td><input type="text" name="NRP" maxlength="3" onchange="nrpValidation()" value="<?php echo $dataNRP ?>" readonly></td>
					</tr>
				
					<tr>
					<td>Nama</td>
					<td><input type="text" id="Nama" name="Nama" maxlength="40" value="<?php echo $dataNama ?>" required></td>
					</tr>
					
					<tr>
					<td>Asal</td>
					<td><input type="text" name="Asal" maxlength="20" value="<?php echo $dataAsal ?>" required></td>
					</tr>
					
					<tr>
					<td>Tanggal Lahir</td>
					<td><input type="date" name="Tanggal" value="<?php echo $dataDate; ?>" required></td>
					</tr>	
					
					<tr>
					<td>Dosen Wali</td>
					<td><select id='Doswal' name="Doswal" required>
						<option selected><?php echo $dataDoswal ?></option>
						<?php				
							$dataquery = "SELECT NamaD FROM _doswal WHERE NamaD != '$dataDoswal'";
							$dataresult = mysql_query($dataquery) or die ("Query to get data from _dosenwali failed: ".mysql_error());
							
							while ($datarow = mysql_fetch_array($dataresult)) {
								$dataTitle = $datarow["NamaD"];
								echo "<option>$dataTitle</option>";
							}
						?>
					</select></td>
					</tr>	
				</table>
				<input type="submit" value="Submit">
		</form>
	</center>
</body>
</html>