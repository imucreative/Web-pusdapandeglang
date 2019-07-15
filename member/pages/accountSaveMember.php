<?php
	include"../../attr/config/conn.php";
	include"../../attr/config/library.php";
	
	$idMember		= $_REQUEST['idMember'];
	$username		= $_REQUEST['username'];
	$pass			= $_REQUEST['password'];
	$password		= base64_encode(base64_encode(base64_encode($pass)));
	$namaMember		= $_REQUEST['namaMember'];
	$tlpMember		= $_REQUEST['tlpMember'];
	$alamatMember	= $_REQUEST['alamatMember'];
	$noKtpMember	= $_REQUEST['noKtpMember'];
	$pinBbm			= $_REQUEST['pinBbm'];
	$facebook		= $_REQUEST['facebook'];
	$twitter		= $_REQUEST['twitter'];
	$del			= $_REQUEST['del'];
	
	$tahun			= date('y');
	$bulan			= date('m');
	$memberBaru		= buatKode('member','MEM'.$tahun.'/'.$bulan.'/');
	
	if($del=='del'){
		mysql_query("UPDATE member SET 
			statusDelete = '1'
		WHERE idMember = '$idMember'");
	}else{
		if($idMember == '0') {
			mysql_query("INSERT INTO member(idMember, tglRegister, username, password, namaMember, alamatMember, tlpMember, pinBbm, facebook, twitter, noKtpMember) VALUES('$memberBaru', NOW(), '$username', '$password', '$namaMember', '$alamatMember', '$tlpMember', '$pinBbm', '$facebook', '$twitter', '$noKtpMember')");
		} else {
			mysql_query("UPDATE member SET 
				username = '$username',
				password = '$password',
				namaMember = '$namaMember',
				alamatMember = '$alamatMember',
				tlpMember = '$tlpMember',
				pinBbm = '$pinBbm',
				facebook = '$facebook',
				twitter = '$twitter',
				noKtpMember = '$noKtpMember'
			WHERE idMember = '$idMember'");
		}
	}
?>