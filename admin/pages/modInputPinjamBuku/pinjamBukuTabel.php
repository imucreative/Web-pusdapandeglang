<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	
	$sekarang	= date('Y-m-d');
?>

<table id="tabelPinjamBuku" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th width='10%'>No. Peminjaman</th>
			<th width='10%'>Tgl Pinjam</th>
			<th width='20%'>Nama Member</th>
			<th width='10%'>Jaminan</th>
			<th width='10%'>Tgl Pengembalian</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryPinjamBuku = mysql_query("SELECT * FROM pinjam, member WHERE pinjam.idMember=member.idMember AND pinjam.statusPengembalian='0' ORDER BY pinjam.idPinjam DESC");
			while($dataPinjamBuku = mysql_fetch_array($queryPinjamBuku)){
		?>
			<tr>
				<td align='center'><?php echo $i; ?></td>
				<td align='center'>
					<a href="#" id="<?php echo $dataPinjamBuku['idPinjam'] ?>" class="detailPinjamBuku">
						<?php echo $dataPinjamBuku['idPinjam']; ?>
					</a>
				</td>
				<td align='center'><?php echo (Indonesia2Tgl($dataPinjamBuku['tglPinjam'])); ?></td>
				<td><?php echo $dataPinjamBuku['namaMember']; ?></td>
				<td><?php echo $dataPinjamBuku['jaminan']; ?></td>
				<td align='center'><?php echo (Indonesia2Tgl($dataPinjamBuku['tglPengembalian'])); ?></td>
			</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
</table>

<script>
	$(function(){
		$("#tabelPinjamBuku").dataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
			
		$('.detailPinjamBuku').click(function(){
			var idPinjamBuku = $(this).attr('id');
			var url = "pages/modInputPinjamBuku/pinjamBukuDetail.php?idPinjamBuku="+idPinjamBuku;
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
	});
</script>