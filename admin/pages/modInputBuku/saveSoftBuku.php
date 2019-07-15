<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	ini_set("display_errors","Off");
	$idBuku		= $_REQUEST['idBuku'];
	$fileName	= $_FILES['softBuku']['name'];
	$fileTemp	= $_FILES['softBuku']['tmp_name'];
	$fileSize	= $_FILES['softBuku']['size'];
	$dirFoto	= "../../dist/img/softBuku/";
	$ext 		= pathinfo($fileName, PATHINFO_EXTENSION);
	$ekstensi 	= array('pdf');
	
	if(in_array($ext, $ekstensi)){
		if(is_array($_FILES)){
			if(is_uploaded_file($fileTemp)){
				$targetPath		=	$dirFoto . $fileName;
				if(move_uploaded_file($fileTemp, $targetPath)){
					mysql_query("UPDATE buku SET softBuku = '$fileName' WHERE idBuku = '$idBuku'");
				}
			}
		}
		return false;
	}else{
		echo "Hanya Input File Pdf";
		return false;
	}
?>