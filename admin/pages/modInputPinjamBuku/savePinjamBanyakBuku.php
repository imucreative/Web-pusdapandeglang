<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	ini_set("display_errors","Off");
	$level				= $_SESSION['level'];
	$idPinjam			= $_REQUEST['idPinjam'];
	$idBuku				= $_REQUEST['idBuku'];
	$idPinjamBanyakBuku	= $_REQUEST['idPinjamBanyakBuku'];
	$del				= $_REQUEST['del'];
	
	$tahun					= date('y');
	$bulan					= date('m');
	$idPinjamBanyakBukuBaru	= buatKode('pinjambanyakbuku','PINBNT'.$tahun.'/'.$bulan.'/');
	
	$queryBuku = mysql_query("SELECT * FROM buku WHERE idBuku='$idBuku'");
	$dataBuku = mysql_fetch_array($queryBuku);
	$jumlahBuku	= $dataBuku['jumlahBuku'];
	$sisaBuku	= $jumlahBuku - 1;
	$sisaBuku2	= $jumlahBuku + 1;
	
	if($del=='del'){
		mysql_query("UPDATE pinjambanyakbuku SET 
			statusDelete = '1'
		WHERE idPinjamBanyakBuku = '$idPinjamBanyakBuku'");
		
		mysql_query("UPDATE buku SET 
			jumlahBuku = '$sisaBuku2'
		WHERE idBuku = '$idBuku'");
	}else{
		if($idPinjamBanyakBuku=='0'){
			mysql_query("INSERT INTO pinjambanyakbuku(idPinjamBanyakBuku, idPinjam, idBuku) VALUES('$idPinjamBanyakBukuBaru', '$idPinjam', '$idBuku')");
			
			mysql_query("UPDATE buku SET 
				jumlahBuku = '$sisaBuku'
			WHERE idBuku = '$idBuku'");
		}
	}
?>