<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level	= $_SESSION['level'];
?>

<table id="tabelKategori" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='10%'>No.</th>
			<th width='80%'>Kategori Buku</th>
			<th width='10%'>#</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryKategori = mysql_query("SELECT * FROM kategoribuku WHERE kategoribuku.statusDelete='0' ORDER BY kategoribuku.idKategori DESC");
			while($dataKategori = mysql_fetch_array($queryKategori)){
		?>
			<tr>
				<td align='center'><?php echo $i; ?></td>
				<td><?php echo $dataKategori['namaKategori']; ?></td>
				<td align='center'>
					<a href="#modalKategori" id="<?php echo $dataKategori['idKategori'] ?>" class="editInputKategori btn btn-flat btn-xs btn-info" data-toggle="modal">
						<i class="fa fa-edit"></i> Edit
					</a>
					<?php
						if($level=='Administrator'){
					?>
							<a class='btn btn-xs btn-danger btn-flat deleteKategori' href='#' id="del" data-id='<?php echo $dataKategori['idKategori'];?>' ><i class='fa fa-trash' ></i></a>
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
			<th width='10px'>No.</th>
			<th width='80px'>Kategori Buku</th>
			<th width='10px'>#</th>
		</tr>
	</tfoot>
</table>

<script>
	$(function(){
		$("#tabelKategori").dataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
			
		$('.editInputKategori, .tombolInputKategori').click(function(){
			var url = "pages/modInputKategori/kategoriFormInput.php";
			var idKategori = $(this).attr('id');
			
			if(idKategori != 0) {
				$("#labelHeaderKategori").html("Edit Kategori");
			} else {
				$("#labelHeaderKategori").html("Input Kategori");
			}

			$.post(url, {id: idKategori} ,function(data){
				$("#bodyKategori").html(data).show();
			});
		});
		
		$('.deleteKategori').click(function(){
			var idKategori	= $(this).data('id');
			var del			= $(this).attr('id');
			if (confirm('Are you sure ?')){
				var DataFormDeleteItem = 'idKategori='+idKategori+'&del='+del;
				$.ajax({
					url: "pages/modInputKategori/kategoriSave.php",
					method: 'POST',
					data: DataFormDeleteItem,
					success : function(){
						var urlTampilTabelKategori = "pages/modInputKategori/kategoriTabel.php";
						$("#tampilTabelKategori").html("<center><img src='dist/img/loading.gif'></center>");
						$("#tampilTabelKategori").load(urlTampilTabelKategori);
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
	});
</script>