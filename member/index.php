<?php
	include "../attr/config/conn.php";
	include "../attr/config/library.php";
	$idMember	= $_SESSION['idMember'];
	$namaMember	= $_SESSION['namaMember'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>PUSDA Pandeglang</title>
		<link href="../attr/css/bootstrap.min.css" rel="stylesheet">
		<link href="../attr/css/font-awesome.min.css" rel="stylesheet">
		<link href="../attr/css/prettyPhoto.css" rel="stylesheet">
		<link href="../attr/css/price-range.css" rel="stylesheet">
		<link href="../attr/css/animate.css" rel="stylesheet">
		<link href="../attr/css/main.css" rel="stylesheet">
		<link href="../attr/css/responsive.css" rel="stylesheet">
		<link href="../admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
		<!--[if lt IE 9]>
		<script src="attr/js/html5shiv.js"></script>
		<script src="attr/js/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="../attr/images/home/favicon.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../attr/images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../attr/images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../attr/images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../attr/images/ico/apple-touch-icon-57-precomposed.png">
	</head><!--/head-->

	<body>
		<?php include "attr/config/header.php";?>
		<?php include "attr/config/slider.php";?>
		<br/>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="left-sidebar">
							<h2>Kategori</h2>
							<?php include "attr/config/category.php";?>
							
							<div class="shipping text-center" >
								<?php
									$queryBukuPertamaCover = mysql_query("SELECT * FROM buku WHERE statusDelete='0' ORDER BY RAND()");
									$dataBukuPertamaCover = mysql_fetch_array($queryBukuPertamaCover);
								?>
								<a class="detailBukuBawahKiri" id="pages/bukuDetail.php?idBuku=<?php echo $dataBukuPertamaCover['idBuku'];?>" href="#"><img src="../admin/dist/img/fotoBuku/<?php echo $dataBukuPertamaCover['fotoCover'];?>"></a>
							</div>
						</div>
					</div>
					
					<div class="col-sm-9 padding-right">
						<div id="mainPage"></div>	<!--Halaman Utama-->
					</div>
				</div>
			</div>
		</section>
		
		<footer id="footer"><!--Footer-->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<div class="companyinfo">
								<h2><span>PUSDA</span> Pandeglang</h2>
								<p>JL. KH. Tb. Abdul Halim, No. 1, Pandeglang, Indonesia</p>
								<p>Phone. (0253) 202920 - Email. pusdakab_pdg@yahoo.co.id</p>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="address">
								<img src="../attr/images/home/logoKabupatenPandeglang.png" alt="Kabupaten Pandeglang" />
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<p class="pull-left">Copyright &copy; 2016 <a href="index.php">Perpustakaan Daerah Pandeglang Inc.</a> All rights reserved.</p>
					</div>
				</div>
			</div>
		</footer><!--/Footer-->
		

		
		<script src="../attr/js/jquery.js"></script>
		<script src="../attr/js/bootstrap.min.js"></script>
		<script src="../attr/js/jquery.scrollUp.min.js"></script>
		<script src="../attr/js/price-range.js"></script>
		<script src="../attr/js/jquery.prettyPhoto.js"></script>
		<script src="../attr/js/main.js"></script>
		<script src="../admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	</body>
</html>

<?php
	$queryLihatDenda	= mysql_query("SELECT * FROM pinjam WHERE pinjam.idMember='$idMember' ORDER BY idPinjam DESC");
	$dataLihatDenda		= mysql_fetch_array($queryLihatDenda);
	$sekarang	= date('Y-m-d');
	$selisih	= ((abs(strtotime ($dataLihatDenda['tglPengembalian']) - strtotime ($sekarang)))/(60*60*24));
?>

<script type="text/javascript">
	$(function(){
		$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
		$("#mainPage").load("attr/config/home.php");
		
		if("<?php echo $dataLihatDenda['tglDikembalikan']=='0000-00-00';?>"){
			if("<?php echo $dataLihatDenda['tglCancel']=='0000-00-00';?>"){
				if("<?php echo $sekarang>$dataLihatDenda['tglPengembalian'];?>"){
					alert("Mohon mengembalikan buku yang sudah anda pinjam. Karena Anda sudah terlambat untuk mengembalikan buku <?php echo $selisih;?> Hari");
				}
			}
		}
		
		$(".checkout, .account, .detailBukuBawahKiri, .detailBukuSlide, .bukuKategori, .menuKategori").click(function(){
			var url	= $(this).attr('id');
			$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
			$("#slider").hide();
			$("#mainPage").load(url);
		});
		
		$("#cariBuku").click(function(){
			var cariBuku	= $("#cari").val();
			if(cariBuku==''){
				alert("Pencarian Buku tidak boleh kosong");
				$("#cari").focus();
				return false;
			}
			$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
			$("#slider").hide();
			$.ajax({
				type:"POST",
				url:"pages/bukuSearch.php",
				data:"cariBuku="+cariBuku,
				success:function(data){
					$("#mainPage").html(data);
				}
			});
		});
		
	});
</script>