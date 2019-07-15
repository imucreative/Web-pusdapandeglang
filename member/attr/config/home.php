<?php
	include "../../../attr/config/conn.php";
	include "../../../attr/config/library.php";
?>
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">New Book</h2>
		<?php
			$queryBukuTerbaru = mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0' ORDER BY idBuku DESC LIMIT 6");
			while($dataBukuTerbaru = mysql_fetch_array($queryBukuTerbaru)){
		?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<p><img src="../admin/dist/img/fotoBuku/<?php echo $dataBukuTerbaru['fotoCover'];?>" style="width:250px; height:320px;"></p>
								<a href="#" id="<?php echo $dataBukuTerbaru['idBuku'];?>" class="btn btn-default add-to-cart"><i class="fa fa-book"></i>Get It Now</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
								<h2><?php echo $dataBukuTerbaru['namaKategori'];?></h2>
								<p><span><?php echo $dataBukuTerbaru['judulBuku'];?></span></p>
									<a href="#" id="pages/bukuDetail.php?idBuku=<?php echo $dataBukuTerbaru['idBuku'];?>" class="detailHome btn btn-default add-to-cart"><i class="fa fa-book"></i> Get It Now</a>
								</div>
							</div>
						</div>
						<!--
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
							</ul>
						</div>
						-->
					</div>
				</div>
		<?php
			}
		?>
	</div><!--features_items-->

<script type="text/javascript">
	$(function(){
		$(".detailHome").click(function(){
			var idBuku	= $(this).attr('id');
			$("#mainPage").html("<center><img src='admin/dist/img/loading.gif'></center>");
			$("#slider").hide();
			$("#mainPage").load(idBuku);
		});
	});
</script>