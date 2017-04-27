<?php			
	include "connect.php";
					
	$dataquery = "SELECT * FROM _matakuliah";
	$result1 = mysql_query($dataquery, $link);
								
	while ($datarow1 = mysql_fetch_array($result1)) {
		$dataKode = $datarow1["Kode"];
		$dataNama = $datarow1["NamaM"];
		$dataSKS  = $datarow1["SKS"];
				
		echo "<option>$dataKode | $dataNama | $dataSKS SKS";
	}
		
?>