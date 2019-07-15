<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	
	$hitungBuku				= mysql_query("SELECT * FROM buku");
	$dataHitungBuku			= mysql_num_rows($hitungBuku);
	
	$hitungMember			= mysql_query("SELECT * FROM member WHERE statusDelete='0'");
	$dataHitungMember		= mysql_num_rows($hitungMember);
	
	$hitungPinjamBuku		= mysql_query("SELECT * FROM pinjam WHERE statusPengembalian='0'");
	$dataHitungPinjamBuku	= mysql_num_rows($hitungPinjamBuku);
	
	$hitungKembalikanBuku		= mysql_query("SELECT * FROM pinjam WHERE statusPengembalian='1'");
	$dataHitungKembalikanBuku	= mysql_num_rows($hitungKembalikanBuku);
?>
	<div class="row">
	
		<div class="col-xs-12">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo $dataHitungPinjamBuku; ?></h3>
						<p>Pinjam Buku</p>
					</div>
					<div class="icon">
						<i class="fa fa-plus"></i>
					</div>
					<a id='pinjamBuku' href="#" data-id='pages/modInputPinjamBuku/pinjamBuku.php' class="small-box-footer">Data Pinjam Buku <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo $dataHitungKembalikanBuku;?></h3>
						<p>Kembalikan Buku</p>
					</div>
					<div class="icon">
						<i class="fa fa-briefcase"></i>
					</div>
					<a id='kembalikanBuku' href="#" data-id='pages/modInputKembalikanBuku/kembalikanBuku.php' class="small-box-footer">Data Kembalikan Buku <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3>&nbsp;</h3>
						<p>History Peminjaman Buku</p>
					</div>
					<div class="icon">
						<i class="fa fa-history"></i>
					</div>
					<a id='historyPeminjamanBuku' href="#" data-id='pages/modHistoryPeminjamanBuku/historyPeminjamanBuku.php' class="small-box-footer">History Peminjaman Buku <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		
		<div class="col-xs-12">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo $dataHitungBuku;?></h3>
						<p>Data Buku</p>
					</div>
					<div class="icon">
						<i class="fa fa-book"></i>
					</div>
					<a id='dataBuku' href="#" data-id='pages/modInputBuku/buku.php' class="small-box-footer">Data Buku <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo $dataHitungMember;?></h3>
						<p>Data Member</p>
					</div>
					<div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<a id='dataMember' href="#" data-id='pages/modInputMember/member.php' class="small-box-footer">Data Member <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		
		<div class="col-xs-12">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>&nbsp;</h3>
						<p>Setting</p>
					</div>
					<div class="icon">
						<i class="fa fa-gear"></i>
					</div>
					<a id='dataSetting' href="#" data-id='pages/modInputSetting/setting.php' class="small-box-footer">Data Setting <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		
	</div>

<script>
$(function(){
	$("#dataSetting, #dataMember, #dataBuku, #pinjamBuku, #kembalikanBuku, #historyPeminjamanBuku").click(function(){
		$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
		var url = $(this).data('id');
		$("#mainPage").load(url);
		return false;
	});
});
</script>