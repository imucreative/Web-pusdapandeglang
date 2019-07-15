<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>
<h2 class="page-header">Data Buku |
	<button data-toggle="modal" data-target="#modalBuku" id='0' class="inputBuku btn btn-flat btn-primary">
		<i class="fa fa-plus"></i> Input Buku
	</button>
	<a class='btn btn-default btn-flat' href="index.php"><i class="fa fa-arrow-left"></i> Back</a>
</h2>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id='bukuTampilTabel'></div>
			</div>
		</div>
	</div>
</div>

	<div id="modalBuku" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><div id='labelHeaderBuku'></div></h4>
				</div>
				<div class="modal-body" id='bodyBuku'></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-flat" data-id="0" id="saveBuku"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
	</div>

<script>
	$(function(){
		var urlTampilTabelBuku = "pages/modInputBuku/bukuTabel.php";
		$("#bukuTampilTabel").html("<center><img src='dist/img/loading.gif'></center>");
		$("#bukuTampilTabel").load(urlTampilTabelBuku);
		
		$('.inputBuku').click(function(){
			var idBuku = $(this).attr('id');
			var url = "pages/modInputBuku/bukuFormInput.php";
			$("#labelHeaderBuku").html("Form Input Buku");
			$("#bodyBuku").load(url);
		});
		
		$("#saveBuku").click(function(){
			var judulBuku		= $('#judulBuku');
			var deskripsiBuku	= $('#deskripsiBuku');
			var pengarang		= $('#pengarang');
			var penerbit		= $('#penerbit');
			var kategori		= $('#kategori');
			var jumlahBuku		= $('#jumlahBuku');
			var rak				= $('#rak');
			var idBuku			= $(this).data('id');
			
			if(judulBuku.val()==''){
				$("#judulBukuVal").html("<font color='red'> | * Mohon Input Judul Buku</font>").show().fadeOut(20000);
				judulBuku.focus();
				return false;
			}else if(deskripsiBuku.val()==''){
				$("#deskripsiBukuVal").html("<font color='red'> | * Mohon Input Deskripsi Buku</font>").show().fadeOut(20000);
				deskripsiBuku.focus();
				return false;
			}else if(pengarang.val()==''){
				$("#pengarangVal").html("<font color='red'> | * Mohon Input Pengarang</font>").show().fadeOut(20000);
				pengarang.focus();
				return false;
			}else if(penerbit.val()==''){
				$("#penerbitVal").html("<font color='red'> | * Mohon Input Penerbit</font>").show().fadeOut(20000);
				penerbit.focus();
				return false;
			}else if(kategori.val()==''){
				$("#kategoriVal").html("<font color='red'> | * Mohon Input Kategori</font>").show().fadeOut(20000);
				kategori.focus();
				return false;
			}else if(jumlahBuku.val()==''){
				$("#jumlahBukuVal").html("<font color='red'> | * Mohon Input Jumlah Buku</font>").show().fadeOut(20000);
				jumlahBuku.focus();
				return false;
			}else if(rak.val()==''){
				$("#rakVal").html("<font color='red'> | * Mohon Input Rak</font>").show().fadeOut(20000);
				rak.focus();
				return false;
			}
			
			var DataForm = "idBuku="+idBuku+"&judulBuku="+judulBuku.val()+"&deskripsiBuku="+deskripsiBuku.val()+"&pengarang="+pengarang.val()+"&penerbit="+penerbit.val()+"&kategori="+kategori.val()+"&jumlahBuku="+jumlahBuku.val()+"&rak="+rak.val();
			
			$.ajax({
				url: "pages/modInputBuku/saveBuku.php",
				method: 'GET',
				data: DataForm,
				success : function(){
					$("#modalBuku").modal('hide');
					var urlTampilTabelBuku = "pages/modInputBuku/bukuTabel.php";
					$("#bukuTampilTabel").html("<center><img src='dist/img/loading.gif'></center>");
					$("#bukuTampilTabel").load(urlTampilTabelBuku);
				},
				error: function(){
					alert("Input Gagal!");
				}
			});
			
		});
	});
</script>