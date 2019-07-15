<?php
	include "../attr/config/conn.php";
	include "../attr/config/library.php";
	$idBuku	= $_REQUEST['idBuku'];
	
	$queryDetailBuku = mysql_query("SELECT * FROM buku, kategoribuku, pegawai WHERE buku.idPegawai=pegawai.idPegawai AND buku.idBuku='$idBuku' AND buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0'");
	$dataDetailBuku = mysql_fetch_array($queryDetailBuku);
?>
			<h2 class="title text-center">Detail Buku</h2>
				<div class="col-sm-12">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/dist/img/fotoBuku/<?php echo $dataDetailBuku['fotoCover'];?>" style="width:230px; height:320px;">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $dataDetailBuku['judulBuku'];?></h2>
								<p><b>Deskripsi:</b> <?php echo $dataDetailBuku['deskripsiBuku'];?></p>
								<p><b>Kategori:</b> <?php echo $dataDetailBuku['namaKategori'];?></p>
								<p><b>Jumlah Buku Ready:</b> <?php echo $dataDetailBuku['jumlahBuku'];?></p>
								<?php
									if($dataDetailBuku['jumlahBuku']!='0'){
								?>
										<span><button id="pinjamBuku" type="button" class="btn btn-default cart"><i class="fa fa-book"></i> Pinjam</button></span>
								<?php
									}else{
										echo "<font color='red'>Buku masih dipinjam semua</font>";
									}
								?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#recommendedBook" data-toggle="tab">Recommended Book</a></li>
								<li><a href="#statusPinjam" data-toggle="tab">Status Pinjam</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="recommendedBook" >
								<?php
									$queryRecommendedBuku = mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0' ORDER BY RAND() LIMIT 4");
									while($dataRecommendedBuku = mysql_fetch_array($queryRecommendedBuku)){
								?>
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="admin/dist/img/fotoBuku/<?php echo $dataRecommendedBuku['fotoCover'];?>" style="width:150px; height:220px;">
														<h2><?php echo $dataRecommendedBuku['namaKategori'];?></h2>
														<p><?php echo $dataRecommendedBuku['judulBuku'];?></p>
														<button type="button" id="pages/bukuDetail.php?idBuku=<?php echo $dataRecommendedBuku['idBuku'];?>" class="detailRecommendedBook btn btn-default add-to-cart"><i class="fa fa-book"></i> Get It Now</button>
													</div>
												</div>
											</div>
										</div>
								<?php
									}
								?>
							</div>
							
							<div class="tab-pane fade" id="statusPinjam" >
								<div class="col-sm-12">
									<table class="table table-striped table-hover ">
										<thead>
											<tr>
												<th width='5%'><div align="center">No.</div></th>
												<th width='20%'><div align="center">Nama Member</div></th>
												<th width='15%'><div align="center">Tgl Pinjam</div></th>
												<th width='15%'><div align="center">Tgl Pengembalian</div></th>
												<th width='15%'><div align="center">Tgl Dikembalikan</div></th>
												<th width='15%'><div align="center">Status</div></th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$queryMember = mysql_query("SELECT * FROM member, pinjam, pinjambanyakbuku WHERE member.idMember=pinjam.idMember AND pinjambanyakbuku.idPinjam=pinjam.idPinjam AND pinjambanyakbuku.statusDelete='0' AND pinjambanyakbuku.idBuku='$idBuku' ORDER BY pinjam.idPinjam DESC LIMIT 5");
												while($dataMember = mysql_fetch_array($queryMember)){
													if($dataMember['tglDikembalikan']=='0000-00-00'){
														$tglDikembalikan	= "-";
													}else{
														$tglDikembalikan	= (Indonesia2Tgl($dataMember['tglDikembalikan']));
													}
											?>
												<tr>
													<td align='center'><?php echo $i; ?></td>
													<td><?php echo $dataMember['namaMember']; ?></td>
													<td align='center'><?php echo (Indonesia2Tgl($dataMember['tglPinjam'])); ?></td>
													<td align='center'><?php echo (Indonesia2Tgl($dataMember['tglPengembalian'])); ?></td>
													<td align='center'><?php echo $tglDikembalikan; ?></td>
													<?php
														if(($dataMember['statusPengembalian']=='0')OR($dataMember['statusPengembalian']=='1')){
															echo "<td align='center'><font color='red'>Belum Selesai</font></td>";
														}else if($dataMember['statusPengembalian']=='2'){
															echo "<td align='center'><font color='green'>Selesai</font></td>";
														}
													?>
												</tr>
											<?php
												$i++;
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href="#"><i class="fa fa-user"></i><?php echo $dataDetailBuku['namaPegawai'];?></a></li>
										<li><a href="#"><i class="fa fa-calendar-o"></i> <?php echo (Indonesia2Tgl($dataDetailBuku['tglInput']));?></a></li>
									</ul>
									<p><b>Judul Buku:</b> <?php echo $dataDetailBuku['judulBuku'];?></p>
									<p><b>Deskripsi:</b> <?php echo $dataDetailBuku['deskripsiBuku'];?></p>
									<p><b>Kategori:</b> <?php echo $dataDetailBuku['namaKategori'];?></p>
									<p><b>Pengarang:</b> <?php echo $dataDetailBuku['pengarang'];?></p>
									<p><b>Penerbit:</b> <?php echo $dataDetailBuku['penerbit'];?></p>
									<p><b>Jumlah Buku Ready:</b> <?php echo $dataDetailBuku['jumlahBuku'];?></p>
									<p><b>Rak:</b> <?php echo $dataDetailBuku['rak'];?></p>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
				</div>
<script type="text/javascript">
	$(function(){
		$(".detailRecommendedBook").click(function(){
			var idBuku	= $(this).attr('id');
			$("#mainPage").html("<center><img src='admin/dist/img/loading.gif'></center>");
			$("#mainPage").load(idBuku);
		});
		
		$("#pinjamBuku").click(function(){
			alert("Please Login Member!");
			$("#mainPage").html("<center><img src='admin/dist/img/loading.gif'></center>");
			$("#mainPage").load("login.php");
		});
		
	});
</script>