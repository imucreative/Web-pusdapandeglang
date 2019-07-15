<div class="panel-group category-products" id="accordian">
	<?php
		$queryKategoriSlide = mysql_query("SELECT * FROM kategoribuku WHERE statusDelete='0' ORDER BY namaKategori ASC");
		while($dataKategoriSlide = mysql_fetch_array($queryKategoriSlide)){
	?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a class="bukuKategori" id="pages/bukuKategori.php?idKategori=<?php echo $dataKategoriSlide['idKategori'];?>" href="#"><?php echo $dataKategoriSlide['namaKategori'];?></a></h4>
				</div>
			</div>
	<?php
		}
	?>
</div>