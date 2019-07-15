<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	$idKategori		= $_POST['idKategori'];
	$namaKategori	= $_POST['namaKategori'];
	$del			= $_POST['del'];
	
	$tahun			= date('y');
	$bulan			= date('m');
	$kategoriBaru	= buatKode('kategoribuku','KAT'.$tahun.'/'.$bulan.'/');
	
	if($del=='del'){
		mysql_query("UPDATE kategoribuku SET 
			statusDelete = '1'
		WHERE idKategori = '$idKategori'");
	}else{
		if($idKategori == '0') {
			mysql_query("INSERT INTO kategoribuku(idKategori, namaKategori) VALUES('$kategoriBaru', '$namaKategori')");
		} else {
			mysql_query("UPDATE kategoribuku SET 
			namaKategori = '$namaKategori'
			WHERE idKategori = '$idKategori'");
		}
	}
?>