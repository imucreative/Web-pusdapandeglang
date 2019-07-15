<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	$idPegawai		= $_POST['idPegawai'];
	$username		= $_POST['username'];
	$pass			= $_POST['password'];
	$password		= base64_encode(base64_encode(base64_encode($pass)));
	$namaPegawai	= $_POST['namaPegawai'];
	$alamatPegawai	= $_POST['alamatPegawai'];
	$telpPegawai	= $_POST['telpPegawai'];
	$del			= $_POST['del'];
	
	$tahun			= date('y');
	$bulan			= date('m');
	$pegawaiBaru	= buatKode('pegawai','PEG'.$tahun.'/'.$bulan.'/');
	
	if($del=='del'){
		mysql_query("UPDATE pegawai SET 
			statusDelete = '1'
		WHERE idPegawai = '$idPegawai'");
	}else{
		if($idPegawai == '0') {
			mysql_query("INSERT INTO pegawai(idPegawai, username, password, namaPegawai, alamatPegawai, telpPegawai, level, statusDelete) VALUES('$pegawaiBaru', '$username', '$password', '$namaPegawai', '$alamatPegawai', '$telpPegawai', 'Operator', '0')");
		} else {
			mysql_query("UPDATE pegawai SET 
			username = '$username',
			password = '$password',
			namaPegawai = '$namaPegawai',
			alamatPegawai = '$alamatPegawai',
			telpPegawai = '$telpPegawai'
			WHERE idPegawai = '$idPegawai'");
		}
	}
?>