<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjamBuku	= $_REQUEST['idPinjamBuku'];
?>
	
	<table id="tabelPinjamBanyakBuku" class="table table-bordered table-hover ">
		<thead>
			<tr>
				<th width='5%'>No.</th>
				<th width='20%'>Judul Buku</th>
				<th width='20%'>Deskripsi Buku</th>
				<th width='10%'>Pengarang</th>
				<th width='10%'>Penerbit</th>
				<th width='10%'>Kategori</th>
				<th width='10%'>Rak</th>
				<th width='7%'>#</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				$queryBuku = mysql_query("SELECT * FROM buku, kategoribuku, pinjambanyakbuku WHERE buku.idKategori=kategoribuku.idKategori AND pinjambanyakbuku.idBuku=buku.idBuku AND pinjambanyakbuku.idPinjam='$idPinjamBuku' AND pinjambanyakbuku.statusDelete='0' ORDER BY buku.idKategori ASC");
				while($dataBuku = mysql_fetch_array($queryBuku)){
			?>
				<tr>
					<td align='center'><?php echo $i; ?></td>
					<td><?php echo $dataBuku['judulBuku']; ?></td>
					<td><?php echo $dataBuku['deskripsiBuku']; ?></td>
					<td><?php echo $dataBuku['pengarang']; ?></td>
					<td><?php echo $dataBuku['penerbit']; ?></td>
					<td><?php echo $dataBuku['namaKategori']; ?></td>
					<td align='center'><?php echo $dataBuku['rak']; ?></td>
					<td align='center'>
						<!--
						<a class='btn btn-xs btn-warning btn-flat editPinjamBanyakBuku' href='#' data-id='<?php //echo $dataBuku['idPinjamBanyakBuku'];?>' ><i class='fa fa-edit' ></i> Edit</a>
						-->
						<a class='btn btn-xs btn-danger btn-flat deletePinjamBanyakBuku' href='#' id="del" data-value='<?php echo $dataBuku['idBuku'];?>' data-id='<?php echo $dataBuku['idPinjamBanyakBuku'];?>' ><i class='fa fa-trash' ></i></a>
					</td>
				</tr>
			<?php
				$i++;
				}
			?>
		</tbody>
	</table>
<script>
	$(document).ready(function(){
		/*
		$('.editPinjamBanyakBuku').click(function(){
			var idPinjamBanyakBuku = $(this).data('id');
			var urlTambahPinjamBuku = "pages/modInputPinjamBuku/pinjamBukuBanyakTambah.php?idPinjamBanyakBuku="+idPinjamBanyakBuku+"&idPinjamBuku=<?php echo $idPinjamBuku;?>";
			$("#tambahPinjamBuku").html("<center><img src='dist/img/loading.gif'></center>");
			$("#tambahPinjamBuku").slideDown();
			$("#tambahPinjamBuku").load(urlTambahPinjamBuku);
		});
		*/
		
		$('.deletePinjamBanyakBuku').click(function(){
			var idPinjamBanyakBuku	= $(this).data('id');
			var idBuku				= $(this).data('value');
			var del					= $(this).attr('id');
			
			if (confirm('Are you sure ?')){
				var DataFormDeleteItem = 'idPinjamBanyakBuku='+idPinjamBanyakBuku+'&del='+del+'&idBuku='+idBuku;
				$.ajax({
					url: "pages/modInputPinjamBuku/savePinjamBanyakBuku.php",
					method: 'GET',
					data: DataFormDeleteItem,
					success : function(data){
						var urlTabelPinjamBanyakBuku = "pages/modInputPinjamBuku/pinjamBukuDetail.php?idPinjamBuku="+"<?php echo $idPinjamBuku;?>";
						$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
						$("#mainPage").load(urlTabelPinjamBanyakBuku);
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