<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	ini_set("display_errors","Off");
	$level				= $_SESSION['level'];
	$idPinjam			= $_REQUEST['idPinjam'];
	$cancelPinjam		= $_REQUEST['cancelPinjam'];
	
	
	if($cancelPinjam=='cancelPinjam'){
		mysql_query("UPDATE pinjam SET 
			statusPengembalian = '2',
			tglCancel = NOW(),
			keterangan = 'Cancel Pinjam'
		WHERE idPinjam = '$idPinjam'");
	}else{
		mysql_query("UPDATE pinjam SET 
			statusPengembalian = '1'
		WHERE idPinjam = '$idPinjam'");
	}
?>
