<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>
<h2 class="page-header">Data Pinjam Buku |
	<button id='0' class="inputPinjamBuku btn btn-flat btn-primary" data-toggle="modal" data-target="#formPinjamBuku">
		<i class="fa fa-plus"></i> Pinjam
	</button>
	<a class='btn btn-default btn-flat' href="index.php"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div id="tampilInputPinjamBuku"></div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id='tampilTabelPinjamBuku'></div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>



<script>
	$(function(){
		$("#tampilInputPinjamBuku").hide();
		$('.inputPinjamBuku').click(function(){
			var url = "pages/modInputPinjamBuku/pinjamBukuFormInput.php";
			$("#tampilInputPinjamBuku").html("<center><img src='dist/img/loading.gif'></center>");
			$("#tampilInputPinjamBuku").slideDown();
			$("#tampilInputPinjamBuku").load(url);
		});
		
		var urlTampilTabelPinjamBuku = "pages/modInputPinjamBuku/pinjamBukuTabel.php";
		$("#tampilTabelPinjamBuku").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilTabelPinjamBuku").load(urlTampilTabelPinjamBuku);
		
	});
</script>