<?php
	include"../../dist/config/conn.php";
	include"../../dist/config/library.php";
	
	$idBuku		= $_REQUEST['idBuku'];
	$fileName	= $_FILES['fotoBuku']['name'];
	$fileTemp	= $_FILES['fotoBuku']['tmp_name'];
	$fileSize	= $_FILES['fotoBuku']['size'];
	$dirFoto	= "../../dist/img/fotoBuku/";
	$ext 		= pathinfo($fileName, PATHINFO_EXTENSION);
	$ekstensi 	= array('jpg','jpeg','png','JPG');
	
	if(in_array($ext, $ekstensi)){
		if($fileSize<524288){
			if(is_array($_FILES)){
				if(is_uploaded_file($fileTemp)){
					$targetPath		=	$dirFoto . $fileName;
					if(move_uploaded_file($fileTemp, $targetPath)){
						mysql_query("UPDATE buku SET fotoCover = '$fileName' WHERE idBuku = '$idBuku'");
?>
						<img src="dist/img/fotoBuku/<?php echo $fileName; ?>" alt="<?php echo $fileName; ?>" style="margin-top:5px; margin-left:5px; margin-right:5px; margin-bottom:5px; width:170px; height:220px; border:2px solid;">
<?php
					}
				}
			}
			return false;
		}else{
			echo "Ukuran Maksimal 500Kb";
			return false;
		}
	}else{
		echo "Hanya Input Gambar";
		return false;
	}
?>