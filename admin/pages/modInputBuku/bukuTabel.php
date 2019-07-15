<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level	= $_SESSION['level'];
?>

<table id="tabelBuku" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th width='20%'>Judul Buku</th>
			<th width='20%'>Deskripsi Buku</th>
			<th width='10%'>Pengarang</th>
			<th width='10%'>Penerbit</th>
			<th width='10%'>Kategori</th>
			<th width='10%'>Jumlah</th>
			<th width='10%'>Rak</th>
			<th width='3%'>#</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryBuku = mysql_query("SELECT * FROM buku, kategoribuku WHERE buku.idKategori=kategoribuku.idKategori AND buku.statusDelete='0' ORDER BY buku.idBuku DESC");
			while($dataBuku = mysql_fetch_array($queryBuku)){
		?>
			<tr>
				<td align='center'><?php echo $i; ?></td>
				<td>
					<a href="#" id="<?php echo $dataBuku['idBuku'] ?>" class="detailBuku">
						<?php echo $dataBuku['judulBuku']; ?>
					</a>
				</td>
				<td><?php echo $dataBuku['deskripsiBuku']; ?></td>
				<td><?php echo $dataBuku['pengarang']; ?></td>
				<td><?php echo $dataBuku['penerbit']; ?></td>
				<td><?php echo $dataBuku['namaKategori']; ?></td>
				<td align='center'><?php echo $dataBuku['jumlahBuku']; ?></td>
				<td align='center'><?php echo $dataBuku['rak']; ?></td>
				<td align='center'>
					<?php
						if($level=='Administrator'){
					?>
							<a class='btn btn-xs btn-danger btn-flat deleteBuku' href='#' id="del" data-id='<?php echo $dataBuku['idBuku'];?>' ><i class='fa fa-trash' ></i></a>
					<?php
						}
					?>
				</td>
			</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th width='5%'>No.</th>
			<th width='20%'>Judul Buku</th>
			<th width='20%'>Deskripsi Buku</th>
			<th width='10%'>Pengarang</th>
			<th width='10%'>Penerbit</th>
			<th width='10%'>Kategori</th>
			<th width='10%'>Jumlah</th>
			<th width='10%'>Rak</th>
			<th width='3%'>#</th>
		</tr>
	</tfoot>
</table>

<script>
	$(function(){
		$("#tabelBuku").dataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
			
		$('.deleteBuku').click(function(){
			var idBuku	= $(this).data('id');
			var del		= $(this).attr('id');
			
			if (confirm('Are you sure ?')){
				var DataFormDeleteItem = 'idBuku='+idBuku+'&del='+del;
				$.ajax({
					url: "pages/modInputBuku/saveBuku.php",
					method: 'GET',
					data: DataFormDeleteItem,
					success : function(){
						var urlTampilTabelBuku = "pages/modInputBuku/bukuTabel.php";
						$("#bukuTampilTabel").html("<center><img src='dist/img/loading.gif'></center>");
						$("#bukuTampilTabel").load(urlTampilTabelBuku);
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
			
		$('.detailBuku').click(function(){
			var idBuku = $(this).attr('id');
			var url = "pages/modInputBuku/bukuDetail.php?idBuku="+idBuku;
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
	});
</script>