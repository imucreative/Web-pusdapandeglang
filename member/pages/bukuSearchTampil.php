	<div class="features_items"><!--features_items-->
		<?php
			while($dataCariBuku = mysql_fetch_array($sqlCariBuku)){
		?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<p><img src="../admin/dist/img/fotoBuku/<?php echo $dataCariBuku['fotoCover'];?>" style="width:230px; height:320px;"></p>
								<a href="#" id="<?php echo $dataCariBuku['idBuku'];?>" class="btn btn-default add-to-cart"><i class="fa fa-book"></i>Get It Now</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
								<h2><?php echo $dataCariBuku['namaKategori'];?></h2>
								<p><span><?php echo $dataCariBuku['judulBuku'];?></span></p>
									<a href="#" id="pages/bukuDetail.php?idBuku=<?php echo $dataCariBuku['idBuku'];?>" class="detailBukuKategori btn btn-default add-to-cart"><i class="fa fa-book"></i> Get It Now</a>
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