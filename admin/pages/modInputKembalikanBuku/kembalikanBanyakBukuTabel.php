<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	$level			= $_SESSION['level'];
	$idPinjam		= $_REQUEST['idPinjam'];
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
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				$queryBuku = mysql_query("SELECT * FROM buku, kategoribuku, pinjambanyakbuku WHERE buku.idKategori=kategoribuku.idKategori AND pinjambanyakbuku.idBuku=buku.idBuku AND pinjambanyakbuku.idPinjam='$idPinjam' AND pinjambanyakbuku.statusDelete='0' ORDER BY buku.idKategori ASC");
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
				</tr>
			<?php
				$i++;
				}
			?>
		</tbody>
	</table>