<?php
$host="localhost";
$user="root";
$pass="";
$db="pusdapandeglang";

$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);

if($koneksi){
	//echo "Berhasil koneksi";
}else{
	echo "Gagal terhubung dengan database, Cek koneksi kembali...!!!";
}
?>