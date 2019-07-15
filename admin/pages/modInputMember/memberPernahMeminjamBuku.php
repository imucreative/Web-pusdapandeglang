<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level		= $_SESSION['level'];
	$idMember	= $_REQUEST['idMember'];
?>

<table id="memberPernahMeminjamBuku" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th width='20%'>Judul Buku</th>
			<th width='10%'>Jaminan</th>
			<th width='10%'>Tgl Pinjam</th>
			<th width='10%'>Tgl Pengembalian</th>
			<th width='10%'>Tgl Dikembalikan</th>
			<th width='10%'>Status Pengembalian</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryMember = mysql_query("SELECT * FROM buku, pinjam, pinjambanyakbuku WHERE buku.idBuku=pinjambanyakbuku.idBuku AND pinjambanyakbuku.idPinjam=pinjam.idPinjam AND pinjambanyakbuku.statusDelete='0' AND pinjam.idMember='$idMember' ORDER BY pinjam.idPinjam DESC");
			while($dataMember = mysql_fetch_array($queryMember)){
				if($dataMember['tglDikembalikan']=='0000-00-00'){
					$tglDikembalikan	= "-";
				}else{
					$tglDikembalikan	= (Indonesia2Tgl($dataMember['tglDikembalikan']));
				}
		?>
			<tr>
				<td align='center'><?php echo $i; ?></td>
				<td><?php echo $dataMember['judulBuku']; ?></td>
				<td><?php echo $dataMember['jaminan']; ?></td>
				<td align='center'><?php echo (Indonesia2Tgl($dataMember['tglPinjam'])); ?></td>
				<td align='center'><?php echo (Indonesia2Tgl($dataMember['tglPengembalian'])); ?></td>
				<td align='center'><?php echo $tglDikembalikan; ?></td>
				<?php
					if(($dataMember['statusPengembalian']=='0')OR($dataMember['statusPengembalian']=='1')){
						echo "<td align='center'><font color='red'>Belum Selesai</font></td>";
					}else if($dataMember['statusPengembalian']=='2'){
						echo "<td align='center'><font color='green'>Selesai</font></td>";
					}
				?>
			</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
</table>

<script>
	$(function(){
		$("#memberPernahMeminjamBuku").dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bInfo": false,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
	});
</script>