		<section id="slider"><!--slider-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<?php
									$i = 0;
									$queryBukuSlide = mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0' ORDER BY RAND() ASC LIMIT 5");
									while($dataBukuSlide = mysql_fetch_array($queryBukuSlide)){
										if($i=='0'){
											$aktif	= "class='active'";
										}else{
											$aktif	= "";
										}
								?>
										<li data-target="#slider-carousel" data-slide-to="<?php echo $i; ?>" <?php echo $aktif; ?>></li>
								<?php
									$i++;
									}
								?>
							</ol>
							
							<div class="carousel-inner">
								<?php
									$i = 0;
									$queryBukuSlide = mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0' ORDER BY RAND() ASC LIMIT 5");
									while($dataBukuSlide = mysql_fetch_array($queryBukuSlide)){
										if($i=='0'){
											$aktif	= "active";
										}else{
											$aktif	= "";
										}
								?>
										<div class="item <?php echo $aktif; ?>">
											<div class="col-sm-6">
												<h1><?php echo $dataBukuSlide['namaKategori'];?></h1>
												<h3><?php echo $dataBukuSlide['judulBuku'];?></h3>
												<a href="#" type="button" class="detailBukuSlide btn btn-default get" id="pages/bukuDetail.php?idBuku=<?php echo $dataBukuSlide['idBuku'];?>"><i class="fa fa-book"></i> Get It Now</a>
											</div>
											<div class="col-sm-6">
												<img src="admin/dist/img/fotoBuku/<?php echo $dataBukuSlide['fotoCover'];?>" class="girl img-responsive" style="width:260px; height:370px;"/>
											</div>
										</div>
								<?php
									$i++;
									}
								?>
							</div>
							
							<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
						
					</div>
				</div>
			</div>
		</section><!--/slider-->