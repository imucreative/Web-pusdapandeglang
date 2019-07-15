<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set("display_errors","Off");
	
	$host	= "mysql.idhostinger.com";
	$user	= "u385330441_pusda";
	$pass	= "adminqwert1";
	$db		= "u385330441_pusda";

	$koneksi	= mysql_connect($host,$user,$pass);
	mysql_select_db($db,$koneksi);
?>