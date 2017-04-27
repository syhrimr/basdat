<?php include "session.php"; ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Form Isi Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script type="text/javascript" src="js/checkInput.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
			$('#NRP').keyup(function(){
				var NRP = $('#NRP').val();
				if(NRP.length > 2) {
					$('#result').html('Loading..');
					var post_string = 'NRP='+NRP;
					$.ajax({
						type : 'POST',
						data : post_string,
						url  : 'check-nrp.php',
						success: function(responseText){
							if(responseText == 0) {
								$('#result').html('<span class="success" style="color:green">Available</span>');
							}else if(responseText > 0) {
								$('#result').html('<span class="error" style="color:red">NRP already taken</span>');
							} else {
								alert('Problem with mysql query');
							}
						}
					});
				}else {
					$('#result').html('');
				}
			});
		});
	</script>
</head>
<body>
	<?php include "connect.php"; ?>
	<center>
		<ul>
			<li><a href="Mhs.php">Home</a></li>
			<li><a href="#">Isi Data</a></li>
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
		<h2>Form Pengisian Identitas Mahasiswa</h2>
		<form id="reg-form" method="post" action="sendform.php">
				<table>
					<tr>
					<td>NRP</td>
					<td>
						<input type="text" id="NRP" name="NRP" maxlength="3" onkeypress="return isNumberKey(event)" onkeyup="checkNrp()" required>
						<div class="result" id="result"></div>
					</td>
					</tr>

					<tr>
					<td>Nama</td>
					<td><input type="text" name="Nama" maxlength="40" onkeypress="return onlyAlphabets(event)" required></td>
					</tr>
					
					<tr>
					<td>Asal</td>
					<td><input type="text" name="Asal" maxlength="20" onkeypress="return onlyAlphabets(event)"></td>
					</tr>
					
					<tr>
					<td>Tanggal Lahir</td>
					<td><input type="date" name="Tanggal" min="1990-01-01" max="2000-12-31"></td>
					</tr>	
					
					<tr>
					<td>Dosen Wali</td>
					<td><select name="Doswal">
						<?php				
							$dataquery = "SELECT NamaD FROM _doswal";
							$dataresult = mysql_query($dataquery) or die ("Query to get data from _dosenwali failed: ".mysql_error());
							
							while ($datarow = mysql_fetch_array($dataresult)) {
								$dataTitle = $datarow["NamaD"];
								echo "<option>$dataTitle</option>";
							}
						?>
					</select></td>
					</tr>	
				</table>
				<input type="submit" name="submit" value="Submit" onclick="toSend();">
		</form>
	</center>
</body>
</html>