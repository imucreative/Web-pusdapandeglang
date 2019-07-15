<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$sekarang	= date('Y-m-d');
?>

<table id="tabelKembalikanBuku" class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='2%'>#</th>
			<th width='5%'>No.</th>
			<th width='10%'>No. Peminjaman</th>
			<th width='10%'>Tgl Pinjam</th>
			<th width='20%'>Nama Member</th>
			<th width='10%'>Jaminan</th>
			<th width='10%'>Tgl Pengembalian</th>
			<th width='10%'>Jangka Waktu</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryKembalikanBuku = mysql_query("SELECT * FROM pinjam, member WHERE pinjam.idMember=member.idMember AND pinjam.statusPengembalian='1' ORDER BY pinjam.idPinjam DESC");
			while($dataKembalikanBuku = mysql_fetch_array($queryKembalikanBuku)){
				$selisih = ((abs(strtotime ($dataKembalikanBuku['tglPengembalian']) - strtotime ($sekarang)))/(60*60*24));
		?>
			<tr>
			<?php
				if($sekarang>$dataKembalikanBuku['tglPengembalian']){
			?>
					<td align='center' bgcolor="red">&nbsp;&nbsp;&nbsp;</td>
			<?php
				}else{
			?>
					<td align='center' bgcolor="green">&nbsp;&nbsp;&nbsp;</td>
			<?php
				}
			?>
				<td align='center'><?php echo $i; ?></td>
				<td align='center'>
					<a href="#" id="<?php echo $dataKembalikanBuku['idPinjam'] ?>" class="detailKembalikanBuku">
						<?php echo $dataKembalikanBuku['idPinjam']; ?>
					</a>
				</td>
				<td align='center'><?php echo (Indonesia2Tgl($dataKembalikanBuku['tglPinjam'])); ?></td>
				<td><?php echo $dataKembalikanBuku['namaMember']; ?></td>
				<td><?php echo $dataKembalikanBuku['jaminan']; ?></td>
				<td align='center'><?php echo (Indonesia2Tgl($dataKembalikanBuku['tglPengembalian'])); ?></td>
				<td align='center'>
					<?php
						if($sekarang>$dataKembalikanBuku['tglPengembalian']){
							echo '-'.$selisih.' Hari';
						}else{
							echo $selisih.' Hari';
						}
					?>
				</td>
			</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
</table>

<script>
	$(function(){
		$("#tabelKembalikanBuku").dataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
			
		$('.detailKembalikanBuku').click(function(){
			var idPinjam = $(this).attr('id');
			var url = "pages/modInputKembalikanBuku/kembalikanBukuDetail.php?idPinjam="+idPinjam;
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
	});
</script>