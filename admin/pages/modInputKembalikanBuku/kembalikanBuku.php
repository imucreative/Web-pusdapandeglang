<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>
<h2 class="page-header">Kembalikan Buku |
	<a class='btn btn-default btn-flat' href="index.php"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id='tampilTabelKembalikanBuku'></div>
			</div>
		</div>
	</div>
</div>



<script>
	$(function(){
		var urlTampilTabelKembalikanBuku = "pages/modInputKembalikanBuku/kembalikanBukuTabel.php";
		$("#tampilTabelKembalikanBuku").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilTabelKembalikanBuku").load(urlTampilTabelKembalikanBuku);
	});
</script>