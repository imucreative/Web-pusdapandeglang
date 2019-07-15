<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";

		$judulBuku		= '';
		$deskripsiBuku	= '';
		$pengarang		= '';
		$penerbit		= '';
		$kategori		= '';
		$jumlahBuku		= '';
		$rak			= '';
?>

<div class="row">
	<div class="col-xs-6">
		<fieldset>
			<div class="form-group">
				<label for="judulBuku">Judul Buku</label>&nbsp;
				<label for="judulBuku"><div id='judulBukuVal'></div></label>
				<input type="text" name="judulBuku" id="judulBuku" class="form-control input-field" placeholder="* Judul Buku" value='<?php echo $judulBuku; ?>'>
			</div>
			<div class="form-group">
				<label for="deskripsiBuku">Deskripsi Buku </label>&nbsp;
				<label for="deskripsiBuku"><div id='deskripsiBukuVal'></div></label>
				<textarea class="form-control input-field" name="deskripsiBuku" id="deskripsiBuku" placeholder="* Deskripsi Buku" ><?php echo $deskripsiBuku; ?></textarea>
			</div>
			<div class="form-group">
				<label for="pengarang">Pengarang</label>&nbsp;
				<label for="pengarang"><div id='pengarangVal'></div></label>
				<input type="text" name="pengarang" id="pengarang" class="form-control input-field" placeholder="* Pengarang" value='<?php echo $pengarang; ?>'>
			</div>
			<div class="form-group">
				<label for="penerbit">Penerbit</label>&nbsp;
				<label for="penerbit"><div id='penerbitVal'></div></label>
				<input type="text" name="penerbit" id="penerbit" class="form-control input-field" placeholder="* Penerbit" value='<?php echo $penerbit; ?>'>
			</div>
		</fieldset>
	</div>
	<div class="col-xs-6">
		<fieldset>
			<div class="form-group">
				<label for="kategori">Kategori</label>&nbsp;
				<label for="kategori"><div id='kategoriVal'></div></label>
				<div class="input-group">
					<select name="kategori" id="kategori" class="form-control">
						<?php
							$queryKategori=mysql_query("SELECT * FROM buku WHERE idBuku='$attrIdBuku'");
							$dataKategori=mysql_fetch_array($queryKategori);
								$queryKategori2=mysql_query("SELECT * FROM kategoribuku WHERE statusDelete='0'");
								while($dataKategori2=mysql_fetch_array($queryKategori2)){
									if($dataKategori['idKategori']==$dataKategori2['idKategori']){
										echo "<option value='$dataKategori2[idKategori]' selected>$dataKategori2[namaKategori]</option>";
									}else{
										echo "<option value='$dataKategori2[idKategori]'>$dataKategori2[namaKategori]</option>";
									}
								}
						?>
					</select>
					<span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
				</div>
			</div>
			<div class="form-group">
				<label for="jumlahBuku">Jumlah Buku</label>&nbsp;
				<label for="jumlahBuku"><div id='jumlahBukuVal'></div></label>
				<input type="text" name="jumlahBuku" id="jumlahBuku" class="form-control input-field" placeholder="* Jumlah Buku" value='<?php echo $jumlahBuku; ?>'>
			</div>
			<div class="form-group">
				<label for="rak">Rak</label>&nbsp;
				<label for="rak"><div id='rakVal'></div></label>
				<input type="text" name="rak" id="rak" class="form-control input-field" placeholder="* Rak" value='<?php echo $rak; ?>'>
			</div>
		</fieldset>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.back').click(function(){
			var url = $(this).attr('id');
			$("#mainPage").html("<center><img src='dist/img/loading.gif'></center>");
			$("#mainPage").load(url);
		});
		
		$('#jumlahBuku').keypress(function(event){
			var charCode = (event.which) ? event.which : event.keyCode
				if ((charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9)
				return true;
				$("#jumlahBukuVal").html("<font color='red'> | * Please Input Number</font>").show().fadeOut(20000);
				jumlahBuku.focus();
			return false;
		});
	}(jQuery));
</script>