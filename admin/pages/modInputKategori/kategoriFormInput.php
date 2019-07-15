<?php
	include "../../dist/config/conn.php";
	include "../../dist/config/library.php";
	
	$attrIdKategori = $_POST['id'];
	
		$queryEdit	= mysql_query("SELECT * FROM kategoribuku WHERE idKategori='$attrIdKategori'");
		$dataEdit	= mysql_fetch_array($queryEdit);
		
		if($attrIdKategori=='0'){
			$namaKategori	= '';
		}else{
			$namaKategori	= $dataEdit['namaKategori'];
		}
?>
<form method='POST'>
	<fieldset>
		<input type="hidden" name="idKategori" id="idKategori" class="form-control input-field" value='<?php echo $attrIdKategori; ?>'>
		<div class="form-group">
			<label for="namaKategori">Nama Kategori</label>&nbsp;
			<label for="namaKategori"><div id='namaKategoriVal'></div></label>
			<input type="text" name="namaKategori" id="namaKategori" class="form-control input-field" placeholder="* Nama Kategori" value='<?php echo $namaKategori; ?>'>
		</div>
	</fieldset>
</form>

<script>
	$('#namaKategori').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode
			if (charCode != 13)
			return true;
		return false;
	});
</script>