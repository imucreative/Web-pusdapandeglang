<?php
	include "dist/config/conn.php";
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
		<!-- Theme style -->
		<link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<img src="dist/img/logo.png" width="130px" /><br/>
				<a href="">PUSDA Pandeglang</a>
			</div><!-- /.login-logo -->

			<div class="box login-box-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<form role="form" id="formLogin">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="* Username" id='username' name='username'/>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="* Password" id='password' name='password'/>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat" id='submit' name='submit'><span class='fa fa-sign-in'></span> Log In</button>
						</div><!-- /.col -->
						<div class="col-xs-8">
							<div id="res" ></div>
						</div>
					</div>
				</form>
			</div><!-- /.login-box-body -->
			<p align="center">&copy; 2016 <a href="../index.php">Perpustakaan Daerah Pandeglang.</a></p>
		</div><!-- /.login-box -->

		<script src="dist/js/jquery.min.js"></script>
		<script src="dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="dist/js/validasiLogin.js" ></script>
	</body>
</html>