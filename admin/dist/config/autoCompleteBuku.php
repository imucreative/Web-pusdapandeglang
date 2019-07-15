<?php
	include "conn.php";
	include "library.php";

	$term = trim(strip_tags($_GET['term']));

	$qstring = "SELECT * FROM buku WHERE statusDelete='0' AND jumlahBuku!='0' AND judulBuku LIKE '".$term."%' ORDER BY judulBuku ASC";
	$result = mysql_query($qstring);
	
	while ($row = mysql_fetch_array($result)){
		$row['label']=htmlentities(stripslashes($row['judulBuku']));
		$row['value']=htmlentities(stripslashes($row['idBuku']));
		$row_set[] = $row;
	}
	echo json_encode($row_set);
?>