<?php
	include"../../attr/config/conn.php";
	include"../../attr/config/library.php";
	
	ini_set("display_errors","Off");
	$idPinjamTemp		= $_POST['idPinjamTemp'];
	$del				= $_POST['del'];
	$jaminan			= $_POST['jaminan'];
	$tglPengembalian	= $_POST['tglPengembalian'];
	$idMember			= $_POST['idMember'];
	
	$tahun				= date('y');
	$bulan				= date('m');
	$pinjamBaru			= buatKode('pinjam','PIN'.$tahun.'/'.$bulan.'/');
	
	
	if($del=='del'){
		mysql_query("DELETE FROM pinjamtemp WHERE idPinjamTemp='$idPinjamTemp'");
	}else{
		
		$queryDetailPinjamTemp = mysql_query("SELECT * FROM pinjamtemp WHERE idMember='$idMember'");
		while($dataDetailPinjamTemp = mysql_fetch_array($queryDetailPinjamTemp)){
			$idBuku	= $dataDetailPinjamTemp['idBuku'];
			$pinjamBanyakBukuBaru	= buatKode('pinjambanyakbuku','PINBNY'.$tahun.'/'.$bulan.'/');
			
			$queryBuku	= mysql_query("SELECT * FROM buku WHERE idBuku='$idBuku'");
			$dataBuku	= mysql_fetch_array($queryBuku);
			$jumlahBuku	= $dataBuku['jumlahBuku'];
				if($jumlahBuku=='0'){
					echo "Maaf, Stok Buku di Perpustakaan sedang kosong";
					return false;
				}else{
					mysql_query("INSERT INTO pinjambanyakbuku(idPinjamBanyakBuku, idPinjam, idBuku, statusDelete) VALUES('$pinjamBanyakBukuBaru', '$pinjamBaru', '$idBuku', '0')");
					
					$sisaBuku	= $jumlahBuku - 1;
					mysql_query("UPDATE buku SET jumlahBuku = '$sisaBuku' WHERE idBuku = '$idBuku'");
				}
		}
		
		mysql_query("INSERT INTO pinjam(idPinjam, tglPinjam, idMember, jaminan, tglPengembalian, statusPengembalian) VALUES('$pinjamBaru', NOW(), '$idMember', '$jaminan', '$tglPengembalian', '0')");
		
		mysql_query("DELETE FROM pinjamtemp WHERE idMember='$idMember'");
	}
?>