<!-- header logo: style can be found in header.less -->
<header class="main-header">
	<!-- Logo -->
	<a href="" class="logo">PUSDA Pandeglang</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a>
							<img class="user-image" alt="User Image" id='userImage'/>
							<span class="hidden-xs">[ <?php echo $_SESSION['namaPegawai'];	?> ]</span>
						</a>
					</li>
					<li class="dropdown user user-menu">
						<a href="logout.php"><i class="fa fa-power-off "></i></a>
					</li>
				</ul>
			</div>
		</nav>
</header>