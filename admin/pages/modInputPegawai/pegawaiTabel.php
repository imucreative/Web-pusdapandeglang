<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>

<table id="tabelPegawai" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th width='30%'>Nama Pegawai</th>
			<th width='40%'>Alamat Pegawai</th>
			<th width='10%'>Telp. Pegawai</th>
			<th width='10%'>#</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryPegawai = mysql_query("SELECT * FROM pegawai WHERE pegawai.statusDelete='0' ORDER BY pegawai.idPegawai DESC");
			while($dataPegawai = mysql_fetch_array($queryPegawai)){
		?>
			<tr>
				<td align='center'><?php echo $i; ?></td>
				<td><?php echo $dataPegawai['namaPegawai']; ?></td>
				<td><?php echo $dataPegawai['alamatPegawai']; ?></td>
				<td><?php echo $dataPegawai['telpPegawai']; ?></td>
				<td align='center'>
					<a href="#modalPegawai" id="<?php echo $dataPegawai['idPegawai'] ?>" class="editInputPegawai btn btn-flat btn-xs btn-info" data-toggle="modal">
						<i class="fa fa-edit"></i> Edit
					</a>
					<?php
						if($dataPegawai['level']!='Administrator'){
					?>
							<a class='btn btn-xs btn-danger btn-flat deletePegawai' href='#' id="del" data-id='<?php echo $dataPegawai['idPegawai'];?>' ><i class='fa fa-trash' ></i></a>
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
			<th width='30%'>Nama Pegawai</th>
			<th width='40%'>Alamat Pegawai</th>
			<th width='10%'>Telp. Pegawai</th>
			<th width='10%'>#</th>
		</tr>
	</tfoot>
</table>

<script>
	$(function(){
		$("#tabelPegawai").dataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
			
		$('.editInputPegawai, .tombolTambahPegawai').click(function(){
			var url = "pages/modInputPegawai/pegawaiFormInput.php";
			var idPegawai = $(this).attr('id');
		
			if(idPegawai != 0) {
				$("#labelHeaderPegawai").html("Edit Pegawai");
			} else {
				$("#labelHeaderPegawai").html("Input Pegawai");
			}
			
			$.post(url, {id: idPegawai} ,function(data){
				$("#bodyPegawai").html(data).show();
			});
		});
		
		$('.deletePegawai').click(function(){
			var idPegawai	= $(this).data('id');
			var del			= $(this).attr('id');
			if (confirm('Are you sure ?')){
				var DataFormDeleteItem = 'idPegawai='+idPegawai+'&del='+del;
				$.ajax({
					url: "pages/modInputPegawai/pegawaiSave.php",
					method: 'POST',
					data: DataFormDeleteItem,
					success : function(){
						var urlTampilTabelPegawai = "pages/modInputPegawai/pegawaiTabel.php";
						$("#tampilTabelPegawai").html("<center><img src='dist/img/loading.gif'></center>");
						$("#tampilTabelPegawai").load(urlTampilTabelPegawai);
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