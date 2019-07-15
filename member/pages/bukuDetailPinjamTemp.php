<?php
	include"../../attr/config/conn.php";
	include"../../attr/config/library.php";
	
	$idMember	= $_REQUEST['idMember'];
	$idBuku		= $_REQUEST['idBuku'];
	
	mysql_query("INSERT INTO pinjamtemp(idPinjamTemp, idBUku, idMember) VALUES('', '$idBuku', '$idMember')");
?>