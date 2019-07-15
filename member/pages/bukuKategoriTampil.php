<?php
	include "../../attr/config/conn.php";
	include "../../attr/config/library.php";
	$idKategori	= $_REQUEST['idKategori'];
?>
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Kategori Buku</h2>
		<?php
			$limit = 6;
			if (isset($_GET["page"])) {
				$page  = $_GET["page"];
			} else {
				$page=1;
			}
			$start_from = ($page-1) * $limit;
		
			$queryKategoriBuku = mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0' AND kategoribuku.idKategori='$idKategori' ORDER BY buku.idBuku DESC LIMIT $start_from, $limit");
			while($dataKategoriBuku = mysql_fetch_array($queryKategoriBuku)){
		?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<p><img src="../admin/dist/img/fotoBuku/<?php echo $dataKategoriBuku['fotoCover'];?>" style="width:230px; height:320px;"></p>
								<a href="#" id="<?php echo $dataKategoriBuku['idBuku'];?>" class="btn btn-default add-to-cart"><i class="fa fa-book"></i>Get It Now</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
								<h2><?php echo $dataKategoriBuku['namaKategori'];?></h2>
								<p><span><?php echo $dataKategoriBuku['judulBuku'];?></span></p>
									<a href="#" id="pages/bukuDetail.php?idBuku=<?php echo $dataKategoriBuku['idBuku'];?>" class="detailBukuKategori btn btn-default add-to-cart"><i class="fa fa-book"></i> Get It Now</a>
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
	</div>
	
<script type="text/javascript">
	$(function(){
		$(".detailBukuKategori").click(function(){
			var idBuku	= $(this).attr('id');
			$("#mainPage").html("<center><img src='../admin/dist/img/loading.gif'></center>");
			$("#mainPage").load(idBuku);
		});
	});
</script>