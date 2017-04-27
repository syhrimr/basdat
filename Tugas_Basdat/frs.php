<?php
	include "session.php";
?>

<html>
<head>
	<title>Formulir Rencana Studi</title>
	<link rel="stylesheet" type="text/css" href="css/table2.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>
	<ul>
		<li><a href="Mhs.php">Home</a></li>
		<li><a href="MhsForm.php">Isi Data</a></li>
		<li class="dropdown">
			<a href="#!" class="dropbtn">Tabel</a>
			<div class="dropdown-content">
				<a href="MhsTableMhs.php">Mahasiswa</a>
				<a href="MhsTableDsn.php">Dosen</a>
				<a href="MhsTableMtk">Mata Kuliah</a>
			</div>
		</li>
		<li><a class="link" href="#">FRS</a></li>
		<li style="float:right"><a href="logout.php">Logout</a></li>
	</ul>
	
	<center class="center">
	
	<h2>Formulir Rencana Studi (FRS)</h2>
	
	<table id="data" cellpadding="4" cellspacing="0">
		<tr>
		<td width="80"><strong>NRP</strong></td>
		<td width="10" align="center"><strong>:</strong></td>
		<td width="250"><?php echo $nrp_session; ?></td>
		
		<td width="80"><strong>Semester</strong></td>
		<td width="10" align="center"><strong>:</strong></td>
		<td width="250"><?php echo $smt_session; ?></td>
		</tr>
		
		<tr>
		<td width="80"><strong>Nama</strong></td>
		<td width="10" align="center"><strong>:</strong></td>
		<td width="250"><?php echo $login_session; ?></td>
		
		<td width="80"><strong>Dosen Wali</strong></td>
		<td width="10" align="center"><strong>:</strong></td>
		<td width="250"><?php echo $doswal_session; ?></td>
		</tr>
	</table>
	
	<br><br>
	
	<form method="post" action="#">
		Pilih Mata Kuliah :
		<select name="matkul" style="width:30%; height:5%">
			<?php include "mtk-select.php"; ?>
		</select>
		<input type="submit" name="submit" value="Ambil">
			<?php include "mtk-get.php"; ?>
	</form>
	
	<span style="color:red; font-weight:bold"><?php echo $error; ?><span><br><br>
	
	<table class="table">
		<tr class="tr">
		<th class="th">Kode</th>
		<th class="th">Mata Kuliah</th>
		<th class="th">SKS</th>
		<th class="th">Dosen</th>
		<th class="th">Drop</th>
		</tr>
		<?php
			$select = "SELECT a.Kode, a.NamaM, a.SKS, c.NamaD
						FROM _matakuliah a, _frs b, _doswal c
						WHERE b.Kode = a.Kode AND a.NIP = c.NIP AND b.NRP = '$nrp_session'";
			$s_query = mysql_query($select, $link);
			
			while($row = mysql_fetch_array($s_query)) {
				echo "<tr class='tr'>
					<td class='td'>" . $row['Kode'] . "</td>
					<td class='td'>" . $row['NamaM'] . "</td>
					<td id='sks' class='td'>" . $row['SKS'] . "</td>
					<td class='td'>" . $row['NamaD'] . "</td>
					<td class='td'>";
		?>
		<form action="drop.php" method="get">
			<input type="hidden" name="kode" value="<?php echo $row['Kode']; ?>" />
			<input type="submit" value="Drop" />
		</form></td>
		</tr>
		<?php
			}
		?>
	</table>
	</center>
</body>
</html>