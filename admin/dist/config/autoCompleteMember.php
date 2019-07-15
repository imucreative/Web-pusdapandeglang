<?php
	include "conn.php";
	include "library.php";

	$term = trim(strip_tags($_GET['term']));

	$qstring = "SELECT * FROM member WHERE statusDelete='0' AND namaMember LIKE '".$term."%' ORDER BY namaMember ASC";
	$result = mysql_query($qstring);
	
	while ($row = mysql_fetch_array($result)){
		$row['label']=htmlentities(stripslashes($row['namaMember']));
		$row['value']=htmlentities(stripslashes($row['idMember']));
		$row_set[] = $row;
	}
	echo json_encode($row_set);
?>