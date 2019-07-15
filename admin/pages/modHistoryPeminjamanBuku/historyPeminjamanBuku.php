<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>
<h2 class="page-header">History Peminjaman Buku |
	<a class='btn btn-default btn-flat' href="index.php"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id='tampilHistoryPeminjamanBuku'></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		var urlHistoryPeminjamanBuku = "pages/modHistoryPeminjamanBuku/historyPeminjamanBukuTabel.php";
		$("#tampilHistoryPeminjamanBuku").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilHistoryPeminjamanBuku").load(urlHistoryPeminjamanBuku);
	});
</script>