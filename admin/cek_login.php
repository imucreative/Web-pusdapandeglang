<?php
include "dist/config/conn.php";
include "dist/config/library.php";

	$user	 	= $_POST['username'];
	$password 	= $_POST['password'];
	$pass 	= base64_encode(base64_encode(base64_encode($password)));
	$query	= mysql_query('SELECT * FROM pegawai WHERE username="'.$user.'" AND password="'.$pass.'"');
	$check	= mysql_num_rows($query);
	$r		= mysql_fetch_array($query);
	if($check <= 0){
		echo 2;
	}else{
		$_SESSION['idPegawai']		= $r['idPegawai'];
		$_SESSION['username']		= $r['username'];
		$_SESSION['namaPegawai']	= $r['namaPegawai'];
		$_SESSION['alamatPegawai']	= $r['alamatPegawai'];
		$_SESSION['telpPegawai']	= $r['telpPegawai'];
		$_SESSION['level']			= $r['level'];
		echo 1;
	}
?>