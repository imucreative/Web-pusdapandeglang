<?php
	include "../../attr/config/conn.php";
	include "../../attr/config/library.php";
	$idMember	= $_REQUEST['idMember'];
?>
<font color="red">* Member dikenakan Denda jika Pengembalian Buku Terlambat, Denda yang dikenakan yaitu (Rp.5000/Hari)</font>
<table class="table table-bordered table-hover ">
	<thead>
		<tr>
			<th width='5%'><div align='center'>No.</div></th>
			<th width='10%'><div align='center'>No.Pinjam</div></th>
			<th width='10%'><div align='center'>Tgl.Pinjam</div></th>
			<th width='10%'><div align='center'>Jaminan</div></th>
			<th width='10%'><div align='center'>Pengembalian</div></th>
			<th width='10%'><div align='center'>Dikembalikan</div></th>
			<th width='10%'><div align='center'>Denda</div></th>
			<th width='10%'><div align='center'>Status</div></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$i = 1;
			$queryPinjam = mysql_query("SELECT * FROM pinjam WHERE pinjam.idMember='$idMember' ORDER BY pinjam.idPinjam DESC LIMIT 10");
			while($dataPinjam = mysql_fetch_array($queryPinjam)){
				if($dataPinjam['tglDikembalikan']=='0000-00-00'){
					$tglDikembalikan	= "-";
					if($dataPinjam['tglCancel']=='0000-00-00'){
						$sekarang	= date('Y-m-d');
						$selisih = ((abs(strtotime ($dataPinjam['tglPengembalian']) - strtotime ($sekarang)))/(60*60*24));
						if($sekarang>$dataPinjam['tglPengembalian']){
							$dendaSelisihMinus	= "<font color='red'>Rp.".(format_angka($selisih * 5000))."</font>";
						}else{
							$dendaSelisihMinus	= "-";
						}
					}else{
						$dendaSelisihMinus	= "-";
					}
				}else{
					$tglDikembalikan	= "<font color='red'>".(Indonesia2Tgl($dataPinjam['tglDikembalikan']))."</font>";
					$dendaSelisihMinus	= "<font color='red'>Rp.".(format_angka($dataPinjam['denda']))."</font>";
				}
				
				if($dataPinjam['keterangan']==''){
					if($dataPinjam['statusPengembalian']!='2'){
						$statusPengembalian	= "<font color='red'>Belum Selesai</font>";
					}else{
						$statusPengembalian	= "<font color='green'>Selesai</font>";
					}
				}else{
					$statusPengembalian	= "<font color='red'>Cancel</font>";
				}
		?>
			<tr>
				<td align='center'><font size='2px'><?php echo $i; ?></font></td>
				<td align='center'><font size='2px'>
					<a href="#" id="<?php echo $dataPinjam['idPinjam'] ?>" data-toggle="modal" data-target="#tampilDetailPeminjaman" class="detailPinjamBuku">
						<?php echo $dataPinjam['idPinjam']; ?>
					</a></font>
				</td>
				<td align='center'><font size='2px'><?php echo (Indonesia2Tgl($dataPinjam['tglPinjam'])); ?></font></td>
				<td><font size='2px'><?php echo $dataPinjam['jaminan']; ?></font></td>
				<td align='center'><font size='2px' color="red"><?php echo (Indonesia2Tgl($dataPinjam['tglPengembalian'])); ?></font></td>
				<td align='center'><font size='2px'><?php echo $tglDikembalikan;?></font></td>
				<td align='center'><font size='2px'><?php echo $dendaSelisihMinus;?></font></td>
				<td align='center'><font size='2px'><?php echo $statusPengembalian;?></font></td>
			</tr>
		<?php
			$i++;
			}
		?>
	</tbody>
</table>

	<div class="modal fade" id="tampilDetailPeminjaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="headerDetailPeminjaman">Detail Peminjaman</h4>
				</div>
				<div class="modal-body" >
					<div id="accountMemberPernahMeminjamBukuDaftarBuku"></div>
				</div>
			</div>
		</div>
	</div>
	
<script type="text/javascript">
	$(function(){
		$(".detailPinjamBuku").click(function(){
			var idPinjam	= $(this).attr('id');
			var url			= "pages/accountMemberPernahMeminjamBukuDaftarBuku.php";
			$.post(url, {idPinjam: idPinjam} ,function(data){
				$("#accountMemberPernahMeminjamBukuDaftarBuku").html(data).show();
			});
		});
	});
</script>