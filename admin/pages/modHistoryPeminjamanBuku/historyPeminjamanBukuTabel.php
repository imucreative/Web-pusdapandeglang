<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
?>

<table id="tabelPeminjamanBuku" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='2%'>#</th>
			<th width='5%'>No.</th>
			<th width='10%'>No. Peminjaman</th>
			<th width='10%'>Tgl Pinjam</th>
			<th width='20%'>Nama Member</th>
			<th width='10%'>Jaminan</th>
			<th width='10%'>Tgl Pengembalian</th>
			<th width='10%'>Tgl Dikembalikan</th>
			<th width='10%'>Status Pengembalian</th>
		</tr>
	</thead>
	<tbody>
		<?php
			//date('Y-m-d'); //Sekarang
			$i = 1;
			$queryHistoryPeminjamanBuku = mysql_query("SELECT * FROM pinjam, member WHERE pinjam.idMember=member.idMember AND pinjam.statusPengembalian='2' ORDER BY pinjam.idPinjam DESC");
			while($dataHistoryPeminjamanBuku = mysql_fetch_array($queryHistoryPeminjamanBuku)){
				
				if($dataHistoryPeminjamanBuku['keterangan']==''){
					$tglDikembalikan2	= $dataHistoryPeminjamanBuku['tglDikembalikan'];
					$statusPengembalian	= "<font color='green'>Selesai</font>";
					$tglDikembalikan	= (Indonesia2Tgl($dataHistoryPeminjamanBuku['tglDikembalikan']));
				}else{
					$tglDikembalikan2	= $dataHistoryPeminjamanBuku['tglCancel'];
					$statusPengembalian	= "<font color='red'>Cancel</font>";
					$tglDikembalikan	= (Indonesia2Tgl($dataHistoryPeminjamanBuku['tglCancel']));
				}
		?>
				<tr>
					<?php
						if($tglDikembalikan2>$dataHistoryPeminjamanBuku['tglPengembalian']){
					?>
							<td align='center' bgcolor="red"><font color="red">0</font></td>
					<?php
						}else{
					?>
							<td align='center' bgcolor="green"><font color="green">1</font></td>
					<?php
						}
					?>
					<td align='center'><?php echo $i; ?></td>
					<td align='center'>
						<a href="#" id="<?php echo $dataHistoryPeminjamanBuku['idPinjam'] ?>" class="detailHistoryPeminjamanBuku">
							<?php echo $dataHistoryPeminjamanBuku['idPinjam']; ?>
						</a>
					</td>
					<td align='center'><?php echo (Indonesia2Tgl($dataHistoryPeminjamanBuku['tglPinjam'])); ?></td>
					<td><?php echo $dataHistoryPeminjamanBuku['namaMember']; ?></td>
					<td><?php echo $dataHistoryPeminjamanBuku['jaminan']; ?></td>
					<td align='center'><?php echo (Indonesia2Tgl($dataHistoryPeminjamanBuku['tglPengembalian'])); ?></td>
					<td align='center'><?php echo $tglDikembalikan;?></td>
					<td align='center'><?php echo $statusPengembalian;?></td>
				</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
</table>

<script>
	$(function(){
		$("#tabelPeminjamanBuku").dataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
			
		$('.detailHistoryPeminjamanBuku').click(function(){
			var idPinjam = $(this).attr('id');
			var url = "pages/modHistoryPeminjamanBuku/historyPeminjamanBukuDetail.php?idPinjam="+idPinjam;
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
	});
</script>