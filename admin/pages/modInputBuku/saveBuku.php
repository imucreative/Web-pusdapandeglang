<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	$idBuku			= $_REQUEST['idBuku'];
	$judulBuku		= $_REQUEST['judulBuku'];
	$deskripsiBuku	= $_REQUEST['deskripsiBuku'];
	$pengarang		= $_REQUEST['pengarang'];
	$penerbit		= $_REQUEST['penerbit'];
	$kategori		= $_REQUEST['kategori'];
	$jumlahBuku		= $_REQUEST['jumlahBuku'];
	$rak			= $_REQUEST['rak'];
	$del			= $_REQUEST['del'];
	$idPegawai		= $_SESSION['idPegawai'];
	
	$tahun			= date('y');
	$bulan			= date('m');
	$bukuBaru		= buatKode('buku','BK'.$tahun.'/'.$bulan.'/');
	
	if($del=='del'){
		mysql_query("UPDATE buku SET 
			statusDelete = '1'
		WHERE idBuku = '$idBuku'");
	}else{
		if($idBuku == '0'){
			mysql_query("INSERT INTO buku(idBuku, tglInput, idPegawai, judulBuku, deskripsiBuku, pengarang, penerbit, idKategori, jumlahBuku, rak) VALUES('$bukuBaru', NOW(), '$idPegawai', '$judulBuku', '$deskripsiBuku', '$pengarang', '$penerbit', '$kategori', '$jumlahBuku', '$rak')");
		}else{
			mysql_query("UPDATE buku SET 
				judulBuku = '$judulBuku',
				deskripsiBuku = '$deskripsiBuku',
				pengarang = '$pengarang',
				penerbit = '$penerbit',
				idKategori = '$kategori',
				jumlahBuku = '$jumlahBuku',
				rak = '$rak'
			WHERE idBuku = '$idBuku'");
		}
	}
?>