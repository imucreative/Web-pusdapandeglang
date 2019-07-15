<?php
	include "dist/config/conn.php";
	include "dist/config/library.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
	include "login.php";
}else{
	$idLogin	= $_SESSION['idPegawai'];
	$level		= $_SESSION['level'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PUSDA Pandeglang</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" href="dist/img/logo.png"/>
		<link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="plugins/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABLES -->
		<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
		<link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<!--Untuk AutoComplete-->
		<link href="dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
		<!-- AdminLTE Skins. Choose a skin from the css/skins. -->
		<link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		<!-- daterange picker -->
		<link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
		<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
	</head>
  
	<body class="skin-blue sidebar-collapse fixed">	<!--Body Bisa di Costom-->
		<div class="wrapper">
			<?php include "dist/config/header.php";	?>

			<div class="content-wrapper">
				<!-- Main content -->
				<section class="content">
					<div id='mainPage'></div>
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->

			<footer class="main-footer">
				<strong>Copyright &copy; 2016 <a href="index.php">Perpustakaan Daerah Pandeglang Inc.</a> All rights reserved.</strong>
			</footer>
		</div><!-- ./wrapper -->
		
	
		<script src="dist/js/jquery.min.js"></script>
		<script src="dist/js/bootstrap.min.js" type="text/javascript"></script>
		
		<!--Untuk AutoComplete-->
		<script src="dist/js/jquery-ui.js"></script>
		
			<script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
			<script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
			<script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
			
			<!-- date-range-picker -->
			<script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
			<link href="plugins/daterangepicker/daterangepicker.js" rel="stylesheet" type="text/css" />
		
		<!-- DATA TABES SCRIPT -->
		<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
		<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		
		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function(){
				$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
				$("#mainPage").load("dist/config/home.php");
				
				if('<?php echo $level; ?>'=='Administrator'){
					$("#userImage").attr("src", "dist/img/administrator.png");
				}else if('<?php echo $level; ?>'=='Operator'){
					$("#userImage").attr("src", "dist/img/operator.png");
				}
			});
		</script>
	</body>
</html>
<?php
}
?>