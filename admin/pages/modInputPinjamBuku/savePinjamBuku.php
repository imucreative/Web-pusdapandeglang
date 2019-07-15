<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	ini_set("display_errors","Off");
	$level				= $_SESSION['level'];
	$idPinjam			= $_REQUEST['idPinjam'];
	$idMember			= $_REQUEST['idMember'];
	$jaminan			= $_REQUEST['jaminan'];
	$tglPengembalian	= $_REQUEST['tglPengembalian'];
	
	$tahun			= date('y');
	$bulan			= date('m');
	$pinjamBaru		= buatKode('pinjam','PIN'.$tahun.'/'.$bulan.'/');
	$idPinjamBanyakBukuBaru		= buatKode('pinjambanyakbuku','PINBNY'.$tahun.'/'.$bulan.'/');
	
		if($idPinjam=='0'){
			mysql_query("INSERT INTO pinjam(idPinjam, tglPinjam, idMember, jaminan, tglPengembalian, statusPengembalian) VALUES('$pinjamBaru', NOW(), '$idMember', '$jaminan', '$tglPengembalian', '0')");
		}else{
			if($level=='Administrator'){
				mysql_query("UPDATE pinjam SET 
					idMember = '$idMember',
					jaminan = '$jaminan',
					tglPengembalian = '$tglPengembalian'
				WHERE idPinjam = '$idPinjam'");
			}else{
				mysql_query("UPDATE pinjam SET 
					jaminan = '$jaminan',
					tglPengembalian = '$tglPengembalian'
				WHERE idPinjam = '$idPinjam'");

			}
		}
?>