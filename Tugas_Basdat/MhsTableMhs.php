<?php 
	include "session.php";
	include "connect.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Tabel Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script language="javascript" type="text/javascript" src="js/jquery-2.2.3.min"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#search').keyup(function()
			{
				searchTable($(this).val());
			});
		});
		 
		function searchTable(inputVal)
		{
			var table = $('#tblData');
			table.find('tr').each(function(index, row)
			{
				var allCells = $(row).find('td');
				if(allCells.length > 0)
				{
					var found = false;
					allCells.each(function(index, td)
					{
						var regExp = new RegExp(inputVal, 'i');
						if(regExp.test($(td).text()))
						{
							found = true;
							return false;
						}
					});
					if(found == true)
						$(row).show();
					else
						$(row).hide();
				}
			});
		}
	</script>
</head>
<body>
	<center>
		<ul>
			<li><a href="Mhs.php">Home</a></li>
			<li><a href="MhsForm.php">Isi Data</a></li>
			<li class="dropdown">
				<a href="#!" class="dropbtn">Tabel</a>
				<div class="dropdown-content">
					<a href="#">Mahasiswa</a>
					<a href="MhsTableDsn.php">Dosen</a>
					<a href="MhsTableMtk.php">Mata Kuliah</a>
				</div>
			</li>
			<li><a class="link" href="frs.php">FRS</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
		</ul>
		
		<h2>Data Mahasiswa Teknik Multimedia dan Jaringan FTI-ITS</h2>
	
		<form action="#" method="get" onsubmit="return false;">
		Search
		<input type="text" size="30" name="search" id="search"/>
		</form>
		<br><br>
		<table id="tblData">
			<tr>
				<th>NRP</th>
				<th>Nama</th>
				<th>Asal</th>
				<th>Tanggal</th>
				<th>Doswal</th>
			</tr>
			<?php	
				$selecttable = "SELECT a.NRP, a.Nama, a.Asal, a. Tanggal, b.NamaD
								FROM _mahasiswa a, _doswal b
								WHERE a.NIP = b.NIP";
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