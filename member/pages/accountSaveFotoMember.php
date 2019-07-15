<?php
	include"../../attr/config/conn.php";
	include"../../attr/config/library.php";
	
	$idMember	= $_REQUEST['idMember'];
	$fileName	= $_FILES['fotoMember']['name'];
	$fileTemp	= $_FILES['fotoMember']['tmp_name'];
	$fileSize	= $_FILES['fotoMember']['size'];
	$dirFoto	= "../../admin/dist/img/fotoMember/";
	$ext 		= pathinfo($fileName, PATHINFO_EXTENSION);
	$ekstensi 	= array('jpg','jpeg','png','gif','JPG');
	
	if(in_array($ext, $ekstensi)){
		if($fileSize<524288){
			//$namaFileBaru	= $idMember . "." . $ext;
			if(is_array($_FILES)){
				if(is_uploaded_file($fileTemp)){
					$targetPath		=	$dirFoto . $fileName;
					if(move_uploaded_file($fileTemp, $targetPath)){
						mysql_query("UPDATE member SET fotoMember = '$fileName' WHERE idMember = '$idMember'");
?>
						<img src="../admin/dist/img/fotoMember/<?php echo $fileName; ?>" alt="<?php echo $fileName; ?>" style="margin-top:5px; margin-left:5px; margin-right:5px; margin-bottom:5px; width:170px; height:220px; border:2px solid;">
<?php
					}
				}
			}
			return false;
		}else{
			echo "Ukuran Maksimal 500kb.";
			return false;
		}
	}else{
		echo "Hanya Input Gambar.";
		return false;
	}
?>