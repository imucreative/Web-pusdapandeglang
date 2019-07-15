<?php
include "conn.php";
session_start();

	$user	 	= $_POST['username'];
	$password 	= $_POST['password'];
	$pass 		= base64_encode(base64_encode(base64_encode($password)));
	$query		= mysql_query("SELECT * FROM member WHERE username='$user' AND password='$pass' AND statusDelete='0'");
	$check		= mysql_num_rows($query);
	$data		= mysql_fetch_array($query);
	if($check <= 0){
		echo 2;
	}else{
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
		echo 1;
	}
?>