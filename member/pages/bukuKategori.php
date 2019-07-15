<?php
	include "../../attr/config/conn.php";
	$idKategori	= $_REQUEST['idKategori'];
?>
	<div id="target-content" ></div>
	<?php
		$limit			= 6;
		$sql 			= mysql_query("SELECT COUNT(idBuku) FROM buku WHERE statusDelete='0' AND idKategori='$idKategori'");
		$row			= mysql_fetch_row($sql);
		$total_records	= $row[0];
		$total_pages	= ceil($total_records / $limit);
	?>
	<div align="center">
		<ul class='pagination text-center' id="pagination">
			<?php
				if(!empty($total_pages)){
					for($i=1; $i<=$total_pages; $i++){
						if($i == 1){
			?>
							<li class='active'  id="<?php echo $i;?>"><a href='pages/bukuKategoriTampil.php?idKategori=<?php echo $idKategori;?>&page=<?php echo $i;?>'><?php echo $i;?></a></li>
			<?php
						}else{
			?>
							<li id="<?php echo $i;?>"><a href='pages/bukuKategoriTampil.php?idKategori=<?php echo $idKategori;?>&page=<?php echo $i;?>'><?php echo $i;?></a></li>
			<?php
						}
					}
				}
			?>
		</ul>
	</div>
	
<script type="text/javascript">
	$(function(){
		var idKategori	= '<?php echo $idKategori;?>';
		$("#target-content").load("pages/bukuKategoriTampil.php?idKategori="+idKategori+"&page=1");
		$("#pagination li").click(function(e){
			e.preventDefault();
			$("#pagination li").removeClass('active');
			$(this).addClass('active');
			var pageNum = $(this).attr('id');
			$("#target-content").load("pages/bukuKategoriTampil.php?idKategori="+idKategori+"&page="+pageNum);
		});
	});
</script>