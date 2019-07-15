<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	ini_set("display_errors","Off");
	$level				= $_SESSION['level'];
	$idPinjam			= $_REQUEST['idPinjam'];
	
	$query		= mysql_query("SELECT * FROM pinjam WHERE idPinjam='$idPinjam'");
	$data		= mysql_fetch_array($query);
	$sekarang	= date('Y-m-d');
	$selisih	= ((abs(strtotime ($data['tglPengembalian']) - strtotime ($sekarang)))/(60*60*24));
	
	if($sekarang>$data['tglPengembalian']){
		$denda	= $selisih*5000;
	}else{
		$denda	= "0";
	}
	
	mysql_query("UPDATE pinjam SET
		tglDikembalikan = NOW(),
		denda = '$denda',
		statusPengembalian = '2'
	WHERE idPinjam = '$idPinjam'");
	
	$queryCekIdPinjam = mysql_query("SELECT * FROM pinjambanyakbuku WHERE pinjambanyakbuku.idPinjam='$idPinjam' AND statusDelete='0'");
	while($dataCekIdPinjam = mysql_fetch_array($queryCekIdPinjam)){
		$queryBuku = mysql_query("SELECT * FROM buku WHERE idBuku='$dataCekIdPinjam[idBuku]'");
		$dataBuku = mysql_fetch_array($queryBuku);
		$jumlahBuku	= $dataBuku['jumlahBuku'];
		$sisaBuku	= $jumlahBuku + 1;
		
		mysql_query("UPDATE buku SET jumlahBuku = '$sisaBuku' WHERE idBuku = '$dataBuku[idBuku]'");
	}
?>