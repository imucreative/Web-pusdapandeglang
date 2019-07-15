<?php
	include "../attr/config/conn.php";
	$cariBuku	= $_POST['cariBuku'];

		$word = mysql_real_escape_string($cariBuku);
		$word2 = htmlentities($word);
		
		$sqlCariBuku = mysql_query("SELECT *
			FROM buku, kategoribuku
			WHERE buku.judulBuku LIKE '%$word2%'
			AND buku.statusDelete='0'
			AND buku.idKategori=kategoribuku.idKategori");
			
		$jumlah	= mysql_num_rows($sqlCariBuku);
		
		if ($jumlah>0){
				echo ("<h2 class='title text-center'>Hasil Pencarian</h2><h4 align='center'>$jumlah Hasil pencarian Buku ditemukan untuk Keyword <b><font color='orange'>$cariBuku</font></b> : </h4><br/>");
				include "bukuSearchTampil.php";
		}else{
			echo ("<h2 class='title text-center'>Hasil Pencarian</h2><h4 align='center'>Hasil pencarian Buku tidak ditemukan untuk Keyword <font color='orange'>$cariBuku</font></b>.</h4>");
		}
?>