<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjam	= $_REQUEST['idPinjam'];
	
	$queryCekPinjam = mysql_query("SELECT * FROM member, pinjam WHERE member.idMember=pinjam.idMember AND pinjam.idPinjam='$idPinjam'");
	$dataCekPinjam = mysql_fetch_array($queryCekPinjam);
	
	$queryCekIdPinjam = mysql_query("SELECT * FROM pinjambanyakbuku WHERE pinjambanyakbuku.idPinjam='$idPinjam' AND statusDelete='0'");
	$dataCekIdPinjam = mysql_num_rows($queryCekIdPinjam);
	
?>
<h2 class="page-header">Detail Data Peminjaman <?php echo $idPinjam;?> |
	<a class='btn btn-success btn-flat' id="kembalikanBuku" data-id='<?php echo $idPinjam;?>' href="#"><i class="fa fa-check"></i> Kembalikan Buku</a>
	<a class='btn btn-default btn-flat back' id="pages/modInputKembalikanBuku/kembalikanBuku.php" href="#"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id="tabelKembalikanBanyakBuku"></div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<div class="box box-info">
			<div class="box-body">
				<div id="kembalikanBawahKiri"></div>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="box box-info">
			<div class="box-body">
				<div id="tampilMemberKembalikan"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		var urlTabelPinjamBanyakBuku = "pages/modInputKembalikanBuku/kembalikanBanyakBukuTabel.php?idPinjam="+"<?php echo $idPinjam;?>";
		$("#tabelKembalikanBanyakBuku").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tabelKembalikanBanyakBuku").load(urlTabelPinjamBanyakBuku);
		
		var urlKembalikanBawahKiri = "pages/modInputKembalikanBuku/kembalikanBawahKiri.php?idPinjam="+"<?php echo $idPinjam;?>";
		$("#kembalikanBawahKiri").html("<center><img src='dist/img/loading.gif'></center>");
		$("#kembalikanBawahKiri").load(urlKembalikanBawahKiri);
		
		var urltampilMemberPinjam = "pages/modInputKembalikanBuku/kembalikanMemberBawahKanan.php?idPinjam="+"<?php echo $idPinjam;?>";
		$("#tampilMemberKembalikan").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilMemberKembalikan").load(urltampilMemberPinjam);
		
		$('.back').click(function(){
			var url = $(this).attr('id');
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
		
		$('#kembalikanBuku').click(function(){
			var idPinjam	= $(this).data('id');
			if (confirm('Are you sure ?')){
				
				var DataFormKembalikanItem = 'idPinjam='+idPinjam;
				$.ajax({
					url: "pages/modInputKembalikanBuku/saveKembalikanBukuSubmit.php",
					method: 'GET',
					data: DataFormKembalikanItem,
					success : function(){
						var urlTabelKembalikanBanyakBuku = "pages/modInputKembalikanBuku/kembalikanBuku.php";
						$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
						$("#mainPage").load(urlTabelKembalikanBanyakBuku);
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
		
	}(jQuery));
</script>