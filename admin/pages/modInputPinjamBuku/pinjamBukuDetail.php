<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjamBuku	= $_REQUEST['idPinjamBuku'];
	
	$queryCekPinjam = mysql_query("SELECT * FROM member, pinjam WHERE member.idMember=pinjam.idMember AND pinjam.idPinjam='$idPinjamBuku'");
	$dataCekPinjam = mysql_fetch_array($queryCekPinjam);
	
	$queryCekIdPinjam = mysql_query("SELECT * FROM pinjambanyakbuku WHERE pinjambanyakbuku.idPinjam='$idPinjamBuku' AND statusDelete='0'");
	$dataCekIdPinjam = mysql_num_rows($queryCekIdPinjam);
	
?>
<h2 class="page-header">Detail Data Peminjaman <?php echo $idPinjamBuku;?> |
	<a class='btn btn-primary btn-flat' id="tambahBuku" data-id='0' href="#"><i class="fa fa-plus"></i> Tambah Pinjam Buku</a>
	<a class='btn btn-success btn-flat' id="submit" data-id='<?php echo $idPinjamBuku;?>' href="#"><i class="fa fa-check"></i> Submit</a>
	<a class='btn btn-danger btn-flat' id="cancelPinjam" data-id='<?php echo $idPinjamBuku;?>' href="#"><i class="fa fa-close"></i> Cancel Pinjam</a>
	<a class='btn btn-default btn-flat back' id="pages/modInputPinjamBuku/pinjamBuku.php" href="#"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

	<div id="tambahPinjamBuku"></div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-body">
				<div id="tabelPinjamBanyakBuku"></div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<div class="box box-info">
			<div class="box-body">
				<div id="editPinjam"></div>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="box box-info">
			<div class="box-body">
				<div id="tampilMemberPinjam"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		var urlTabelPinjamBanyakBuku = "pages/modInputPinjamBuku/pinjamBanyakBukuTabel.php?idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
		$("#tabelPinjamBanyakBuku").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tabelPinjamBanyakBuku").load(urlTabelPinjamBanyakBuku);
		
		var urlEditPinjam = "pages/modInputPinjamBuku/pinjamBawahKiri.php?idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
		$("#editPinjam").html("<center><img src='dist/img/loading.gif'></center>");
		$("#editPinjam").load(urlEditPinjam);
		
		var urltampilMemberPinjam = "pages/modInputPinjamBuku/pinjamMemberBawahKanan.php?idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
		$("#tampilMemberPinjam").html("<center><img src='dist/img/loading.gif'></center>");
		$("#tampilMemberPinjam").load(urltampilMemberPinjam);
		
		$("#tambahPinjamBuku").hide();
		$('#tambahBuku').click(function(){
			var idPinjamBanyakBuku = $(this).data('id');
			var urlTambahPinjamBuku = "pages/modInputPinjamBuku/pinjamBukuBanyakTambah.php?idPinjamBanyakBuku="+idPinjamBanyakBuku+"&idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
			$("#tambahPinjamBuku").html("<center><img src='dist/img/loading.gif'></center>");
			$("#tambahPinjamBuku").slideDown();
			$("#tambahPinjamBuku").load(urlTambahPinjamBuku);
		});
		
		$('.back').click(function(){
			var url = $(this).attr('id');
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
		
		$('#submit').click(function(){
			var idPinjam	= $(this).data('id');
			if (confirm('Are you sure ?')){
				var dataCekIdPinjam	= '<?php echo $dataCekIdPinjam;?>';
				if(dataCekIdPinjam=='0'){
					alert('Mohon Input Buku yang akan dipinjam!');
				}else{
					var DataFormDeleteItem = 'idPinjam='+idPinjam;
					$.ajax({
						url: "pages/modInputPinjamBuku/savePinjamBukuSubmit.php",
						method: 'GET',
						data: DataFormDeleteItem,
						success : function(){
							var urlTabelPinjamBanyakBuku = "pages/modInputPinjamBuku/pinjamBuku.php";
							$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
							$("#mainPage").load(urlTabelPinjamBanyakBuku);
						},
						error: function(){
							alert("Input Failure!");
						}
					});
				}
				return false;
			}
		});
		
		$('#cancelPinjam').click(function(){
			var idPinjam		= $(this).data('id');
			var cancelPinjam	= $(this).attr('id');
			if (confirm('Are you sure ?')){
				var dataCekIdPinjam	= '<?php echo $dataCekIdPinjam;?>';
				if(dataCekIdPinjam!='0'){
					alert('Mohon Delete Buku yang ingin dipinjam terlebih dahulu sebelum Cancel Peminjaman!');
				}else{
					var DataFormCancelPinjam = 'idPinjam='+idPinjam+'&cancelPinjam='+cancelPinjam;
					$.ajax({
						url: "pages/modInputPinjamBuku/savePinjamBukuSubmit.php",
						method: 'GET',
						data: DataFormCancelPinjam,
						success : function(){
							var urlTabelPinjamBanyakBuku = "pages/modInputPinjamBuku/pinjamBuku.php";
							$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
							$("#mainPage").load(urlTabelPinjamBanyakBuku);
						},
						error: function(){
							alert("Input Failure!");
						}
					});
				}
				return false;
			}
		});
		
	}(jQuery));
</script>