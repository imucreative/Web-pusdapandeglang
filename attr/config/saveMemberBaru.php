<?php
include "conn.php";
include "library.php";

	$username	= $_POST['username'];
	$pass 		= $_POST['password'];
	$password 	= base64_encode(base64_encode(base64_encode($pass)));
	$namaMember	= $_POST['namaMember'];
	
	$tahun			= date('y');
	$bulan			= date('m');
	$memberBaru		= buatKode('member','MEM'.$tahun.'/'.$bulan.'/');
	
	mysql_query("INSERT INTO member(idMember, tglRegister, username, password, namaMember) VALUES('$memberBaru', NOW(), '$username', '$password', '$namaMember')");
	
	$query		= mysql_query("SELECT * FROM member WHERE idMember='$memberBaru'");
	$data		= mysql_fetch_array($query);
	
	$_SESSION['idMember']		= $data['idMember'];
	$_SESSION['username']		= $data['username'];
	$_SESSION['namaMember']		= $data['namaMember'];
	$_SESSION['alamatMember']	= $data['alamatMember'];
	$_SESSION['tlpMember']		= $data['tlpMember'];
	$_SESSION['pinBbm']			= $data['pinBbm'];
	$_SESSION['facebook']		= $data['facebook'];
	$_SESSION['twitter']		= $data['twitter'];
	$_SESSION['noKtpMember']	= $data['noKtpMember'];
	$_SESSION['fotoMember']		= $data['fotoMember'];
?>