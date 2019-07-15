<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level	= $_SESSION['level'];
	
?>
<h2 class="page-header">System Setting |
	<a class='btn btn-default btn-flat' href="index.php"><i class="fa fa-arrow-left"></i> Back</a>
</h2>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right">
						<li class="active"><a href="#kategori" data-toggle="tab">Kategori Buku</a></li>
						<?php
							if($level=='Administrator'){
						?>
								<li><a href="#pegawai" data-toggle="tab">Pegawai</a></li>
						<?php
							}
						?>
						
						<!--
						<li><a href="#pengarang" data-toggle="tab">Pengarang</a></li>
						<li><a href="#penerbit" data-toggle="tab">Penerbit</a></li>
						-->
						<li class="pull-left header"><i class="fa fa-gear"></i> Setting</li>
					</ul>
					
					<div class="tab-content">
					
						<div class="tab-pane active" id="kategori">
							<button data-toggle="modal" id='0' data-target="#modalKategori" class="tombolInputKategori btn btn-flat btn-primary">
								<i class="fa fa-plus"></i> Input 
							</button> | Input Kategori Buku
							<div id='tampilTabelKategori'></div>
						</div>
							<div class="tab-pane" id="pegawai">
								<button data-toggle="modal" id='0' data-target="#modalPegawai" class="tombolTambahPegawai btn btn-flat btn-primary">
									<i class="fa fa-plus"></i> Input 
								</button> | Input Pegawai
								<div id='tampilTabelPegawai'></div>
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>


	<!-- Modal tambah Kategori Buku -->
	<div id="modalKategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><div id='labelHeaderKategori'></div></h4>
				</div>
				<div class="modal-body" id='bodyKategori'></div>
				<div class="modal-footer">
					<button class="btn btn-success btn-flat saveKategori" id='1'><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal tambah Pengarang Buku -->
	<div id="modalPegawai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><div id='labelHeaderPegawai'></div></h4>
				</div>
				<div class="modal-body" id='bodyPegawai'></div>
				<div class="modal-footer">
					<button class="btn btn-success btn-flat savePegawai" id='1'><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
	
<script>
	$(function(){
		var urlTampilTabelKategori = "pages/modInputKategori/kategoriTabel.php";
		$("#tampilTabelKategori").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilTabelKategori").load(urlTampilTabelKategori);
		
		var urlTampilTabelPegawai = "pages/modInputPegawai/pegawaiTabel.php";
		$("#tampilTabelPegawai").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilTabelPegawai").load(urlTampilTabelPegawai);
		
		
		$(".saveKategori").click(function(event){
			var namaKategori	= $('input:text[name=namaKategori]');
			var idKategori		= $('input:hidden[name=idKategori]');
			
			if(namaKategori.val()==''){
				$("#namaKategoriVal").html("<font color='red'> | * Mohon Input Kategori Buku</font>").show().fadeOut(20000);
				namaKategori.focus();
				return false;
			}
			
			var DataForm = 'namaKategori='+namaKategori.val()+'&idKategori='+idKategori.val();
			$.ajax({
				url: 'pages/modInputKategori/kategoriSave.php',
				method: 'POST',
				data: DataForm,
				success : function(){
					$("#modalKategori").modal('hide');
					$("#tampilTabelKategori").html("<center><img src='dist/img/loading.gif'></center>");
					$("#labelHeaderKategori").html("Input Kategori");
					$("#tampilTabelKategori").load(urlTampilTabelKategori);
				},
				error: function(){
					alert("Input Gagal!");
				}
			});
		});
		
		$(".savePegawai").click(function(event){
			var username		= $('#username');
			var password		= $('#password');
			var namaPegawai		= $('#namaPegawai');
			var alamatPegawai	= $('#alamatPegawai');
			var telpPegawai		= $('#telpPegawai');
			var idPegawai		= $('input:hidden[name=idPegawai]');
			
			if(username.val()==''){
				$("#usernameVal").html("<font color='red'> | * Mohon Input Username</font>").show().fadeOut(20000);
				username.focus();
				return false;
			}else if(password.val()==''){
				$("#passwordVal").html("<font color='red'> | * Mohon Input Password</font>").show().fadeOut(20000);
				password.focus();
				return false;
			}else if(namaPegawai.val()==''){
				$("#namaPegawaiVal").html("<font color='red'> | * Mohon Input Nama Pegawai</font>").show().fadeOut(20000);
				namaPegawai.focus();
				return false;
			}else if(alamatPegawai.val()==''){
				$("#alamatPegawaiVal").html("<font color='red'> | * Mohon Input Alamat Pegawai</font>").show().fadeOut(20000);
				alamatPegawai.focus();
				return false;
			}else if(telpPegawai.val()==''){
				$("#telpPegawaiVal").html("<font color='red'> | * Mohon Input Telp. Pegawai</font>").show().fadeOut(20000);
				telpPegawai.focus();
				return false;
			}
			
			var DataForm = 'username='+username.val()+'&password='+password.val()+'&namaPegawai='+namaPegawai.val()+'&alamatPegawai='+alamatPegawai.val()+'&telpPegawai='+telpPegawai.val()+'&idPegawai='+idPegawai.val();
			$.ajax({
				url: 'pages/modInputPegawai/pegawaiSave.php',
				method: 'POST',
				data: DataForm,
				success : function(){
					$("#modalPegawai").modal('hide');
					$("#tampilTabelPegawai").html("<center><img src='dist/img/loading.gif'></center>");
					$("#labelHeaderPegawai").html("Input Pegawai");
					$("#tampilTabelPegawai").load(urlTampilTabelPegawai);
				},
				error: function(){
					alert("Input Gagal!");
				}
			});
		});
	
	});
</script>